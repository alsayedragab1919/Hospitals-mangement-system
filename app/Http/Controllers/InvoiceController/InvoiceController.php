<?php

namespace App\Http\Controllers\InvoiceController;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Laboratorie;
use App\Models\Patient;
use App\Models\Ray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class InvoiceController extends Controller
{

    public function index()
    {
        $invoices = Invoice::where('doctor_id',  Auth::user()->id)->where('invoice_status',1)->get();
        return view('Dashboard.doctor.invoices.index',compact('invoices'));

    }


    public function reviewInvoices()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status',2)->get();
        return view('Dashboard.doctor.invoices.review_invoices',compact('invoices'));
    }


    public function completedInvoices(Request $request)
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 3)->get();
        return view('Dashboard.Doctor.invoices.completed_invoices', compact('invoices'));
    }


    public function show($id)
    {
        $rays = Ray::findorFail($id);
        return view('Dashboard.doctor.invoices.view_rays', compact('rays'));
    }


    public function showLaboratorie($id)
    {
        $laboratories = Laboratorie::findorFail($id);
        if($laboratories->doctor_id !=auth()->user()->id){
            //abort(404);
            return redirect()->route('404');
        }
        return view('Dashboard.Doctor.invoices.view_laboratores', compact('laboratories'));
    }

    public function destroy(Request $request)
    {

        Patient::destroy($request->id);
        session()->flash('delete');
        return redirect()->back();
    }

}
