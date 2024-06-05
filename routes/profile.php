<?php

use App\Http\Controllers\Frontend\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update-address', [ProfileController::class, 'updateAddress'])->name('profile.updateAddress');
    Route::post('profile/change-password', [ProfileController::class, 'changePassword'])
        ->name('profile.change-password');
});
