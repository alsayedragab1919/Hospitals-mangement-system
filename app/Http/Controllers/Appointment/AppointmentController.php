<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;

use App\Models\WebSite;

use Illuminate\Http\Request;
use App\Mail\AppointmentConfirmation;
use Illuminate\Support\Facades\Mail;
class AppointmentController extends Controller
{

    public function index()
    {
        $appointments = WebSite::where('type','غير مؤكد')->get();
        return view('Dashboard.Appointments.index',compact('appointments'));
    }

    public function index2(){

        $appointments = WebSite::where('type','مؤكد')->get();
        return view('Dashboard.Appointments.index2',compact('appointments'));
    }

    public function approval(Request $request,$id){
        $appointment = WebSite::findorFail($id);
        $appointment->update([
            'type'=>'مؤكد',
            'appointment'=>$request->appointment
        ]);
          Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment->name,$appointment->appointment));
        session()->flash('add');
        return back();
    }
    public function index3()
    {
        $appointments = WebSite::where('type','منتهي')->get();
        return view('Dashboard.Appointments.index3',compact('appointments'));
    }

    public function destroy(Request $request)
    {

        WebSite::destroy($request->id);
        session()->flash('delete');
        return back();
    }
    }

