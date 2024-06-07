<?php

use App\Http\Controllers\Backend\SiteController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')
    ->middleware('can:use-admin-panel')
    ->group(function () {
        Route::get('/', [SiteController::class, 'index'])
            ->name('index');

        Route::get('/pages', [SiteController::class, 'pages'])
            ->name('pages');

        Route::get('/settings', [SiteController::class, 'settings'])
            ->name('settings');
    });
