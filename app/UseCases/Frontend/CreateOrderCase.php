<?php

declare(strict_types=1);

namespace App\UseCases\Frontend;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Session;

class CreateOrderCase
{
    public function __construct(
        private readonly Order $order,
        private readonly OrderProduct $orderProduct,
    ) {
    }

    public function handle(array $cart, int $userId, string $address): void
    {
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $order = $this->order::create([
            'user_id' => $userId,
            'total_price' => $totalPrice,
            'address' => $address,
        ]);

        foreach ($cart as $productId => $item) {
            $this->orderProduct::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
            ]);
        }

        Session::put('last_order_id', $order->id);
    }
}
