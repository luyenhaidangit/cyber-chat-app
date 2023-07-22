<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyUserEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private $email_verification_token)
    {

    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Xác thực Email người dùng CyberChat',
        );
    }

    public function content()
    {
        return new Content(
            view: 'guest.verify-user',
            with: [
                'email_verification_token' => $this->email_verification_token,
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}