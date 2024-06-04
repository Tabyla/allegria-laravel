<?php

use App\Http\Controllers\Backend\CallbackController;
use Illuminate\Support\Facades\Route;

Route::post('questions', [CallbackController::class, 'request'])->name('callback.request');

