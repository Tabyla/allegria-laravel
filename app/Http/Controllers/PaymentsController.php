<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Order;
use Request;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;

class PaymentsController extends Controller
{
    public function confirm(Request $request): void
    {
        $source = file_get_contents('php://input');
        $requestBody = json_decode($source, true);
        $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
            ? new NotificationSucceeded($requestBody)
            : new NotificationWaitingForCapture($requestBody);
        $payment = $notification->getObject();
        $paymentId = $payment->getId();
        $order = Order::findOrFail($paymentId);
        $paymentStatus = $payment->getStatus();
        $orderStatus = Order::STATUS_CANCELLED;

        if (isset($payment->status) && $payment->status === 'succeeded' && $payment->paid) {
            $orderStatus = Order::STATUS_PAID;
        }

        $order->update(['status' => $orderStatus, 'payment_status' => $paymentStatus]);
    }
}
