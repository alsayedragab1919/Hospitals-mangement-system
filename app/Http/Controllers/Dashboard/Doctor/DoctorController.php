<?php

namespace App\Http\Controllers\Dashboard\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\section;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Traits\uploadimgTrait;
class DoctorController extends Controller
{
    use uploadimgTrait;
    public function index()
    {
        $doctors = Doctor::with('doctorappointments')->get();
        return view('Dashboard.Doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = section::all();
        $appointments = Appointment::all();
        return view('Dashboard/Doctors.add', compact('sections', 'appointments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $doctors = new Doctor();
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->section_id = $request->section_id;
            $doctors->phone = $request->phone;
            $doctors->status = 1;
            $doctors->number_of_statements = $request->number_of_statements;
            $doctors->save();
            // store trans
            $doctors->name = $request->name;
            $doctors->doctorappointments()->attach($request->appointments);
            $doctors->save();
            $this->uploadStoreImage($request,'photo','doctors','upload_image',$doctors->id,'App\Models\Doctor');

        DB::commit();
        session()->flash('add');
        return redirect(route('Doctors.create'));
        }catch(Exception $e){

            DB::rollBack();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sections = section::all();
        $appointments = Appointment::all();
        $doctor = Doctor::findOrfail($id);
        return view('Dashboard.Doctors.edit',compact('sections','appointments','doctor'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{

            $doctor = Doctor::findorfail($request->id);
            $doctor->email = $request->email;
            $doctor->section_id = $request->section_id;
            $doctor->phone = $request->phone;
            $doctor->number_of_statements = $request->number_of_statements;
            $doctor->save();
            // store trans
            $doctor->name = $request->name;
            $doctor->save();

            // update pivot tABLE
            $doctor->doctorappointments()->sync($request->appointments);


           //update
            if ($request->has('photo')){
                // Delete old photo
                if ($doctor->image){
                    $old_img = $doctor->image->filename;
                    $this->Delete_attachment('upload_image','doctors/'.$old_img,$request->id);
                }
                //Upload img
                $this->uploadStoreImage($request,'photo','doctors','upload_image',$request->id,'App\Models\Doctor');
            }

            DB::commit();
           session()->flash('edit');
           return redirect()->back();

     }
     catch(Exception $e){

         DB::rollback();
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);

    }
}

    public function destroy(Request $request)
    {
        if($request->page_id==1){
            if($request->filename){
                $this->Delete_attachment('upload_image','doctors/'.$request->filename,$request->id,$request->filename);
           }
           Doctor::destroy($request->id);
            session()->flash('delete');
            return redirect(route('Doctors.index'));

        }else{
            $delete_select_id = explode(",",$request->delete_select_id);
            foreach( $delete_select_id as $ids_doctors){
                $doctor = Doctor::findOrfail($ids_doctors);
                if($doctor->image){
                    $this->Delete_attachment('upload_image','doctors/'.$doctor->image->filename,$ids_doctors,$doctor->image->filename);
                }
            }
                Doctor::destroy($delete_select_id);
                session()->flash('delete');
                return redirect()->route('Doctors.index');
        }
    }

    public function update_password(Request $request)
    {

        $this->validate($request,[
            'password'=>'required|min:6|confirmed',
             'password_confirmation'=>'required|min:6'

     ]);

       try{

            $doctor =Doctor::findorfail($request->id);
            $doctor-> update([
                'password'=>Hash::make($request->password),
            ]);
            session()->flash('edit');
                return redirect()->back();
       }catch(Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }

    }

    public function update_status(Request $request){

        try{
            $doctor = Doctor::findorfail($request->id);
            $doctor->update([
                'status'=>$request->status,
            ]);
            session()->flash('edit');
                return redirect()->back();

        }catch(Exception $e){
            return redirect()->back()->withErrors(['errors'=> $e->getMessage()]);
        }

    }
}
