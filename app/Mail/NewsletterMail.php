<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build(): NewsletterMail
    {
        return $this->subject('Подписка на рассылку')->view('frontend.emails.newsletter');
    }
}
