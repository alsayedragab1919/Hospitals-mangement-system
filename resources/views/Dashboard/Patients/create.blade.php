@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
   {{__('Dashboard/patient.add')}}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">  {{__('Dashboard/patient.add')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/   {{__('Dashboard/patient.list_patient')}}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alerts')
<!-- row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{route('Patients.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <label>{{__('Dashboard/patient.patient_name')}}</label>
                            <input type="text" name="name"  value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror " required>

                        </div>

                        <div class="col">
                            <label>{{__('Dashboard/patient.patient_email')}}</label>
                            <input type="email" name="email"  value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" required>
                        </div>


                        <div class="col">
                            <label>{{__('Dashboard/patient.patient_birthday')}}</label>
                            <input class="form-control fc-datepicker" name="Date_Birth" placeholder="YYYY-MM-DD"
                             type="text" required>
                        </div>

                    </div>
                    <br>

                    <div class="row" >
                        <div class="col-3">
                            <label>{{__('Dashboard/patient.patient_phone')}}</label>
                            <input type="number" name="Phone"  value="{{old('Phone')}}" class="form-control @error('Phone') is-invalid @enderror" required>
                        </div>

                        <div class="col">
                            <label>{{__('Dashboard/patient.patient_gender')}}</label>
                            <select class="form-control" name="Gender" required>
                                <option value="" selected>{{__('Dashboard/patient.chose')}}</option>
                                <option value="1">{{__('Dashboard/patient.male')}}</option>
                                <option value="2">{{__('Dashboard/patient.female')}}</option>
                            </select>
                        </div>

                        <div class="col">
                            <label>{{__('Dashboard/patient.boold_type')}}</label>
                            <select class="form-control" name="Blood_Group" required>
                                <option value="" selected>{{__('Dashboard/patient.chose')}}</option>
                                <option value="O-">{{__('Dashboard/patient.O-')}}</option>
                                <option value="O+">{{__('Dashboard/patient.O+')}}</option>
                                <option value="A+">{{__('Dashboard/patient.A+')}}</option>
                                <option value="A-">{{__('Dashboard/patient.A-')}}</option>
                                <option value="B+">{{__('Dashboard/patient.B+')}}</option>
                                <option value="B-">{{__('Dashboard/patient.B-')}}</option>
                                <option value="AB+">{{__('Dashboard/patient.AB+')}}</option>
                                <option value="AB-">{{__('Dashboard/patient.AB-')}}</option>
                            </select>
                            @error('Blood_Group')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <dev class="row">
                        <div class="col-6">
                            <label>{{__('Dashboard/patient.password')}}</label>
                            <input type="password" name="password"   class="form-control" >
                        </div>
                        <div class="col-6">
                            <label>{{__('Dashboard/patient.confirm_password')}}</label>
                            <input type="password" name="password"  class="form-control" >
                        </div>
                    </dev>
                    <div class="row">
                        <div class="col">
                            <label>{{__('Dashboard/patient.address')}}</label>
                            <textarea rows="5" cols="10" class="form-control @error('Address') is-invalid @enderror"  name="Address" ></textarea>
                            @error('Address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <br>


                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success">{{__('Dashboard/patient.Save')}}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>


    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
