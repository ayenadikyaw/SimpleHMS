<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New {{ $category }} Added Notification</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f4f4f4;">
    <div class="header" style="background-color: #cd8d96; padding: 20px; text-align: center;">
        <img src="https://drive.google.com/uc?export=view&id=1SzcwDMPu-RaGcmbbAsKfvT7hTsZ2SwAf" alt="Sakura HMS Logo" class="logo" style="max-width: 100px;">
    </div>
    <div class="content" style="background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        <h1 style="color: #e91e63; text-align: center;">Sakura HMS</h1>
        <div class="notification" style="background-color: #fff9c4; border-left: 4px solid #fbc02d; padding: 10px; margin-bottom: 20px;">
            <p>A new {{ rtrim($category, 's') }} has been added to our system.</p>
        </div>
        <div class="details" style="margin-bottom: 20px;">
            <h2 style="color: #4a4a4a;">Details of {{ rtrim($category, 's') }}:</h2>
            @if ($category == 'doctors' || $category == 'nurses')
                <p><strong>Name:</strong> {{ $item->name }}</p>
                <p><strong>Speciality:</strong> {{ $item->speciality }}</p>
                <p><strong>Phone:</strong> {{ $item->phone }}</p>
                <p><strong>Added on:</strong> {{ now()->format('F j, Y, g:i a') }}</p>
            @elseif ($category == 'rooms')
                <p><strong>Room Number:</strong> {{ $room_number }}</p>
                <p><strong>Room Type:</strong> {{ $item->status }}</p>
                <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
                <p><strong>Room Price:</strong> {{ $item->price }}</p>
                <p><strong>Added on:</strong> {{ now()->format('F j, Y, g:i a') }}</p>   
            @elseif ($category == 'drugs')
                <p><strong>Name:</strong> {{ $item->drug_name }}</p>
                <p><strong>Dosage:</strong> {{ $item->dosage }}</p>
                <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
                <p><strong>Price:</strong> {{ $item->price }}</p>
                <p><strong>Added on:</strong> {{ now()->format('F j, Y, g:i a') }}</p>
            @elseif ($category == 'appointments')
                <p><strong>Doctor Name:</strong> {{ $doctor_name }}</p>
                <p><strong>Description:</strong> {{ $item->description }}</p>
                <p><strong>Room:</strong> {{ $room_number }}</p>
                <p><strong>Appointment Date:</strong> {{ $item->appointment_date }}</p>
                <p><strong>Added on:</strong> {{ now()->format('F j, Y, g:i a') }}</p>
            @elseif ($category == 'messages')
                <p><strong>Message:</strong> {{ $item->message }}</p>
                <p><strong>Message Type:</strong> {{ $item->is_vip ? 'VIP' : 'Normal' }}</p>
                <p><strong>Added on:</strong> {{ now()->format('F j, Y, g:i a') }}</p>
            @endif
        </div>
        <div style="text-align: center;">
            <a href="{{ url('/'.$category.'/'.$item->id) }}" class="button" style="display: inline-block; background-color: #e91e63; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">View {{ rtrim($category, 's') }}</a>
        </div>
    </div>
    <div class="footer" style="margin-top: 20px; text-align: center; font-size: 0.9em; color: #777;">
        <p>&copy; {{ date('Y') }} Sakura HMS. All rights reserved.</p>
    </div>
</body>
</html>
