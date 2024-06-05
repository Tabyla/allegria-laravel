<?php

use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/product/{alias}', [ProductController::class, 'index'])->name('product.index');

