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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="true">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="provider-tab" data-toggle="tab" href="#provider" role="tab" aria-controls="provider" aria-selected="false">Provider</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false">Hotel</a>
                    </li>
                    </ul>
                    <div class="tab-content mt-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">@include('users.forms.admin-create')</div>
                    <div class="tab-pane fade" id="provider" role="tabpanel" aria-labelledby="provider-tab">@include('users.forms.provider-create')</div>
                    <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">@include('users.forms.hotels-create')</div>
                    </div>
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
