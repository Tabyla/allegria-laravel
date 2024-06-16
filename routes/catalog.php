<?php

use App\Http\Controllers\Frontend\CatalogController;
use Illuminate\Support\Facades\Route;

Route::get('catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/catalog/{alias}', [CatalogController::class, 'showCategory'])->name('category.show');
