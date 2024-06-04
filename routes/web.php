<?php

use App\Http\Controllers\Backend\CallbackController;
use App\Http\Controllers\Backend\UserController;
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
            Route::resource('/callback', CallbackController::class);
        });
        require __DIR__ . '/auth.php';
        require __DIR__ . '/admin.php';
    });
require __DIR__ . '/auth.php';
require __DIR__ . '/site.php';
require __DIR__ . '/newsletter.php';
require __DIR__ . '/registration.php';
require __DIR__ . '/profile.php';
require __DIR__ . '/passwordRecovery.php';
require __DIR__ . '/catalog.php';
require __DIR__ . '/callback.php';






