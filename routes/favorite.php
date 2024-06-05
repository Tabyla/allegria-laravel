<?php

use App\Http\Controllers\Frontend\FavoriteController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::post('/favorites/add/{productId}', [FavoriteController::class, 'add'])->name('favorites.add');
    Route::post('/favorites/remove/{productId}', [FavoriteController::class, 'remove'])->name('favorites.remove');
});

