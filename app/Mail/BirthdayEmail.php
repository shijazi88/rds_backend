<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class BirthdayEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $template;
    public $member;

    public function __construct($template, $member)
    {
        $this->member = $member;
        $this->template = $template;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('mohamadsafwan.hijazi@gmail.com', 'Safwan Hijazi'),
            subject: 'Birthday Email',
        );
    }

    // public function build()
    // {
    //     return $this->subject('Happy Birthday!')->html($this->template);
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'mails.birth_date',
           
    //     );
    // }

    /**
     * Build the message.
     */
    public function build(): void
    {
        $this->view('mails.birth_date')
            ->with([
                // 'template' => $this->template,
                'member' => $this->member,
            ]);
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
