<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventReminderUser extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $date;
    public $start_from;
    public $end_to;
    public $event_name;
    public $reminder;
    public $project_name;
    public $customerData;
    public $properties;
    public $ownerName;

    /**
     * Create a new message instance.
     */
    public function __construct($name,$date,$start_from,$end_to,$event_name,$reminder,$project_name,$customerData=[],$properties=[],$ownerName)
    {
        $this->name = $name;
        $this->date = $date;
        $this->start_from = $start_from;
        $this->end_to = $end_to;
        $this->event_name = $event_name;
        $this->reminder = $reminder;
        $this->project_name = $project_name;
        $this->customerData = $customerData;
        $this->properties = $properties;
        $this->ownerName = $ownerName;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Event Reminder',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.event-reminder-user' // Fix the syntax here
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
