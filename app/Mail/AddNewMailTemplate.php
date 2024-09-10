<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AddNewMailTemplate extends Mailable
{
    use Queueable, SerializesModels;
    public $item;
    public $category;
    public $doctor_name;
    public $room_number;
    /**
     * Create a new message instance.
     */
    public function __construct($item, $category, $doctor_name='', $room_number='')
    {
        $this->item = $item;
        $this->category = $category;
        $this->doctor_name = $doctor_name;
        $this->room_number = $room_number;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notification for adding new ' . rtrim($this->category, 's'),
            );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'MailTemplates.add_new_mail',
            with: [
                'item' => $this->item,
                'category' => $this->category,
                'doctor_name' => $this->doctor_name,    
                'room_number' => $this->room_number,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
