@extends('layouts.master')

@section('title') @lang('translation.Create_New') @endsection

@section('css')
    <!-- bootstrap datepicker -->
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <!-- dropzone css -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Users @endslot
        @slot('title') User edit @endslot
    @endcomponent
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit User</h4>
                    <form method="POST" action="user-update">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-form-label col-lg-2">User Name</label>
                            <div class="col-lg-10">
                                <input id="name"
                                    name="name"
                                    type="text"
                                    class="form-control"
                                    value="{{ old('email', $user->name) }}"
                                    placeholder="{{$user->name}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-form-label col-lg-2">User e-mail</label>
                            <div class="col-lg-10">
                                <input id="email"
                                    name="email" type="text"
                                    class="form-control  @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="{{$user->email}}" readonly>
                            </div>
                        </div>
                        <input type="hidden" value="{{$user->id}}" name="id">
                        <!-- <div class="row mb-4">
                            <label for="password" class="col-form-label col-lg-2">Password</label>
                            <div class="col-lg-10">
                                <input id="password" name="password" type="text" class="form-control"
                                    placeholder>
                            </div>
                        </div> -->

                        <div class="row mb-4">
                            <label for="role" class="col-form-label col-lg-2">Role</label>
                            <div class="col-lg-10">
                                <input id="role"
                                    name="role" type="text"
                                    class="form-control  @error('email') is-invalid @enderror"
                                    placeholder="{{$user->role->name}}" readonly>
                            </div>
                        </div>

                        @if($user->role->code == 77)
                        
                        <div class="row mb-4">
                            <label for="projectbudget" class="col-form-label col-lg-2">Planes</label>
                            <div class="col-lg-10">
                                <select class="form-select" name="plan_id">
                                    @foreach($plans as $plan) <option value="{{$plan->id}}" >{{$plan->name}}</option> @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="max_hotels" class="col-form-label col-lg-2">Cantidad max de hoteles</label>
                            <div class="col-lg-10">
                                <input id="max_hotels" name="max_hotels" type="number" class="form-control"
                                    placeholder="{{$user->provider->plan->max_hotels}}" min=1>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="max_users" class="col-form-label col-lg-2">Cantidad max de usuarios</label>
                            <div class="col-lg-10">
                                <input id="max_users" name="max_users" type="number" class="form-control"
                                    placeholder="{{$user->provider->plan->max_users}}" min=1>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-form-label col-lg-2">Descripcion</label>
                            <div class="col-lg-10">
                                <input id="description" name="description" type="textarea" class="form-control"
                                    placeholder="{{$user->provider->plan->description}}" >
                            </div>
                        </div>

                        @endif



                        <div class="row justify-content-end">
                            <div class="col-lg-10">
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
