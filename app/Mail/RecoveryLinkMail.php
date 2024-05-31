<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoveryLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    private mixed $recoveryUrl;

    public function __construct($recoveryUrl)
    {
        $this->recoveryUrl = $recoveryUrl;
    }

    public function build(): RecoveryLinkMail
    {
        return $this->subject('Восстановление пароля')->view('frontend.emails.recovery_link',
            ['url' => $this->recoveryUrl]);
    }
}
