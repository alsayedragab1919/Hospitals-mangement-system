@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h4 class="content-title mb-0 my-auto">{{trans('Dashboard/Ambulance.Ambulances')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{trans('Dashboard/Ambulance.Ambulance_cars')}} </span>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alerts')
                <!-- row opened -->
                <div class="row row-sm">
                    <!--div-->
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <a href="{{route('Ambulance.create')}}" class="btn btn-primary">{{trans('Dashboard/Ambulance.a_new')}}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-md-nowrap" id="example1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th >{{trans('Dashboard/Ambulance.car_number')}}</th>
                                                <th >{{trans('Dashboard/Ambulance.car_model')}}</th>
                                                <th>{{trans('Dashboard/Ambulance.car_made')}}</th>
                                                <th>{{trans('Dashboard/Ambulance.car_type')}}</th>
                                                <th >{{trans('Dashboard/Ambulance.driver_name')}}</th>
                                                <th >{{trans('Dashboard/Ambulance.driver_license_number')}}</th>
                                                <th >{{trans('Dashboard/Ambulance.driver_phone')}}</th>
                                                <th >{{trans('Dashboard/Ambulance.is_available')}}</th>
                                                <th >{{trans('Dashboard/Ambulance.notes')}}</th>
                                                <th >{{trans('Dashboard/Ambulance.operation')}}</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ambulances as $ambulance)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$ambulance->car_number}}</td>
                                                <td>{{$ambulance->car_model}}</td>
                                                <td>{{$ambulance->car_year_made}}</td>
                                                <td>{{$ambulance->car_type == 1 ?  trans('Dashboard/Ambulance.Owned'): trans('Dashboard/Ambulance.rent')}}</td>
                                                <td>{{$ambulance->driver_name}}</td>
                                                <td>{{$ambulance->driver_license_number}}</td>
                                                <td>{{$ambulance->driver_phone}}</td>

                                                <td>
                                                <div class="dot-label bg-{{$ambulance->is_available == 1 ? 'success' : 'danger '}} ml-1"></div>
                                                {{$ambulance->is_available == 1 ? trans('Dashboard/Ambulance.Enabled'):trans('Dashboard/Ambulance.Not_Enabled')}}
                                                </td>

                                                <td>{{$ambulance->notes}}</td>
                                                <td>
                                                    <a href="{{route('Ambulance.edit',$ambulance->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deleted{{$ambulance->id}}"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('Dashboard.Ambulance.delete')
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- bd -->
                        </div><!-- bd -->
                    </div>
                    <!--/div-->
                </div>
                <!-- /row -->
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
