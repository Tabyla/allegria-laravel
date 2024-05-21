<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\CallbackController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain(env('ADMIN_DOMAIN', 'backend.' . env('DOMAIN', false)))
    ->group(function () {
        Route::middleware('can:use-crud')->group(function () {
            Route::resource('/user', UserController::class);
        });
        require __DIR__ . '/auth.php';
        require __DIR__ . '/admin.php';
    });

Route::get('/', [SiteController::class, 'index'])->name('/');
Route::get('about', [SiteController::class, 'about'])->name('about');
Route::get('brands', [SiteController::class, 'brands'])->name('brands');
Route::get('questions', [SiteController::class, 'questions'])->name('questions');
Route::post('questions', [CallbackController::class, 'request'])->name('callback.request');


