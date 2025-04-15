@extends('Dashboard.layouts.master')
@section('css')

@endsection
@section('title')
    {{__('Dashboard/patient.Patient_information')}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('Dashboard/patient.Patient_information')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{__('Dashboard/patient.view_all')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card" id="basic-alert">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-1">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li class="nav-item"><a href="#tab1" class="nav-link active"
                                                                    data-toggle="tab">{{__('Dashboard/patient.Patient_information')}}</a></li>
                                            <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">{{__('Dashboard/group_invoice.invoice')}}</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">{{__('Dashboard/patient.Payments')}}</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab4" class="nav-link" data-toggle="tab">{{__('Dashboard/patient.account_statement')}}
                                                    </a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">


                                        {{-- Strat Show Information Patient --}}

                                        <div class="tab-pane active" id="tab1">
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{__('Dashboard/patient.patient_name')}}</th>
                                                        <th>{{__('Dashboard/patient.patient_phone')}}</th>
                                                        <th>{{__('Dashboard/patient.patient_email')}}</th>
                                                        <th>{{__('Dashboard/patient.patient_birthday')}}</th>
                                                        <th>{{__('Dashboard/patient.patient_gender')}}</th>
                                                        <th>{{__('Dashboard/patient.boold_type')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{$Patient->name}}</td>
                                                        <td>{{$Patient->Phone}}</td>
                                                        <td>{{$Patient->email}}</td>
                                                        <td>{{$Patient->Date_Birth}}</td>
                                                        <td>{{$Patient->Gender == 1 ? __('Dashboard/patient.male'):__('Dashboard/patinet.female') }}</td>
                                                        <td>{{$Patient->Blood_Group}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- End Show Information Patient --}}



                                        {{-- Start Invices Patient --}}

                                        <div class="tab-pane" id="tab2">

                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{__('Dashboard/GroupServices.name')}}</th>
                                                        <th>{{__('Dashboard/group_invoice.Invoice_date')}}</th>
                                                        <th>{{__('Dashboard/GroupServices.total_with_tax')}}</th>
                                                        <th>{{__('Dashboard/group_invoice.Invoice_type')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($invoices as $invoice)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$invoice->Service->name ?? $invoice->Group?->name}}</td>
                                                            <td>{{$invoice->invoice_date}}</td>
                                                            <td>{{$invoice->total_with_tax}}</td>
                                                            <td>{{$invoice->type == 1 ? __('Dashboard/group_invoice.cash') : __('Dashboard/group_invoice.credit')}}</td>
                                                        </tr>
                                                        <br>
                                                    @endforeach
                                                    <tr>
                                                        <th colspan="4" scope="row" class="alert alert-success">
                                                            {{__('Dashboard/group_invoice.total')}}
                                                        </th>
                                                        <td class="alert alert-primary">{{ number_format( $invoices->sum('total_with_tax') , 2)}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- End Invices Patient --}}



                                        {{-- Start Receipt Patient  --}}

                                        <div class="tab-pane" id="tab3">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{__('Dashboard/group_invoice.Invoice_date')}}</th>
                                                        <th>{{__('Dashboard/payment.Amount')}}</th>
                                                        <th>{{__('Dashboard/payment.statement')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($receipt_accounts as $receipt_account)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$receipt_account->date}}</td>
                                                            <td>{{$receipt_account->amount}}</td>
                                                            <td>{{$receipt_account->description}}</td>
                                                        </tr>
                                                        <br>
                                                    @endforeach
                                                    <tr>
                                                        <th scope="row" class="alert alert-success">{{__('Dashboard/group_invoice.total')}}
                                                        </th>
                                                        <td colspan="4"
                                                            class="alert alert-primary">{{ number_format( $receipt_accounts->sum('amount') , 2)}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- End Receipt Patient  --}}


                                        {{-- Start payment accounts Patient --}}
                                        <div class="tab-pane" id="tab4">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center" id="example1">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{__('Dashboard/group_invoice.Invoice_date')}}</th>
                                                        <th>{{__('Dashboard/payment.statement')}}</th>
                                                        <th>{{__('Dashboard/payment.Debit')}}</th>
                                                        <th>{{__('Dashboard/payment.Credit')}}</th>
                                                        <th>{{__('Dashboard/payment.Final_Balance')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($Patient_accounts as $Patient_account)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$Patient_account->date}}</td>
                                                            <td>
                                                                @if($Patient_account->invoice_id == true)
                                                                    {{$Patient_account->invoice->Service->name ?? $Patient_account->invoice->Group?->name }}

                                                                @elseif($Patient_account->receipt_id == true)
                                                                    {{$Patient_account->ReceiptAccount->description}}

                                                                @elseif($Patient_account->Payment_id == true)
                                                                    {{$Patient_account->PaymentAccount->description}}
                                                                @endif

                                                            </td>
                                                            <td>{{ $Patient_account->Debit}}</td>
                                                            <td>{{ $Patient_account->credit}}</td>
                                                            <td></td>
                                                        </tr>
                                                        <br>
                                                    @endforeach
                                                    <tr>
                                                        <th colspan="3" scope="row" class="alert alert-success">
                                                            {{__('Dashboard/group_invoice.total')}}
                                                        </th>
                                                        <td class="alert alert-primary">{{ number_format( $Debit = $Patient_accounts->sum('Debit'), 2) }}</td>
                                                        <td class="alert alert-primary">{{ number_format( $credit = $Patient_accounts->sum('credit'), 2) }}</td>
                                                        <td class="alert alert-danger">
                                                            <span class="text-danger"> {{$Debit - $credit}}   {{ $Debit-$credit > 0 ? 'مدين' :'دائن'}}</span>                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>

                                            <br>

                                        </div>

                                        {{-- End payment accounts Patient --}}




                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Prism Precode -->
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
@endsection
@section('js')
@endsection
