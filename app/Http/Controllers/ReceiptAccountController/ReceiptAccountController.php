<?php

namespace App\Http\Controllers\ReceiptAccountController;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\ReceiptAccount;
use App\Models\FundAccount;
use App\Models\PatientAccount;
use Illuminate\Support\Facades\DB;
class ReceiptAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = ReceiptAccount::all();
        return view('Dashboard.Receipt.index',compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Patients = Patient::all();
        return view('Dashboard.Receipt.add',compact('Patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            // store receipt_accounts
            $receipt_accounts = new ReceiptAccount();
            $receipt_accounts->date = date('Y-m-d');
            $receipt_accounts->patient_id = $request->patient_id;
            $receipt_accounts->amount  = $request->Debit;
            $receipt_accounts->description = $request->description;
            $receipt_accounts->save();

               // store fund_accounts

            $fund_accounts =  new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_accounts->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->save();


            $patient_accounts = new PatientAccount();
            $patient_accounts->date = date('Y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->receipt_id= $receipt_accounts->id;  
            $patient_accounts->Debit = 0.00;
            $patient_accounts->credit=$request->Debit;
            $patient_accounts->save();

            DB::commit();
            session()->flash('add');
            return redirect()->route('Receipt.create');



       }
       catch(\Exception $e){
           DB::rollback();
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receipt = ReceiptAccount::findorfail($id);
        return view('Dashboard.Receipt.print',compact('receipt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receipt_accounts = ReceiptAccount::findorfail($id);
        $Patients = Patient::all();
        return view('Dashboard.Receipt.edit',compact('receipt_accounts','Patients'));
    }

    public function update(Request $request, $id)
    {
        try{
            $receipt_accounts = ReceiptAccount::findorfail($request->id);
            $receipt_accounts->date = date('Y-m-d');
            $receipt_accounts->patient_id = $request->patient_id;
            $receipt_accounts->amount  = $request->Debit;
            $receipt_accounts->description = $request->description;
            $receipt_accounts->save();

               // store fund_accounts

            $fund_accounts = FundAccount::where('receipt_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_accounts->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->save();


            $patient_accounts = PatientAccount::where('receipt_id',$request->id)->first();
            $patient_accounts->date = date('Y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->receipt_id= $receipt_accounts->id;  
            $patient_accounts->Debit = 0.00;
            $patient_accounts->credit=$request->Debit;
            $patient_accounts->save();

            DB::commit();
            session()->flash('edit');
            return redirect()->route('Receipt.index');  
        }
        catch(\Exception $e){
         
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            ReceiptAccount::destroy($request->id);
            session()->flash('delete');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
