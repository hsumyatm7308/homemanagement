<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $content;
    public $contact;

    public function __construct($subject, $content, $contact)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->contact = $contact;
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
