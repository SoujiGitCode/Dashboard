@extends('layouts.master')

@section('title') @lang('translation.Projects_List') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Users @endslot
        @slot('title') Users List
        @endslot

    @endcomponent

    @php
        $cuser = Auth::user()->role->slug;
        $i = 1;
    @endphp

    <br> <a type="button" class="btn btn-primary waves-effect waves-light" href="user-create">
        <i class="bx bx-user-plus font-size-16 align-middle me-2"></i> Crear
    </a> <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <div class="table-responsive">
                    <table class="table project-list-table table-nowrap align-middle table-borderless">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 100px">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">E-mail</th>
                                <!-- <th scope="col">Profile</th> -->
                                <th scope="col">Created_at</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <h5 class="text-truncate font-size-14">{{$user->name}}</h5>
                                </td>
                                <td>{{$user->email}}</td>
                                <!-- <td>
                                    <img src="{{ URL::asset($user->avatar) }}" alt=""class="avatar-sm"></span>
                                </td> -->
                                <td>{{$user->created_at}}</td>
                                <td>
                                    @if($cuser == 'vip' && $user->role->slug != 'vip')

                                        <form action="user-delete-{{$user->id}}" method="POST">
                                            @csrf
                                            <a type="button" class="btn btn-success waves-effect waves-light actions-sm" href="user-edit-{{$user->id}}">
                                                <i class="mdi mdi-pencil d-block font-size-16"></i>
                                            </a>


                                            <button type="submit" class="btn btn-danger waves-effect waves-light actions-sm">
                                                <i class="mdi mdi-trash-can d-block font-size-16"></i>
                                            </button>
                                 <!--   <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">

                                                <a class="dropdown-item" href="user-create">Create</a>
                                                <a class="dropdown-item" href="user-edit-{{$user->id}}">Edit</a>
                                                <form action="user-delete-{{$user->id}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">
                                                    Delete -->
                                                    <!-- <a class="dropdown-item">Delete</a> -->
                                                <!--    </button> -->
                                                </form>
                                            @else

                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="text-center my-3">
                <a href="javascript:void(0);" class="text-success"><i
                        class="bx bx-loader bx-spin font-size-18 align-middle mr-2"></i> Load more </a>
            </div>
            <br> <a type="button" class="btn btn-primary waves-effect waves-light" href="user-create">
                <i class="bx bx-user-plus font-size-16 align-middle me-2"></i> Crear
            </a> <br>
        </div> <!-- end col-->
    </div>
    <!-- end row -->

@endsection
