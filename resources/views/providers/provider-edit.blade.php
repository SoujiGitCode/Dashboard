@extends('layouts.master')

@section('title') @lang('translation.Create_New') @endsection

@section('css')
    <!-- bootstrap datepicker -->
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <!-- dropzone css -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css"/>


@endsection

<style>

</style>
@section('content')
    <script>

    </script>
    @component('components.breadcrumb')
        @slot('li_1') Proveedores @endslot
        @slot('title') Edicion de Proveedor @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Editar Proveedor</h4>

                    @if($providers->user->role->id === 5) <form method="POST" action="agent-update">
                        @elseif ($providers->user->role->id === 4 ) <form method="POST" action="manager-update">
                            @else<form method="POST" action="provider-update">
                    @endif
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-form-label col-lg-2">Nombre de Provedor</label>
                            <div class="col-lg-10">
                                <input readonly id="name"
                                       name="name"
                                       type="text"
                                       class="form-control"
                                       value="{{ old('name', $providers->user->name) }}"
                                       placeholder="{{$providers->user->name}}">
                            </div>
                        </div>

                        <input type="hidden" value="{{$providers->id}}" name="id">
                        <!-- <div class="row mb-4">
                        <label for="password" class="col-form-label col-lg-2">Password</label>
                        <div class="col-lg-10">
                        <input id="password" name="password" type="text" class="form-control"
                        placeholder>
                        </div>
                        </div> -->

                        <div class="row mb-4">
                            <label for="status" class="col-form-label col-lg-2">Status</label>
                            <div class="col-lg-10">
                                <select class="form-select" name="status" id="status_init">
                                    <option value="0" @if($providers->status === '0') selected @endif>Inactivo</option>
                                    <option value="1"  @if($providers->status === '1') selected @endif>Activo</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4" id="max_hotels_container" style="display: none">
                            <label for="max_hotels" class="col-form-label col-lg-2">Max Hoteles</label>
                            <div class="col-lg-10">
                                <input id="max_hotels"
                                       name="max_hotels"
                                       type="number"
                                       min=1
                                       class="form-control"
                                       value="{{ old('max_hoteles', $providers->plan->max_hotels) }}"
                                       placeholder="{{$providers->plan->max_hotels}}">
                            </div>
                        </div>


                        <div class="row mb-4" id="max_users_container" style="display: none">
                            <label for="max_users" class="col-form-label col-lg-2">Max Usuarios</label>
                            <div class="col-lg-10">
                                <input  id="max_users"
                                        name="max_users"
                                        type="number"
                                        min=1
                                        class="form-control"
                                        value="{{ old('max_users', $providers->plan->max_users) }}"
                                        placeholder="{{$providers->plan->max_users}}">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="plan_id" class="col-form-label col-lg-2">Plan</label>
                            <div class="col-lg-10">
                                <select class="form-select" name="plan_id" id="plan_id">
                                    @foreach($plancodes as $plancode)
                                        <option value="{{$plancode->id}}"
                                                @if ($providers->plan->plan_code_id==$plancode->id) selected @endif >
                                            {{$plancode->description}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-10">

                                <input type="hidden" name="plan" value="{{$plan->id}}">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                            </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
@section('script')
    <!-- bootstrap datepicker -->
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- dropzone plugin -->
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
    <!-- custom view js-->
    <script src="{{ URL::asset('/assets/js/providers-views.js') }}"></script>
@endsection
