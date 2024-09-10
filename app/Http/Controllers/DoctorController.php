<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Http\Requests\AddDoctor;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddNewMailTemplate;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor = new Doctor();
        $all_doctors = $doctor->getAllDoctors();
        return view('Employee.doctor', [
            'doctors' => $all_doctors,
            'number_of_doctors' => $this->number_of_doctors(),
            'number_of_specialities' => $this->number_of_specialities(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //emergency logging test
        Log::channel('customlog')->emergency('DoctorController@create');
        
        return view('Employee.add_doctor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDoctor $request)
    {
        $doctor = new Doctor();
       

        if($doctor->checkDuplicateDoctor($request)){
            session()->flash('error', 'Doctor already exists');
            return redirect()->back();
        }
        $doctor->addDoctor($request);
        $email = 'ayenadikyaw.tgi@gmail.com';
        Mail::to($email)->send(new AddNewMailTemplate($request, 'doctors'));

        //logging test
        Log::channel('customlog')->info('Doctor added successfully');

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor = Doctor::find($id);
        return view('Employee.edit_doctor', [
            'doctor' => $doctor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddDoctor $request, string $id)
    {
        $doctor = Doctor::find($id);
        if($doctor->checkDuplicateDoctor($request)){
            session()->flash('error', 'Doctor already exists');
            return redirect()->back();
        }
        $doctor->updateDoctor($request, $id);
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::find($id);
        $doctor->deleteDoctor($id);
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }

    public function number_of_doctors(){
        $doctor = new Doctor();
        return $doctor->number_of_doctors();
    }

    public function number_of_specialities(){
        $doctor = new Doctor();
        return $doctor->number_of_specialities();
    }
}
