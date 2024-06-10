<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use App\UseCases\Frontend\AddFavoriteCase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;


class FavoriteController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): View
    {
        $user = auth()->user();
        $favorites = Product::favoriteProducts($user->id);
        $cart = session()->get('cart', []);
        $cartItemsMap = collect(array_map(function($item) { return $item['quantity']; }, $cart));

        return view(
            'frontend.favorites',
            [
                'favorites' => $favorites,
                'cart' => $cartItemsMap,
            ]
        );
    }

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
