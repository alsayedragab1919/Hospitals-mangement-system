<?php

namespace App\Http\Controllers\Laboratories;

use App\Http\Controllers\Controller;
use App\Models\Laboratorie;
use Illuminate\Http\Request;

class LaboratorieController extends Controller
{




    public function store(Request $request)
    {
        try {

            Laboratorie::create([
                'description'=>$request->description,
                'invoice_id'=>$request->invoice_id,
                'patient_id'=>$request->patient_id,
                'doctor_id'=>$request->doctor_id,
            ]);
            session()->flash('add');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $Laboratorie = Laboratorie::findOrFail($id);
            $Laboratorie->update([
                'description' => $request->description,
            ]);
            session()->flash('edit');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy($id)
    {
        try {
            Laboratorie::destroy($id);
            session()->flash('delete');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
