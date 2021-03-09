@extends('layouts.master')

@section('title') @lang('translation.Create_New') @endsection

@section('css')
    <!-- bootstrap datepicker -->
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <!-- dropzone css -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Proveedores @endslot
        @slot('title') Edicion de Proveedor @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Editar Proveedor</h4>
                    <form method="POST" action="provider-update">
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
                        <div class="row mb-4">
                            <label for="alias" class="col-form-label col-lg-2">Alias </label>
                            <div class="col-lg-10">
                                <input id="alias"
                                       name="alias" type="text"
                                       class="form-control  @error('email') is-invalid @enderror"
                                       value="{{ old('alias', $providers->alias) }}"
                                       placeholder="{{$providers->alias}}">
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
                                <input readonly id="statu"
                                       name="status"
                                       type="text"
                                       class="form-control"
                                       value="{{ old('status', $providers->status) }}"
                                       placeholder="{{$providers->status}}">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="hotels" class="col-form-label col-lg-2">Hoteles</label>
                            <div class="col-lg-10">
                                <input readonly id="hotels"
                                       name="hotels"
                                       type="text"
                                       class="form-control"
                                       value="{{ old('hotels', $providers->hotels) }}"
                                       placeholder="{{$providers->hotels}}">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="max-hoteles" class="col-form-label col-lg-2">Max Hoteles</label>
                            <div class="col-lg-10">
                                <input readonly id="max_hotels"
                                       name="max_hotels"
                                       type="text"
                                       class="form-control"
                                       value="{{ old('max_hoteles', $providers->plan->max_hotels) }}"
                                       placeholder="{{$providers->plan->max_hotels}}">
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="max-hoteles" class="col-form-label col-lg-2">Max Usuarios</label>
                            <div class="col-lg-10">
                                <input readonly id="max_users"
                                       name="max_users"
                                       type="text"
                                       class="form-control"
                                       value="{{ old('max_users', $providers->plan->max_users) }}"
                                       placeholder="{{$providers->plan->max_users}}">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="projectbudget" class="col-form-label col-lg-2">Plan</label>
                            <div class="col-lg-10">
                                <select class="form-select" name="plan_id">
                                    @foreach($plancodes as $plancode)
                                        <option value="{{$plancode->id}}"
                                                @if ($providers->plan->plan_code_id==$plancode->id) selected @endif >
                                            {{$plancode->code}}
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
@endsection
