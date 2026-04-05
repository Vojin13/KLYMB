<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactAnswerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactMessage;
    public $answer;

    /**
     * Create a new message instance.
     */
    public function __construct($contactMessage, $answer)
    {
        $this->contactMessage = $contactMessage;
        $this->answer = $answer;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'KLYMB - Answer to your inquiry',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-answer',
            with: [
                'contactMessage' => $this->contactMessage,
                'answer' => $this->answer,
            ]
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
