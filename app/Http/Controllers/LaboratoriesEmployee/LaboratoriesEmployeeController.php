<?php

namespace App\Http\Controllers\LaboratoriesEmployee;

use App\Http\Controllers\Controller;
use App\Models\LaboratorieEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class LaboratoriesEmployeeController extends Controller
{
    public function index()
    {
        $laboratorie_employees = LaboratorieEmployee::all();
        return view('Dashboard.laboratorie_employee.index',compact('laboratorie_employees'));
    }

    public function store(Request $request)
    {
        try {

            $laboratorie_employees = new LaboratorieEmployee();
            $laboratorie_employees->name = $request->name;
            $laboratorie_employees->email = $request->email;
            $laboratorie_employees->password = Hash::make($request->password);
            $laboratorie_employees->save();
            session()->flash('add');
            return back();

        }
        catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password']=Hash::make($input['password']);
        }else{
            $input = Arr::except($input, ['password']);
        }
        $ray_employee = LaboratorieEmployee::find($id);
        $ray_employee->update($input);

        session()->flash('edit');
        return redirect()->back();
    }

   

    
  
    public function destroy($id)
    {
        try{
            LaboratorieEmployee::destroy($id);
            session()->flash('delete');
            return redirect()->back();
        }catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
