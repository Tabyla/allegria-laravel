<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\UseCases\Frontend\CreateOrderCase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class OrderController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function create(Request $request, CreateOrderCase $case): RedirectResponse
    {
        $user = auth()->user();

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Ваша корзина пуста.');
        }

        $case->handle(
            $cart,
            $user->id,
            $request->input('address', 'default address')
        );

        session()->forget('cart');

        return redirect()->route('/')->with('success', 'Ваш заказ успешно оформлен.');
    }
}
