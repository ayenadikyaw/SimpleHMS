<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Requests\AddRoom;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddNewMailTemplate;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room = new Room();
        $all_rooms = $room->getAllRooms();
        return view('Room.room', [
            'all_rooms' => $all_rooms,
            'number_of_rooms' => $this->number_of_rooms(),
            'number_of_active_rooms' => $this->number_of_active_rooms(),
            'number_of_locked_rooms' => $this->number_of_locked_rooms(),
            'number_of_available_rooms' => $this->number_of_available_rooms(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Capture the previous URL
        $previousUrl = url()->previous();

        // Define allowed paths
        $allowedPaths = ['http://127.0.0.1:8000/dashboard', 'http://127.0.0.1:8000/rooms'];

        // Check if the previous URL is in allowed paths
        if (in_array($previousUrl, $allowedPaths)) {
            // Store the previous URL in session
            session(['savedUrl' => $previousUrl]);
        }

        // Retrieve the saved URL from the session (default to dashboard if not set)
        $savedUrl = session('savedUrl', 'http://127.0.0.1:8000/dashboard');

        // Pass the saved URL to the form view
        return view('Room.add_room', [
            'previousUrl' => $savedUrl,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddRoom $request)
    {
        $previousUrl = $request->input('previous_url');
        $validatedData = $request->validated();

        $room = new Room();

        $room->addNewRoom($request);

        $email = 'ayenadikyaw.tgi@gmail.com';
        Mail::to($email)->send(new AddNewMailTemplate($request, 'rooms', '', $request->room_number));

        return redirect($previousUrl)->with('success', 'Room added successfully');
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
       // Capture the previous URL
       $previousUrl = url()->previous();

       // Define allowed paths
       $allowedPaths = ['http://127.0.0.1:8000/dashboard', 'http://127.0.0.1:8000/rooms'];

       // Check if the previous URL is in allowed paths
       if (in_array($previousUrl, $allowedPaths)) {
           // Store the previous URL in session
           session(['savedUrl' => $previousUrl]);
       }

       // Retrieve the saved URL from the session (default to dashboard if not set)
       $savedUrl = session('savedUrl', 'http://127.0.0.1:8000/dashboard');

       $room = new Room();
       $room = $room->getRoomById($id);

        return view('Room.edit_room', [
            'room' => $room,
            'previousUrl' => $savedUrl,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddRoom $request, string $id)
    {

        $previousUrl = $request->input('previous_url');
        $validatedData = $request->validated();
        $room = new Room();
        $room->updateRoom($request, $id);
        $redirectUrl = parse_url($previousUrl, PHP_URL_PATH);
        return redirect($redirectUrl)->with('success', 'Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = new Room();
        $room->deleteRoom($id);
        return redirect(url()->previous())->with('success', 'Room deleted successfully');
    }

    public function number_of_rooms()
    {
        $room = new Room();
        return $room->number_of_rooms();
    }

    public function number_of_available_rooms()
    {
        $room = new Room();
        return $room->number_of_available_rooms();
    }

    public function total_revenue()
    {
        $room = new Room();
        return $room->total_revenue();
    }

    public function monthly_revenue()
    {
        $room = new Room();
        return $room->monthly_revenue();
    }

    public function number_of_active_rooms()
    {
        $room = new Room();
        return $room->number_of_active_rooms();
    }

    public function number_of_locked_rooms()
    {
        $room = new Room();
        return $room->number_of_locked_rooms();
    }
}
