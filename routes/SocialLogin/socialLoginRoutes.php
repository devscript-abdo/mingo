<?php

use App\Http\Controllers\Customer\SocialController;
use Illuminate\Support\Facades\Route;

Route::get('/redirect/{service}', [SocialController::class, 'redirect'])
    ->name('customer.service.login');
//->where('service', 'facebook|google');

Route::get('/callback/{service}', [SocialController::class, 'callback']);
//->name('customer.service.login');
//->where('service', 'facebook|google');
