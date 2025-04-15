<?php

namespace App\Http\Controllers\PatinetController;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PatientAccount;
use Illuminate\Http\Request;
use App\Models\ReceiptAccount;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatinetController extends Controller
{


    public function index()
    {
        $Patients = Patient::all();
        return view('Dashboard.Patients.index', compact('Patients' ));
    }

    public function Show($id)
    {
        $Patient = patient::findorfail($id);
        $invoices = Invoice::where('patient_id', $id)->get();
        $receipt_accounts = ReceiptAccount::where('patient_id', $id)->get();
        $Patient_accounts = PatientAccount::where('patient_id', $id)->get();
        return view('Dashboard.Patients.show', compact( 'invoices', 'receipt_accounts', 'Patient_accounts','Patient'));
    }

    public function create()
    {
        return view('Dashboard.Patients.create');
    }

    public function store(Request $request)
    {
        try {
            $Patients = new Patient();
            $Patients->email = $request->email;
            $Patients->password = Hash::make($request->password);
            $Patients->Date_Birth = $request->Date_Birth;
            $Patients->Phone = $request->Phone;
            $Patients->Gender = $request->Gender;
            $Patients->Blood_Group = $request->Blood_Group;
            $Patients->save();
            //insert trans
            $Patients->name = $request->name;
            $Patients->Address = $request->Address;
            $Patients->save();
            session()->flash('add');
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $Patient = Patient::findorfail($id);
        return view('Dashboard.Patients.edit', compact('Patient'));
    }

    public function update(Request $request,$id)
    {


        $Patient = Patient::findOrFail($id);


        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }
        else{
            $input = Arr::except($input, ['password']);
        }
        $Patient->update($input);
        $Patient->email = $request->email;
        $Patient->Date_Birth = $request->Date_Birth;
        $Patient->Phone = $request->Phone;
        $Patient->Gender = $request->Gender;
        $Patient->Blood_Group = $request->Blood_Group;
        $Patient->save();
        // insert trans
        $Patient->name = $request->name;
        $Patient->Address = $request->Address;
        $Patient->save();
        session()->flash('edit');
        return redirect()->route('Patients.index');
    }
    public function Rays($id)
    {
        $ray =  Ray::findorfail($id);
        return view('Dashboard.Patients.view_rays', compact('ray'));
    }

    public function destroy(Request $request)
    {
        Patient::destroy($request->id);
        session()->flash('delete');
        return redirect()->back();
    }
}
