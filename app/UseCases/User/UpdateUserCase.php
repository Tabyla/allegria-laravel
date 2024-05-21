<?php

declare(strict_types=1);

namespace App\UseCases\User;

use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;

class UpdateUserCase
{
    public function __construct(
        private readonly User $user,
        private readonly Hasher $hasher,
    ) {
    }

    public function handle(int $id, array $data): void
    {
        $user = $this->user::findOrFail($id);
        if ($data['password'] == null){
            $data['password'] = $user->password;
        }
        else{
            $data['password'] = $this->hasher->make($data['password']);
        }
        $user->syncRoles([]);
        $user->assignRole($data['role']);
        $user->update($data);
    }
}
