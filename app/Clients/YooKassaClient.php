<?php

declare(strict_types=1);

namespace App\Clients;

use App\Models\Order;
use YooKassa\Client;
use YooKassa\Common\Exceptions\ApiException;
use YooKassa\Common\Exceptions\BadApiRequestException;
use YooKassa\Common\Exceptions\ExtensionNotFoundException;
use YooKassa\Common\Exceptions\ForbiddenException;
use YooKassa\Common\Exceptions\InternalServerError;
use YooKassa\Common\Exceptions\NotFoundException;
use YooKassa\Common\Exceptions\ResponseProcessingException;
use YooKassa\Common\Exceptions\TooManyRequestsException;
use YooKassa\Common\Exceptions\UnauthorizedException;

class YooKassaClient
{
    public function __construct(
        private readonly string $shopId,
        private readonly string $secretKey,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws ResponseProcessingException
     * @throws ApiException
     * @throws ExtensionNotFoundException
     * @throws BadApiRequestException
     * @throws InternalServerError
     * @throws ForbiddenException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     */
    public function createPayment(Order $order): void
    {
        $client = new Client();
        $client->setAuth($this->shopId, $this->secretKey);
        $payment = $client->createPayment(
            [
                'amount' => [
                    'value' => $order->total_price,
                    'currency' => 'RUB',
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => env('APP_URL') . '/order/' . $order->id,
                ],
                'capture' => true,
                'description' => 'Заказ №' . $order->id,
            ],
            uniqid('', true)
        );

        if ($payment) {
            $order->update(['status' => Order::STATUS_AWAITING_CONFIRMATION, 'payment_id' => $payment->getId(), 'payment_status' => $payment->getStatus()]);
        }
    }
}
