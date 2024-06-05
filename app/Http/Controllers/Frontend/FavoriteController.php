<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\UseCases\Frontend\AddFavoriteCase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add(int $productId, AddFavoriteCase $case): RedirectResponse
    {
        $case->handle($productId);

        return back()->with('status', 'Поздравляю! Товар добавлен в избранное!');
    }

    public function remove(int $productId): RedirectResponse
    {
        Favorite::where('user_id', Auth::id())->where('product_id', $productId)->delete();

        return back()->with('status', 'Поздравляю! Товар удален из избранного!');
    }
}
