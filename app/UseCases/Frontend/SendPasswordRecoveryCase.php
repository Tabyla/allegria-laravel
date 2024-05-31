<?php

declare(strict_types=1);

namespace App\UseCases\Frontend;

use App\Mail\PasswordRecoveryMail;
use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendPasswordRecoveryCase
{
    public function __construct(
        private readonly Hasher $hasher,
    )
    {
    }

    public function handle(User $user): void
    {
        $newPassword = Str::random(8);
        $user->password = $this->hasher->make($newPassword);
        $user->save();
        $email = $user->email;
        Mail::to($email)->send(new PasswordRecoveryMail($newPassword));
    }
}
