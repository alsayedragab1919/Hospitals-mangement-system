<?php

namespace App\Http\Controllers\Dashboard\Dashboard_Rays;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Dashboard_Ray_Employee\InvoicesRepositoryInterface;
use App\Models\Ray;
use App\Traits\uploadimgTrait;
use Illuminate\Support\Facades\DB;
class InvoiceRayController extends Controller
{
    use uploadimgTrait;
    public function index()
   {
       $invoices = Ray::where('case',0)->get();
       return view('Dashboard.dashboard-rays.invoice.index',compact('invoices'));
   }

   public function completed_invoices()
   {
       $invoices = Ray::where('case',1)->where('employee_id',auth()->user()->id)->get();
       return view('Dashboard.dashboard-rays.invoice.completed_invoices',compact('invoices'));
   }

    public function edit($id)
   {
       $invoice = Ray::findorFail($id);
       return view('Dashboard.dashboard-rays.invoice.add_diagnosis',compact('invoice'));
   }

   public function update(Request $request, $id)
   {
       $invoice = Ray::findorFail($id);

       $invoice->update([
           'employee_id'=> auth()->user()->id,
           'description_employee'=> $request->description_employee,
           'case'=> 1,
       ]);


       if( $request->hasFile( 'photos' ) ) {

         foreach ($request->photos as $photo) {
             //Upload img
             $this->verifyAndStoreImageForeach($photo,'Rays','upload_image',$invoice->id,'App\Models\Ray');
         }

       }
       session()->flash('edit');
       return redirect()->route('invoices_ray_employee.index');

   }

   public function ViewRays($id)
   {
       $rays = Ray::findorFail($id);
       if($rays->employee_id !=auth()->user()->id){
           //abort(404);
           return redirect()->route('404');
       }
       return view('Dashboard.dashboard-rays.invoice.patient_Details', compact('rays'));
   }

}
