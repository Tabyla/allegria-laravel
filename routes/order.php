<?php

use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\PaymentsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::post('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::match(['GET', 'POST'], '/payment/confirm', [PaymentsController::class, 'confirm'])
        ->name('payment.confirm');
});

