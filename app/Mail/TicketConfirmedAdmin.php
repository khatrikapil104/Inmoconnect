<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class TicketConfirmedAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $fromName;
    public $fromEmail;
    public $fromPhone;
    public $fromCompany;
    public $fromRole;

    /**
     * Create a new message instance.
     */
    public function __construct($name,$fromName,$fromEmail,$fromPhone,$fromCompany,$fromRole)
    {
        $this->name = $name;
        $this->fromName = $fromName;
        $this->fromEmail = $fromEmail;
        $this->fromPhone = $fromPhone;
        $this->fromCompany = $fromCompany;
        $this->fromRole = $fromRole;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Agent Signed Up For Beta Version',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.ticketConfirmedAdmin' // Fix the syntax here
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
