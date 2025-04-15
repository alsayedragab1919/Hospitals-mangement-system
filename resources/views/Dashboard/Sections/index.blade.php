@extends('Dashboard.layouts.master')
@section('title')
    {{trans('Dashboard/main-sidebar-trans.sections')}}
@stop
@section('css')

<link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('Dashboard/main-sidebar-trans.sections')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Dashboard/main-sidebar-trans.section_all')}}</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alerts')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                            {{trans('Dashboard/main-sidebar-trans.add')}}
                        </button>
                    </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">{{trans('Dashboard/sections_trans.id')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('Dashboard/sections_trans.name_sections')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('Dashboard/sections_trans.created_at')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('Dashboard/main-sidebar-trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sections as $section)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{route('Sections.show',$section->id)}}">{{$section->name}}</a> </td>
                               
                                <td>{{$section->created_at->diffForHumans()}}</td>
                                <td>
                                    <a class="modal-effect btn btn-bg btn-info" data-effect="effect-scale" data-toggle="modal"  href="#edit{{$section->id}}"><i class="las la-pen"></i></a>
                                    <a class="modal-effect btn btn-bg btn-danger" data-effect="effect-scale" data-toggle="modal" href="#delete{{$section->id}}"><i class="las la-trash"></i></a>

                                </td>
                            </tr>
                            @include('Dashboard.Sections.edit')
                             @include('Dashboard.Sections.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

    </div>
    @include('Dashboard.Sections.add')
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
  
    <!--Internal  Datatable js -->
   
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
