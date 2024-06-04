<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('/');
Route::get('about', [SiteController::class, 'about'])->name('about');
Route::get('brands', [SiteController::class, 'brands'])->name('brands');
Route::get('questions', [SiteController::class, 'questions'])->name('questions');
