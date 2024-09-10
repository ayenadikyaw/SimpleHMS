<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Doctor;
use App\Models\Drug;
use App\Models\Appointment;
use App\Models\Message;
use App\Models\Nurse;
class DashboardController extends Controller
{
    public function index()
    {
        $doctor = new Doctor();
        $room = new Room();
        $drug = new Drug();
        $appointment = new Appointment();
        $message = new Message();

        $number_of_doctors = $doctor->number_of_doctors();
        $number_of_rooms = $room->number_of_rooms();
        $number_of_available_rooms = $room->number_of_available_rooms();
        $number_of_today_appointments = $appointment->number_of_today_appointments();
        $total_revenue = $room->total_revenue();
        $monthly_revenue = $room->monthly_revenue();
        $employee_distribution = $this->employeeDistribution();

        $all_doctors = $doctor->getAllDoctors();
        $all_rooms = $room->getAllRooms();
        $all_drugs = $drug->allDrugs();
        $all_appointments = $appointment->allAppointments();
        $all_messages = $message->allMessages();

        return view('dashboard', [
          'number_of_doctors' => $number_of_doctors,
          'number_of_rooms' => $number_of_rooms,
          'number_of_available_rooms' => $number_of_available_rooms,
          'number_of_today_appointments' => $number_of_today_appointments,
          'total_revenue' => $total_revenue,
          'monthly_revenue' => $monthly_revenue,
          'all_doctors' => $all_doctors,
          'all_rooms' => $all_rooms,
          'all_drugs' => $all_drugs,
          'all_appointments' => $all_appointments,
          'all_messages' => $all_messages,
          'current_year_revenue' => $this->getCurrentYearRevenue(),
          'employee_distribution' => $employee_distribution,
        ]);
    }

    public function getCurrentYearRevenue()
    {
        $room = new Room();
        $revenue = $room->current_year_revenue();
        return $revenue;
    }

    public function employeeDistribution()
    {
        $doctor = new Doctor();
        $number_of_doctors = $doctor->number_of_doctors();
        $nurse = new Nurse();
        $number_of_nurses = $nurse->number_of_nurses();
        $employee_distribution = [$number_of_doctors, $number_of_nurses];
        return $employee_distribution;
    }
}
