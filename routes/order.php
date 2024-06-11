<?php

use App\Http\Controllers\Frontend\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::post('/order/create', [OrderController::class, 'create'])->name('order.create');
});

