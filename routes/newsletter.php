<?php

use App\Http\Controllers\Frontend\NewsletterController;
use Illuminate\Support\Facades\Route;

Route::post('/', [NewsletterController::class, 'request'])->name('newsletter.request');

