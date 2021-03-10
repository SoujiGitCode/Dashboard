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
        @slot('title') Create New @endslot
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
                    <h4 class="card-title mb-4">Create New User</h4>
                    <form method="POST" action="user-store">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-form-label col-lg-2">User Name</label>
                            <div class="col-lg-10">
                                <input id="name"
                                    name="name"
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter User Name..." >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-form-label col-lg-2">User e-mail</label>
                            <div class="col-lg-10">
                                <input id="email"
                                    name="email" type="text"
                                    class="form-control  @error('email') is-invalid @enderror"
                                    placeholder="Enter User E-mail..." >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password" class="col-form-label col-lg-2">Password</label>
                            <div class="col-lg-10">
                                <input id="password" name="password" type="text" class="form-control"
                                    placeholder="Enter User Password..." >
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="projectbudget" class="col-form-label col-lg-2">Role</label>
                            <div class="col-lg-10">
                                <select class="form-select" name="role_id">
                                    @foreach($roles as $role) <option value="{{$role->id}}" >{{$role->name}}</option> @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-primary">Create</button>
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
