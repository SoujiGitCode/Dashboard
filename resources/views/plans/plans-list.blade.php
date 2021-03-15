@extends('layouts.master')

@section('title') @lang('translation.Projects_List') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1')Agentes @endslot
        @slot('title') Lista de Agentes
        @endslot

    @endcomponent

    @php
        $cuser = Auth::user()->role->slug;
        $i = 1;
    @endphp

    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <div class="table-responsive">
                    <table class="table project-list-table table-nowrap align-middle table-borderless">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 100px">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Max Hoteles</th>
                            <th scope="col">Max Usuarios</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Actualizar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plans as $plan)

                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <h5 class="text-truncate font-size-14">{{$plan->name}}</h5>
                                </td>
                                <!-- Max-Hotels column -->
                                <td>
                                    @if ($plan->id !== 4)
                                    <input type="number"  name="max_hotels{{ $plan->id }}" min="1" value="{{ old('max_hoteles', $plan->max_hotels) }}"
                                           placeholder="{{$plan->max_hotels}}">
                                    @endif

                                </td>
                                <!-- Max-Users column -->
                                <td>
                                    @if ($plan->id !== 4)
                                    <input type="number" name="max_users{{ $plan->id }}" min="1" value="{{ old('max_users', $plan->max_users) }}"
                                           placeholder="{{$plan->max_users}}">
                                    @endif
                                </td>
                                <!-- Description column -->
                                <td>{{$plan->description}}</td>

                                <td>
                                    <form action="plan-update" method="POST">
                                        @csrf
                                    @if($cuser == 'vip' and $plan->id !== 4)
                                            <input type="hidden" name="max_hotels_form" value="">
                                            <input type="hidden" name="max_users_form" value="">
                                            <input type="hidden" name="desc" value="">
                                        <input type="hidden" name="id" value="{{ $plan->id }}" >
                                        <button type="submit"  class="btn btn-success waves-effect waves-light actions-sm"
                                                onclick="valuesFinal({{ $plan->id }})">
                                            <i class="bx bx-pencil d-block font-size-16">
                                             </i>
                                        </button>


                                        @endif

                                    </form>
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
        </div> <!-- end col-->
    </div>
    <!-- end row -->

@endsection

<script>
     function valuesFinal(id){
         $hotels= $('input[name="max_hotels'+id+'"]').val();
         $users= $('input[name="max_users'+id+'"]').val();
         $description= $('input[name="description'+id+'"]').val();
         console.log($hotels);
         $('input[name="max_hotels_form"]').val($hotels);
         $('input[name="max_users_form"]').val($users);
         $('input[name="description_form"]').val($description);
     }

</script>
