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

    public $details;

    // Constructor
    public function __construct($details)
    {
        $this->details = $details;
    }

    // E-posta içeriğini oluştur
    public function build()
    {
        return $this->subject('Contact Mail')
                    ->view('emails.contact');  // 'emails.contact' doğru view ismi
    }


    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Contact Mail');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.contact');  // Doğru view yolu
    }

    public function attachments(): array
    {
        return [];
    }
}
