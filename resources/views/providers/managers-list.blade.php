@extends('layouts.master')

@section('title') @lang('translation.Projects_List') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1')Managers @endslot
        @slot('title') Lista de Managers
        @endslot

    @endcomponent

    @php
        $cuser = Auth::user()->role->slug;
        $i = 1;
    @endphp

    <br> <a type="button" class="btn btn-primary waves-effect waves-light none" href="user-create">
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
                            <th scope="col">Nombre</th>
                            <th scope="col">Hoteles</th>
                            <th scope="col">Status</th>
                            <th scope="col">Max Hoteles</th>
                            <th scope="col">Max Usuarios</th>
                            <th scope="col">Plan</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($distributors as $distributor)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <h5 class="text-truncate font-size-14">{{$distributor->name}}</h5>
                                </td>
                                <td>-</td>
                                <!-- status column -->
                                <td>{{$distributor->status}}</td>

                                <!-- Max-Hotels column -->
                                <td>{{$distributor->max_hotels}}</td>
                                <!-- Max-Hotels column -->
                                <td>{{$distributor->max_users}}</td>
                                <!-- Plan column -->
                                <td>{{ $distributor->planDescription }}</td>

                                <td>
                                    @if($cuser == 'vip')
                                        <form action="managers-status-update" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="{{$distributor->status}}">
                                            <input type="hidden" name="id" value="{{$distributor->id}}">

                                            <a type="button" class="btn btn-success waves-effect waves-light actions-sm none"
                                               href="provider-edit-{{$distributor->id}}">
                                                <i class="bx bx-pencil d-block font-size-16"></i>
                                            </a>

                                            @if($distributor->status== 1)
                                                <button type="submit"
                                                        class="btn btn-danger waves-effect waves-light actions-sm">
                                                    <i class="bx bx-power-off d-block font-size-16"></i>
                                                </button>
                                            @else
                                                <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light actions-sm">
                                                    <i class="bx bx-power-off d-block font-size-16"></i>
                                                </button>
                                            @endif
                                        </form>
                                    @endif
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
            <br> <a type="button" class="btn btn-primary waves-effect waves-light none" href="user-create">
                <i class="bx bx-user-plus font-size-16 align-middle me-2"></i> Crear
            </a> <br>
        </div> <!-- end col-->
    </div>
    <!-- end row -->

@endsection
