<?php

namespace App\Http\Livewire\Appointments;
use App\Models\Boold_Group;
use App\Models\Doctor;
use App\Models\section;
use App\Models\type;
use App\Models\WebSite;
use Livewire\Component;

class Create extends Component
{
    public $doctors;
    public $sections;
    public $doctor;
    public $section;
    public $name;
    public $email;
    public $phone;
    public $notes;
    public $Blood_Group;
    public $Gender;
    public $appointment_patient;
    public $message= false;
    public $message2= false;


    public function mount(){

        $this->sections = Section::get();
        $this->doctors = collect();


    }


    public function updatedSection($section_id){

        $this->doctors = Doctor::where('section_id',$section_id)->get();

    }

    public function store(){
        $appointment_count = WebSite::where('doctor_id', $this->doctor)->where('type', 'غير مؤكد')->where('appointment_patient', $this->appointment_patient)->count();
        $doctor_info = Doctor::find($this->doctor);

        if ($appointment_count == $doctor_info->number_of_statements) {
            $this->message2 = true;
            return back();
        }
        $appointments = new WebSite();
        $appointments->doctor_id = $this->doctor;
        $appointments->section_id = $this->section;
        $appointments->name = $this->name;
        $appointments->email = $this->email;
        $appointments->phone = $this->phone;
        $appointments->Blood_Group = $this->Blood_Group;
        $appointments->Gender = $this->Gender;
        $appointments->appointment_patient = $this->appointment_patient;
        $appointments->notes = $this->notes;
        $appointments->save();
        $this->message =true;

    }
    public function render()
    {
        return view('livewire.appointments.create',[
            'sections' => Section::get(),
        ]);
    }
}
