@extends('Dashboard.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('Dashboard/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('Dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{__('Dashboard/patient.patient_control_panel')}}</h2>
                            <br><br>
						  <p class="mg-b-0">{{__('Dashboard/patient.welcome_back')}}</p><br>
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">{{__('Dashboard/dashboards.total_number_invoices')}}</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Invoice::count()}}</h4>
										</div>
									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">{{__('Dashboard/dashboards.Total_Payments')}}</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white"><a style="color: white" href="{{route('payments.patient')}}">{{App\Models\PatientAccount::where('patient_id',auth()->user()->id)->sum('credit')}}</a></h4>
										</div>
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
					</div>

				</div>
				<!-- row closed -->

                <div class="row row-sm row-deck">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-table-two">
                            <div class="d-flex justify-content-between">
                                <h2 class="card-title mb-1">{{__('Dashboard/dashboards.last_5_bill')}}</h2>
                            </div><br>
                            <div class="table-responsive country-table">
                                <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('Dashboard/dashboards.Bill_Date')}}</th>
                                        <th>{{__('Dashboard/dashboards.Patient_Name')}}</th>
                                        <th>{{__('Dashboard/dashboards.doctor_name')}}</th>
                                        <th>{{__('Dashboard/dashboards.Invoice_Status')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse(\App\Models\Invoice::latest()->take(5)->where('patient_id',auth()->user()->id)->get() as $invoice )
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td class="tx-right tx-medium tx-inverse">{{$invoice->created_at}}</td>
                                            <td class="tx-right tx-medium tx-danger">{{$invoice->patient->name}}</td>
                                            <td class="tx-right tx-medium tx-inverse">{{$invoice->doctor->name}}</td>
                                            <td class="tx-right tx-medium tx-inverse">
                                                @if($invoice->invoice_status == 1)
                                                    <span class="badge badge-danger">{{__('Dashboard/dashboards.Under_process')}}</span>
                                                @else
                                                    <span class="badge badge-success">{{__('Dashboard/dashboards.Completed')}}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        {{__('Dashboard/rays.no_Data')}}
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- /row -->
			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('Dashboard/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('Dashboard/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('Dashboard/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('Dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('Dashboard/js/index.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
