<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordRecoveryMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $newPassword;

    public function __construct(string $newPassword)
    {
        $this->newPassword = $newPassword;
    }

    public function build(): PasswordRecoveryMail
    {
        return $this->subject('Восстановление пароля')->view('frontend.emails.recovery',
            ['password' => $this->newPassword]);
    }
}
