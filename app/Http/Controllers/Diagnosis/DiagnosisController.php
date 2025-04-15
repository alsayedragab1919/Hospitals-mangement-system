<?php

namespace App\Http\Controllers\Diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnostic;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
class DiagnosisController extends Controller
{
    
   

   
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
        $this->invoice_status($request->invoice_id,3);
         $diagnosis = new Diagnostic();
         $diagnosis->date = date('Y-m-d');
         $diagnosis->diagnosis = $request->diagnosis;
         $diagnosis->medicine = $request->medicine;
         $diagnosis->invoice_id = $request->invoice_id;
         $diagnosis->patient_id = $request->patient_id;
         $diagnosis->doctor_id = $request->doctor_id;
         $diagnosis->save();
         DB::commit();
         session()->flash('add');
         return redirect()->back();
        }
        catch(\Exception $e){
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    
    public function show($id)
    {
        $patient_records = Diagnostic::where('patient_id',$id)->get();
        return view('Dashboard.Doctor.invoices.patient-record',compact('patient_records'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addReview(Request$request)
    {
        $this->invoice_status($request->invoice_id,2);
             $diagnosis = new Diagnostic();
             $diagnosis->date = date('Y-m-d');
             $diagnosis->review_date = date('Y-m-d H:i:s');
             $diagnosis->diagnosis = $request->diagnosis;
             $diagnosis->medicine = $request->medicine;
             $diagnosis->invoice_id = $request->invoice_id;
             $diagnosis->patient_id = $request->patient_id;
             $diagnosis->doctor_id = $request->doctor_id;
             $diagnosis->save();
 
             DB::commit();
             session()->flash('add');
             return redirect()->back();
    }

    public function invoice_status($invoice_id,$id_status){
        $invoice_status = Invoice::findorFail($invoice_id);
        $invoice_status->update([
            'invoice_status'=>$id_status
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
