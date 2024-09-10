@extends('layout.sidebar')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-2xl font-bold font-sans">Dashboard</h1>
    <!-- Start of Cards -->
    <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-3 lg:grid-cols-6">
        <!-- Rooms Card -->
        <div class="bg-white dark:bg-dark overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-primary dark:bg-secondary rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-300 truncate">
                                Total Rooms
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                                    {{ $number_of_rooms }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doctors Card -->
        <div class="bg-white dark:bg-dark overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-success dark:bg-info rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-300 truncate">
                                Total Doctors
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                                    {{ $number_of_doctors }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
         <!-- Nurses Card -->
    <div class="bg-white dark:bg-dark overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-primary dark:bg-secondary rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-300 truncate">
                            Available Nurses
                        </dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                                42
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

        <!-- Appointments Card -->
        <div class="bg-white dark:bg-dark overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-warning dark:bg-danger rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-300 truncate">
                                Today's Appointments
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                                    {{ $number_of_today_appointments }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>


    <!-- Beds Card -->
    <div class="bg-white dark:bg-dark overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-success dark:bg-info rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-300 truncate">
                            Available Rooms
                        </dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                                {{ $number_of_available_rooms }}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

        <!-- Revenue Card -->
        <div class="bg-white dark:bg-dark overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-info dark:bg-success rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-300 truncate">
                                Total Revenue
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                                    ${{ $total_revenue }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Cards -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-5" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="close">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @php
    session()->forget('success');
    @endphp
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-5" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="close">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @php
    session()->forget('error');
    @endphp
    @endif

    <!-- Start of Tables -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        <!-- Room Status Table -->
        <div class="bg-white dark:bg-dark overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Room Status</h3>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-secondary dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Room</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_rooms as $room)
                            @if($loop->iteration == 5)
                                @break
                            @endif
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $room->room_no }}
                                </th>
                                <td class="px-6 py-4">{{ $room->status }}</td>
                                <td class="px-6 py-4">{{ $room->quantity != 0 ? $room->quantity : 'none' }}</td>
                                <td class="px-6 py-4">{{ $room->price }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2 items-center justify-around gap-5">
                                        <a href="/rooms/{{ $room->id }}/edit" class="text-dark dark:text-primary hover:text-blue-800 dark:hover:text-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path  d="M16.7574 2.99677L14.7574 4.99677H5V18.9968H19V9.23941L21 7.23941V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99677C3 3.44448 3.44772 2.99677 4 2.99677H16.7574ZM20.4853 2.09727L21.8995 3.51149L12.7071 12.7039L11.2954 12.7063L11.2929 11.2897L20.4853 2.09727Z"></path>
                                            </svg>
                                        </a>
                                        <form action="/rooms/{{ $room->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600">
                                                <svg class="w-6 h-6" fill="none" stroke="red" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        <div class="p-5 flex justify-end gap-5">
            <a href="/rooms/create" class="text-dark dark:text-primary font-bold p-2">
                + Add New
            </a>
            <a href="/rooms" class="bg-primary hover:bg-primary-dark text-white font-bold p-2 rounded-full transition duration-300 ease-in-out">
                View All
            </a>
        </div>
        </div>

        <!-- Drug Store Table -->
        <div class="bg-white dark:bg-dark overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Drug Store</h3>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-secondary dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Medicine</th>
                                <th scope="col" class="px-6 py-3">Dosage</th>
                                <th scope="col" class="px-6 py-3">Stock</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_drugs as $drug)
                            @if($loop->iteration == 6)
                                @break
                            @endif
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $drug->name }}
                                </th>
                                <td class="px-6 py-4">{{ $drug->dosage }}</td>
                                <td class="px-6 py-4">{{ $drug->quantity != 0 ? $drug->quantity : 'Out of Stock' }}</td>
                                <td class="px-6 py-4">{{ $drug->price }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2 items-center justify-around gap-5">
                                        <a href="/drugs/{{ $drug->id }}/edit" class="text-dark dark:text-primary hover:text-blue-800 dark:hover:text-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path  d="M16.7574 2.99677L14.7574 4.99677H5V18.9968H19V9.23941L21 7.23941V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99677C3 3.44448 3.44772 2.99677 4 2.99677H16.7574ZM20.4853 2.09727L21.8995 3.51149L12.7071 12.7039L11.2954 12.7063L11.2929 11.2897L20.4853 2.09727Z"></path>
                                            </svg>
                                        </a>
                                        <form action="/drugs/{{ $drug->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600">
                                            <svg class="w-6 h-6" fill="none" stroke="red" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="p-5 flex justify-end gap-5">
                <a href="/drugs/create" class="text-dark dark:text-primary font-bold p-2">
                    + Add New
                </a>
                <a href="/drugs" class="bg-primary hover:bg-primary-dark text-white font-bold p-2 rounded-full transition duration-300 ease-in-out">
                    View All
                </a>
            </div>
        </div>

        <!-- Message Table -->
        <div class="bg-white dark:bg-dark overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">UnreadMessages</h3>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-secondary dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Description</th>
                                <th scope="col" class="px-6 py-3">Time</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_messages as $message)
                            @if($loop->iteration == 5)
                                @break
                            @endif
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $message->message }}
                                    <div class="flex items-center gap-2">
                                        @if($message->is_vip == 1)
                                        <span class="bg-primary text-white p-2 rounded-full"></span>
                                        <span>VIP Message</span>
                                        @endif
                                    </div>
                                </th>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($message->time)->format('g:i A') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2 items-center justify-around gap-5">
                                        <a href="/messages/{{ $message->id }}/edit" class="text-dark dark:text-primary hover:text-blue-800 dark:hover:text-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path  d="M16.7574 2.99677L14.7574 4.99677H5V18.9968H19V9.23941L21 7.23941V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99677C3 3.44448 3.44772 2.99677 4 2.99677H16.7574ZM20.4853 2.09727L21.8995 3.51149L12.7071 12.7039L11.2954 12.7063L11.2929 11.2897L20.4853 2.09727Z"></path>
                                            </svg>
                                        </a>
                                        <form action="/messages/{{ $message->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600">
                                                <svg class="w-6 h-6" fill="none" stroke="red" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="p-5 flex justify-end gap-5">
                <a href="/messages/create" class="text-dark dark:text-primary font-bold p-2">
                    + Add New
                </a>
                <a href="/messages" class="bg-primary hover:bg-primary-dark text-white font-bold p-2 rounded-full transition duration-300 ease-in-out">
                    View All
                </a>
            </div>
        </div>

        <!-- Appointment Table -->
        <div class="bg-white dark:bg-dark overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Appointments</h3>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-secondary dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Doctor</th>
                                <th scope="col" class="px-6 py-3">Room No</th>
                                <th scope="col" class="px-6 py-3">Date & Time</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_appointments as $appointment)
                            @if($loop->iteration == 4)
                                @break
                            @endif
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $appointment->doctor_name }}<span class="text-gray-500">({{ $appointment->speciality }})</span>
                                    <p class="text-gray-500">{{ $appointment->description }}</p>
                                </th>
                                <td class="px-6 py-4">{{ $appointment->room_no }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F j, Y g:i A') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2 items-center justify-around gap-5">
                                        <a href="/appointments/{{ $appointment->id }}/edit" class="text-dark dark:text-primary hover:text-blue-800 dark:hover:text-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path  d="M16.7574 2.99677L14.7574 4.99677H5V18.9968H19V9.23941L21 7.23941V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99677C3 3.44448 3.44772 2.99677 4 2.99677H16.7574ZM20.4853 2.09727L21.8995 3.51149L12.7071 12.7039L11.2954 12.7063L11.2929 11.2897L20.4853 2.09727Z"></path>
                                            </svg>
                                        </a>
                                        <form action="/appointments/{{ $appointment->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600">
                                                <svg class="w-6 h-6" fill="none" stroke="red" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="p-5 flex justify-end gap-5">
                <a href="/appointments/create" class="text-dark dark:text-primary font-bold p-2">
                    + Add New
                </a>
                <a href="/appointments" class="bg-primary hover:bg-primary-dark text-white font-bold p-2 rounded-full transition duration-300 ease-in-out">
                    View All
                </a>
            </div>
        </div>
     
    </div>
    <!-- End of Tables -->

    <!-- Start of Charts -->
    <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">
        <!-- Revenue Chart -->
        <div class="bg-white dark:bg-dark overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Current Year Revenue</h3>
                <div id="revenueChart" data-revenue="{{ json_encode($current_year_revenue) }}"></div>
            </div>
        </div>

        <!-- Employee Pie Chart -->
        <div class="bg-white dark:bg-dark overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Employee Distribution</h3>
                <div id="employeePieChart" data-employee-distribution="{{ json_encode($employee_distribution) }}"></div>
            </div>
        </div>
    </div>

    <!-- End of Charts -->

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        let revenue = document.getElementById('revenueChart').getAttribute('data-revenue');
        revenue = JSON.parse(revenue);
        document.addEventListener('DOMContentLoaded', function () {
            // Revenue Chart
            var revenueOptions = {
                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: 'Revenue',
                    data: revenue
                }],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                    labels: {
                        style: {
                            colors: '#718096'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#718096'
                        },
                        formatter: function (value) {
                            return "$" + value.toLocaleString();
                        }
                    }
                },
                colors: ['#cd8d96'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.9,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                tooltip: {
                    y: {
                        formatter: function (value) {
                            return "$" + value.toLocaleString();
                        }
                    }
                }
            };

            var revenueChart = new ApexCharts(document.querySelector("#revenueChart"), revenueOptions);
            revenueChart.render();
            let employee_distribution = document.getElementById('employeePieChart').getAttribute('data-employee-distribution');
            employee_distribution = JSON.parse(employee_distribution);
            // Employee Pie Chart
            var employeePieOptions = {
                chart: {
                    type: 'pie',
                    height: 350
                },
                series: employee_distribution,
                labels: ['Doctors', 'Nurses'],
                colors: ['#cd8d96', '#fccad1'],
                legend: {
                    position: 'bottom',
                    labels: {
                        colors: '#718096'
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var employeePieChart = new ApexCharts(document.querySelector("#employeePieChart"), employeePieOptions);
            employeePieChart.render();
        });

    
    document.getElementById('close').addEventListener('click', function() {
        this.parentElement.remove();
    });

    </script>
@endsection