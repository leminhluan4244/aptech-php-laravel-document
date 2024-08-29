<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyTestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public function __construct(string $name)
    {
        $this->$name= $name;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'My Test Email',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.test-email',
            with: ['name' => $this->name]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
