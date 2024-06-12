<?php

declare(strict_types=1);

namespace App\UseCases\Frontend;

use App\Clients\YooKassaClient;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Session;
use YooKassa\Common\Exceptions\ApiException;
use YooKassa\Common\Exceptions\BadApiRequestException;
use YooKassa\Common\Exceptions\ExtensionNotFoundException;
use YooKassa\Common\Exceptions\ForbiddenException;
use YooKassa\Common\Exceptions\InternalServerError;
use YooKassa\Common\Exceptions\NotFoundException;
use YooKassa\Common\Exceptions\ResponseProcessingException;
use YooKassa\Common\Exceptions\TooManyRequestsException;
use YooKassa\Common\Exceptions\UnauthorizedException;

class CreateOrderCase
{
    private YooKassaClient $client;

    public function __construct()
    {
        $this->client = new YooKassaClient(env('SHOP_ID', ''), env('YOO_KASSA_KEY', ''));
    }

    /**
     * @throws NotFoundException
     * @throws ApiException
     * @throws ResponseProcessingException
     * @throws BadApiRequestException
     * @throws ExtensionNotFoundException
     * @throws InternalServerError
     * @throws ForbiddenException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     */
    public function handle(array $cart, int $userId, string $address): string
    {
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => $userId,
            'total_price' => $totalPrice,
            'address' => $address,
            'status' => Order::STATUS_NEW,
            'payment_id' => null,
            'payment_status' => null
        ]);

        foreach ($cart as $productId => $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
            ]);
        }

        Session::put('last_order_id', $order->id);
        return $this->client->createPayment($order);
    }
}
