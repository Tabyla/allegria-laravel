<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): View
    {
        $user = auth()->user();
        $profile = $user->profile;
        $cart = session()->get('cart', []);

        return view(
            'frontend.cart',
            [
                'user' => $user,
                'profile' => $profile,
                'cart' => $cart,
            ]
        );
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function addToCart(int $productId): JsonResponse|RedirectResponse
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Ошибка! Товар не найден.'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "category" => $product->category->name,
                "image" => $product->mainImage->image_path
            ];
        }

        if ($cart[$productId]['quantity'] <= 0) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('Поздравляю! Товар добавлен в корзину!');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function removeFromCart(int $id): RedirectResponse
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Товар удален из корзины.');
    }

    // Внутри CartController

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update(Request $request): RedirectResponse
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;

            if ($quantity <= 0) {
                unset($cart[$productId]);
            }
        }

        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Количество товара обновлено.');
    }

}
