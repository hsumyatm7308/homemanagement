<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $contact;

    public $username;

    public function __construct($subject, $content, $contact, $username)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->contact = $contact;
        $this->username = $username;

    }

    public function build()
    {
        return $this->subject($this->subject)
            ->view('mailtemplate.contactmail');
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
