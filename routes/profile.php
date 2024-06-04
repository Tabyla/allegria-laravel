<?php

use App\Http\Controllers\Frontend\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::post('profile/change-password', [ProfileController::class, 'changePassword'])->middleware('auth')
    ->name('profile.change-password');
