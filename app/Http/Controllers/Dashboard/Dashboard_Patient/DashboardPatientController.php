<?php

namespace App\Http\Controllers\Dashboard\Dashboard_Patient;

use App\Models\Ray;
use App\Models\Invoice;
use App\Models\Diagnostic;
use App\Models\Laboratorie;
use Illuminate\Http\Request;

use App\Models\ReceiptAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardPatientController extends Controller
{
    public function invoices(){
        $invoices =Invoice::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.invoice',compact('invoices'));
    }
    public function laboratories(){
        $laboratories = Laboratorie::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.laboratories',compact('laboratories'));
    }
    public function viewLaboratories($id){
        $laboratorie = Laboratorie::findorFail($id);
        if($laboratorie->patient_id !=auth()->user()->id){
            return redirect()->route('404');
        }
        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.patient_details', compact('laboratorie'));

    }
    public function rays(){

        $rays = Ray::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.rays',compact('rays'));
    }
    public function viewRays($id)
    {
        $rays = Ray::findorFail($id);
        if($rays->patient_id !=auth()->user()->id){
            return redirect()->route('404');
        }
        return view('Dashboard.dashboard-rays.invoice.patient_Details', compact('rays'));
    }
    public function payments(){

        $payments = ReceiptAccount::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.payments',compact('payments'));
    }
    public function index($id){

        $patient_records = Diagnostic::where('patient_id',$id)->get();
        $patient_rays = Ray::where('patient_id',$id)->get();
        $patient_Laboratories  = Laboratorie::where('patient_id',$id)->get();
        return view('Dashboard.doctor.invoices.patient_details',compact('patient_records','patient_rays','patient_Laboratories'));
    }
}
