<?php

declare(strict_types=1);

namespace App\UseCases\Frontend;

use App\Mail\RecoveryLinkMail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SendRecoveryLinkCase
{
    public function __construct(
        private readonly PasswordReset $passwordReset,
    )
    {
    }

    public function handle(User $user): void
    {
        $token = sha1((string)time());

        $this->passwordReset::create([
            'email' => $user->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        $recoveryUrl = URL::route('recovery.send', ['id' => $user->id]);
        Mail::to($user->email)->send(new RecoveryLinkMail($recoveryUrl));
    }
}
