<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddAppointment;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Room;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddNewMailTemplate;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $appointment = new Appointment();
        $all_appointments = $appointment->allAppointments();
        return view('Appointment.appointment', [
            'all_appointments' => $all_appointments,
            'total_appointments' => $this->total_appointments(),
            'total_assigned_doctors' => $this->total_assigned_doctors(),
            'total_assigned_rooms' => $this->total_assigned_rooms(),
            'number_of_today_appointments' => $this->number_of_today_appointments(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        //Capture the previous URL
        $previousUrl = url()->previous();

        //Define allowed paths
        $allowedPaths = ['http://127.0.0.1:8000/dashboard', 'http://127.0.0.1:8000/appointments'];

        //Check if the previous URL is in allowed paths
        if (in_array($previousUrl, $allowedPaths)) {
            //Store the previous URL in session
            session(['savedUrl' => $previousUrl]);
        }

        //Retrieve the saved URL from the session (default to dashboard if not set)
        $savedUrl = session('savedUrl', 'http://127.0.0.1:8000/dashboard');

        //Pass the saved URL to the form view
        $appointment = new Appointment();
        $doctor = new Doctor();
        $room = new Room();
        $doctors = $doctor->allDoctors();
        $rooms = $room->allRooms();
        return view('Appointment.add_appointment',[
            'previousUrl' => $savedUrl,
            'doctors' => $doctors,
            'rooms' => $rooms,
          
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddAppointment $request)
    {
        $appointment = new Appointment();
        $previousUrl = $request->input('previous_url');
        if($appointment->checkDuplicateAppointment($request)){
            return redirect($previousUrl)->with('error', 'Appointment already exists');
        }else{
            $appointment->addNewAppointment($request);

            $doctor = new Doctor();
            $doctor = $doctor->getDoctorById($request->doctor_id);

            $room = new Room();
            $room = $room->getRoomById($request->room_id);

            $email = 'ayenadikyaw.tgi@gmail.com';
            Mail::to($email)->send(new AddNewMailTemplate($request, 'appointments', $doctor->name, $room->room_no));

            return redirect($previousUrl)->with('success', 'Appointment added successfully');
        }
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
        //Capture the previous URL
        $previousUrl = url()->previous();

        //Define allowed paths
        $allowedPaths = ['http://127.0.0.1:8000/dashboard', 'http://127.0.0.1:8000/appointments'];

        //Check if the previous URL is in allowed paths
        if (in_array($previousUrl, $allowedPaths)) {
            //Store the previous URL in session
            session(['savedUrl' => $previousUrl]);
        }

        //Retrieve the saved URL from the session (default to dashboard if not set)
        $savedUrl = session('savedUrl', 'http://127.0.0.1:8000/dashboard');

        //Pass the saved URL to the form view
        $appointment = new Appointment();
        $appointment = $appointment->getAppointmentById($id);
        $doctor = new Doctor();
        $room = new Room();
        $doctors = $doctor->allDoctors();
        $rooms = $room->allRooms();
        return view('Appointment.edit_appointment', [
            'appointment' => $appointment,
            'previousUrl' => $savedUrl,
            'doctors' => $doctors,
            'rooms' => $rooms,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddAppointment $request, string $id)
    {
        $appointment = new Appointment();
        $appointment->updateAppointment($request, $id);
        $previousUrl = $request->input('previous_url');
        $redirectUrl = parse_url($previousUrl, PHP_URL_PATH);
        return redirect($redirectUrl)->with('success', 'Appointment updated successfully')  ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = new Appointment();
        $appointment->deleteAppointment($id);
        return redirect(url()->previous())->with('success', 'Appointment deleted successfully');
    }

    public function number_of_today_appointments()
    {
        $appointment = new Appointment();
        return $appointment->number_of_today_appointments();
    }

    public function total_appointments()
    {
        $appointment = new Appointment();
        return $appointment->total_appointments();
    }
    public function total_assigned_doctors()
    {
        $appointment = new Appointment();
        return $appointment->total_assigned_doctors();
    }
    public function total_assigned_rooms()
    {
        $appointment = new Appointment();
        return $appointment->total_assigned_rooms();
    }
}
