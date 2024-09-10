<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;




class Appointment extends Model
{
    use HasFactory;

    public function allAppointments()
    {
        return DB::table('appointments')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('rooms', 'appointments.room_id', '=', 'rooms.id')
            ->select('appointments.*', 'doctors.name as doctor_name', 'doctors.speciality', 'rooms.room_no')
            ->where('appointments.del_flag', 0)
            ->orderBy('appointments.appointment_date', 'desc')
            ->paginate(10);
    }

    public function addNewAppointment(Request $request)
    {
        $appointment_date = $request->appointment_date . ' ' . $request->appointment_time;
        return DB::table('appointments')
            ->insert([
                'description' => $request->description,
                'room_id' => $request->room_id,
                'doctor_id' => $request->doctor_id,
                'appointment_date' => $appointment_date,
            ]);
    }

    public function getAppointmentById($id)
    {
        return DB::table('appointments')
            ->where('id', $id)
            ->first();
    }

    public function updateAppointment(Request $request, $id)
    {
        $appointment_date = $request->appointment_date . ' ' . $request->appointment_time;
        return DB::table('appointments')
            ->where('id', $id)
            ->update([
                'description' => $request->description,
                'room_id' => $request->room_id,
                'doctor_id' => $request->doctor_id,
                'appointment_date' => $appointment_date,
                'updated_at' => now(),
            ]);
    }

    public function deleteAppointment($id)
    {
        return DB::table('appointments')
            ->where('id', $id)
            ->update([
                'del_flag' => 1,
                'updated_at' => now(),
            ]);
    }

    public function checkDuplicateAppointment(Request $request)
    {
        return DB::table('appointments')
            ->where('room_id', $request->room_id)
            ->where('doctor_id', $request->doctor_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('del_flag', 0)
            ->exists();
    }

    public function number_of_today_appointments()
    {
        return DB::table('appointments')->whereDate('appointment_date', date('Y-m-d'))->where('del_flag', 0)->count();
    }

    public function total_appointments()
    {
        return DB::table('appointments')->where('del_flag', 0)->count();
    }

    public function total_assigned_doctors()
    {
        return DB::table('appointments')
            ->where('del_flag', 0)
            ->distinct('doctor_id')
            ->count('doctor_id');
    }

    public function total_assigned_rooms()
    {
        return DB::table('appointments')
            ->where('del_flag', 0)
            ->distinct('room_id')
            ->count('room_id');
    }
}
