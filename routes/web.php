<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

use App\Models\Room;
use App\Models\Doctor;
use App\Models\Drug;
use App\Models\Message;
use App\Http\Controllers\NurseController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

// Rooms Route
Route::resource('/rooms', RoomController::class);

//Drug Route
Route::resource('/drugs',DrugController::class);

//Message Route
Route::resource('/messages', MessageController::class);

//Appointment Route
Route::resource('/appointments',AppointmentController::class);


// Doctors Route
Route::resource('/doctors',DoctorController::class);

// Nurse Route
Route::resource('/nurses',NurseController::class);