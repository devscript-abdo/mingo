<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\AttributeController;

Route::group(['prefix' => config('mingo.admin')], function () {
    
    Voyager::routes();

    Route::delete('/attr/delete', [AttributeController::class, 'destroy'])->name('admin.attrs.delete');

    Route::get('/attrs/{slug}', [AttributeController::class, 'getC'])->name('admin.attrs.get');

    Route::group(['prefix' => 'dev'], function () {

        Route::get('/sitemap', function () {
            Artisan::call('sitemap:generate');
        });

        Route::get('/optimize', function () {
            Artisan::call('optimize');
        });

        Route::get('/cache-config', function () {
            Artisan::call('config:cache');
        });
        Route::get('/cache-route', function () {
            Artisan::call('route:cache');
        });
        Route::get('/cache-view', function () {
            Artisan::call('view:cache');
        });

        Route::get('/clear-config', function () {
            Artisan::call('config:clear');
        });
        Route::get('/clear-route', function () {
            Artisan::call('route:clear');
        });
        Route::get('/clear-view', function () {
            Artisan::call('view:clear');
        });

        Route::get('/app-down', function () {
            Artisan::call('down');
        });

        Route::get('/app-up', function () {
            Artisan::call('up');
        });
    });
});