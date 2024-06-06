<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        $profile = $user->profile;

        return view(
            'frontend.cart',
            [
                'user' => $user,
                'profile' => $profile,
            ]
        );
    }
}
