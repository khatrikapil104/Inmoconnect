<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class InviteTeamMember extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $fromName;
    public $fromImage;
    public $inviteLink;

    /**
     * Create a new message instance.
     */
    public function __construct($name,$fromName,$fromImage,$inviteLink)
    {
        $this->name = $name;
        $this->fromName = $fromName;
        $this->fromImage = $fromImage;
        $this->inviteLink = $inviteLink;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: ((auth()->user()->role->name == 'agent') ? 'Agent' : 'Developer').' Invited to You',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.inviteTeamMember' // Fix the syntax here
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
