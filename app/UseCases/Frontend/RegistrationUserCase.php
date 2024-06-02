<?php

declare(strict_types=1);

namespace App\UseCases\Frontend;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Contracts\Hashing\Hasher;

class RegistrationUserCase
{
    public function __construct(
        private readonly User $user,
        private readonly UserProfile $profile,
        private readonly Hasher $hasher,
    ) {
    }

    public function handle(array $data): void
    {
        $data['register_password'] = $this->hasher->make($data['register_password']);
        $user = $this->user::create([
            'email' => $data['register_email'],
            'password' => $data['register_password'],
        ]);
        $user->assignRole('user');

        $this->profile::create([
            'user_id' => $user->id,
            'surname' => $data['surname'],
            'firstname' => $data['firstname'],
            'phone' => $data['phone'],
        ]);
    }
}
