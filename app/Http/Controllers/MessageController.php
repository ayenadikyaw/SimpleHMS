<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\AddMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddNewMailTemplate;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = new Message();
        $messages = $message->allMessages();
        return view('Message.message', [
            'all_messages' => $messages,
            'number_of_messages' => $this->getNumberOfMessages(),
            'number_of_vip_messages' => $this->getNumberOfVipMessages(),
            'number_of_normal_messages' => $this->getNumberOfNormalMessages(),
            'number_of_recent_messages' => $this->getNumberOfRecentMessages(),
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
       $allowedPaths = ['http://127.0.0.1:8000/dashboard', 'http://127.0.0.1:8000/messages'];

       //Check if the previous URL is in allowed paths
       if (in_array($previousUrl, $allowedPaths)) {
        //Store the previous URL in session
        session(['savedUrl' => $previousUrl]);
       }

       //Retrieve the saved URL from the session (default to dashboard if not set)
       $savedUrl = session('savedUrl', 'http://127.0.0.1:8000/dashboard');

       //Pass the saved URL to the form view    
       return view('Message.add_message',[
        'previousUrl' => $savedUrl,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddMessage $request)
    {
        $previousUrl = $request-> input('previous_url');
        $validatedData = $request->validated();

        $message = new Message();
        $message->addMessage($request);

        $email = 'ayenadikyaw.tgi@gmail.com';
        Mail::to($email)->send(new AddNewMailTemplate($request, 'messages'));

        return redirect($previousUrl)->with('success', 'Message added successfully');
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
        $allowedPaths = ['http://127.0.0.1:8000/dashboard', 'http://127.0.0.1:8000/messages'];

        //Check if the previous URL is in allowed paths
        if (in_array($previousUrl, $allowedPaths)) {
            //Store the previous URL in session
            session(['savedUrl' => $previousUrl]);
        }

        //Retrieve the saved URL from the session (default to dashboard if not set)
        $savedUrl = session('savedUrl', 'http://127.0.0.1:8000/dashboard');

        //Pass the saved URL to the form view
        $message = new Message();
        $message = $message->getMessage($id);
        return view('Message.edit_message', [
            'message' => $message,
            'previousUrl' => $savedUrl,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddMessage $request, string $id)
    {
        $previousUrl = $request-> input('previous_url');
        $validatedData = $request->validated();

        $message = new Message();
        $message->editMessage($request, $id);
        return redirect($previousUrl)->with('success', 'Message updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = new Message();
        $message->deleteMessage($id);
        return redirect(url()->previous())->with('success', 'Message deleted successfully');
    }

    public function getNumberOfMessages(){
        $message = new Message();
        return $message->getNumberOfMessages();
    }

    public function getNumberOfVipMessages(){
        $message = new Message();
        return $message->getNumberOfVipMessages();
    }

    public function getNumberOfNormalMessages(){
        $message = new Message();
        return $message->getNumberOfNormalMessages();
    }

    public function getNumberOfRecentMessages(){
        $message = new Message();
        return $message->getNumberOfRecentMessages();
    }
}
