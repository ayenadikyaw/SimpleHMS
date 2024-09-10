@extends('layout.sidebar')

@section('content')

<h1 class="text-2xl font-bold font-sans text-dark dark:text-primary">SAKURA HOSPITAL MANAGEMENT SYSTEM</h1>

@if($errors->any())
@foreach ($errors->all() as $error)
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-5" role="alert">
    <strong class="font-bold">Error!</strong>
    <span class="block sm:inline">{{ $error }}</span>
    <span class="close absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
</div>
@endforeach
@endif


<div class="mt-12 flex flex-col justify-center items-center">
    <h2 class="text-2xl font-bold font-sans mb-4">Add New Appointment</h2>
    <form action="/appointments" method="POST" class="bg-white dark:bg-dark shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/2">
        @csrf
        <input type="hidden" name="previous_url" value={{ $previousUrl }}>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="description">
                Description
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600" id="description" type="text" name="description" placeholder="E.g. Patient with fever">{{ old('description') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="doctor_id">
                Doctor
            </label>
            <select value="{{ old('doctor_id') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600" id="doctor_id" type="text" name="doctor_id" placeholder="E.g. 100mg">
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
       
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="room_id">
                Room
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600" id="room_id" type="text" name="room_id" placeholder="E.g. 100mg">
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->room_no }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="appointment_datetime">
                Appointment Date and Time
            </label>
            <div class="flex space-x-2">
                <input value="{{ old('appointment_date') }}" class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600" id="appointment_date" type="date" name="appointment_date" >
                <input value="{{ old('appointment_time') }}" class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600" id="appointment_time" type="time" name="appointment_time" step="60">
            </div>
        </div>
        <div class="flex items-center justify-between">
                <button class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Add Appointment
            </button>
            
        </div>
    </form>
</div>

<script>
    document.querySelectorAll('.close').forEach(function(button) {
     button.addEventListener('click', function() {
         this.parentElement.remove();
     });
 });
 </script>
 
 
@endsection