<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class RequestAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $fromName;
    public $fromImage;
    public $profileUrl;

    /**
     * Create a new message instance.
     */
    public function __construct($name,$fromName,$fromImage,$profileUrl)
    {
        $this->name = $name;
        $this->fromName = $fromName;
        $this->fromImage = $fromImage;
        $this->profileUrl = $profileUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Connection Request Accepted!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.requestAccepted' // Fix the syntax here
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
