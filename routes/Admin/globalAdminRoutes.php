<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;
use App\Http\Controllers\Admin\Order\AdminOrderController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),

        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
    }
);

Route::get('/login', [AdminLoginController::class, 'loginForm'])->name('admin.login');
Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.loginPost');

Route::get('/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/register', [AdminRegisterController::class, 'register'])->name('admin.registerPost');

Route::group(
    [

        'middleware' => ['auth:admin']
    ],
    function () {
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

        Route::get('/', [AdminOrderController::class, 'index'])->name('admin.orders');
    }
);
