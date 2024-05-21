<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallbackMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build(): CallbackMail
    {
        return $this->subject('Вопрос от пользователя')->view('frontend.emails.callback',
            ['details' => $this->details]);
    }
}
