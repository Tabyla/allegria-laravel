<?php

declare(strict_types=1);

namespace App\UseCases\Frontend;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class AddFavoriteCase
{
    public function __construct(
        private readonly Favorite $favorite,
    ) {
    }

    public function handle(int $productId): void
    {
        $this->favorite::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
        ]);
    }
}
