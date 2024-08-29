<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyTestFileEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $attachment;

    public function __construct(string $name, string $attachment)
    {
        $this->name = $name;
        $this->attachment = $attachment;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Đây là một file đính kèm',
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
        if ($this->attachment){
            return [$this->attachment];
        }

        return [];
    }
}
