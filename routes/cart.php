<?php

use App\Http\Controllers\Frontend\CartController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'index'])->name('cart');
});

