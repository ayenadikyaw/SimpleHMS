<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nurse;
use App\Http\Requests\AddNurse;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddNewMailTemplate;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nurse = new Nurse();
        $all_nurses = $nurse->getAllNurses();
        return view('Employee.nurse', [
            'nurses' => $all_nurses,  
            'number_of_nurses' => $nurse->number_of_nurses(),
            'number_of_specialities' => $nurse->number_of_specialities(),
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Employee.add_nurse');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNurse $request)
    {
        $nurse = new Nurse();
        $nurse->addNurse($request);

        $email = 'ayenadikyaw.tgi@gmail.com';
        Mail::to($email)->send(new AddNewMailTemplate($request, 'nurses'));

        return redirect()->route('nurses.index')->with('success', 'Nurse added successfully');
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
        $nurse = Nurse::find($id);
        return view('Employee.edit_nurse', [
            'nurse' => $nurse,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nurse = Nurse::find($id);
        $nurse->updateNurse($request, $id);
        return redirect()->route('nurses.index')->with('success', 'Nurse updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nurse = Nurse::find($id);
        $nurse->deleteNurse($id);
        return redirect()->route('nurses.index')->with('success', 'Nurse deleted successfully');
    }

    public function number_of_nurses(){
        $nurse = new Nurse();
        return $nurse->number_of_nurses();
    }

    public function number_of_specialities(){
        $nurse = new Nurse();
        return $nurse->number_of_specialities();
    }
}
