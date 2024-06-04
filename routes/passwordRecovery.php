<?php

use App\Http\Controllers\Frontend\PasswordRecoveryController;
use Illuminate\Support\Facades\Route;

Route::post('/recovery', [PasswordRecoveryController::class, 'request'])->name('recovery.request');
Route::get('/recovery/{id}', [PasswordRecoveryController::class, 'send'])->name('recovery.send');
