<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class RequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $fromName;
    public $fromImage;

    /**
     * Create a new message instance.
     */
    public function __construct($name,$fromName,$fromImage)
    {
        $this->name = $name;
        $this->fromName = $fromName;
        $this->fromImage = $fromImage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Connection Request Received!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.requestReceived' // Fix the syntax here
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