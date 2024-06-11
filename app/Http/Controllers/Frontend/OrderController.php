<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\UseCases\Frontend\CreateOrderCase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class OrderController extends Controller
{
    public function show($id): View
    {
        $order = Order::with(['user', 'user.profile'])->findOrFail($id);
        $FIO = $order->user->profile->surname . ' ' . $order->user->profile->firstname;
        $products = Product::orderProducts($order->id);

        return view('frontend.order', [
            'order' => $order,
            'fio' => $FIO,
            'products' => $products,
        ]);
    }

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

        $orderId = Session::get('last_order_id');

        session()->forget('cart');

        return redirect()->route('order.show', ['id' => $orderId]);
    }
}
