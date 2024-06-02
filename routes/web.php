<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CallbackController;
use App\Http\Controllers\Frontend\CatalogController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Frontend\PasswordRecoveryController;
use App\Http\Controllers\Frontend\ProfileController;
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
Route::get('/', [SiteController::class, 'index'])->name('/');
Route::get('about', [SiteController::class, 'about'])->name('about');
Route::get('brands', [SiteController::class, 'brands'])->name('brands');

Route::get('profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::post('profile', [ProfileController::class, 'changePassword'])->middleware('auth')->name('profile.change-password');


Route::get('questions', [SiteController::class, 'questions'])->name('questions');
Route::post('questions', [CallbackController::class, 'request'])->name('callback.request');
Route::get('catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/category/{alias}', [CatalogController::class, 'showCategory'])->name('category.show');
Route::post('/', [NewsletterController::class, 'request'])->name('newsletter.request');
Route::post('/recovery', [PasswordRecoveryController::class, 'request'])->name('recovery.request');
Route::get('/recovery/{id}', [PasswordRecoveryController::class, 'send'])->name('recovery.send');






