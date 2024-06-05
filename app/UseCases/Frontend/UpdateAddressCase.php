<?php

declare(strict_types=1);

namespace App\UseCases\Frontend;

use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

class UpdateAddressCase
{
    public function __construct()
    {
    }

    public function handle(string $address): void
    {
        $userProfile = UserProfile::where('user_id', Auth::id())->first();
        if ($userProfile) {
            $userProfile->address = $address;
            $userProfile->save();
        }
    }
}
