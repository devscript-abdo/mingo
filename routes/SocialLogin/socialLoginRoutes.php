<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\SocialController;


Route::get('/redirect/{service}', [SocialController::class, 'redirect'])
    ->name('customer.service.login');
//->where('service', 'facebook|google');

Route::get('/callback/{service}', [SocialController::class, 'callback']);
//->name('customer.service.login');
//->where('service', 'facebook|google');