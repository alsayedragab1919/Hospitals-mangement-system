<?php

namespace App\Http\Controllers\AmbulanceController;

use App\Http\Controllers\Controller;
use App\Models\Ambulance;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambulances = Ambulance::all();
        return view('Dashboard.Ambulance.index',compact('ambulances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Ambulance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $ambulance = new Ambulance();
            $ambulance->car_number = $request->car_number;
            $ambulance->car_model = $request->car_model;
            $ambulance->car_year_made = $request->car_year_made;
            $ambulance->driver_license_number = $request->driver_license_number;
            $ambulance->driver_phone = $request->driver_phone;
            $ambulance->is_available = 1;
            $ambulance->car_type = $request->car_type;
            $ambulance->save();
     
            
            $ambulance->driver_name = $request->driver_name;
            $ambulance->notes = $request->notes;
            $ambulance->save();
     
           session()->flash('add');
           return redirect()->back();
     
             }catch (\Exception $e) {
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
        $ambulance = Ambulance::findorfail($id);
        return view('Dashboard.Ambulance.edit',compact('ambulance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->has('is_available'))
        $request->request->add(['is_available' => 1]);
    else
        $request->request->add(['is_available' => 2]);

    $ambulance = Ambulance::findOrFail($request->id);

    $ambulance->update($request->all());

    // insert trans
    $ambulance->driver_name = $request->driver_name;
    $ambulance->notes = $request->notes;
    $ambulance->save();

    session()->flash('edit');
    return redirect()->route('Ambulance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Ambulance::destroy($request->id);
        session()->flash('delete');
        return redirect()->back();
    }
}
