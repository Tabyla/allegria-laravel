<?php

declare(strict_types=1);

namespace App\UseCases\User;

use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;

class CreateUserCase
{
    public function __construct(
        private readonly User $user,
        private readonly Hasher $hasher,
    ) {
    }

    public function handle(array $data): void
    {
        $data['password'] = $this->hasher->make($data['password']);
        $user = $this->user::create($data);
        $user->assignRole($data['role']);
    }
}
