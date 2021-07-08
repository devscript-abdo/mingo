<?php

use App\Http\Controllers\API\Customer\LoginController;
use App\Http\Controllers\API\Customer\LogoutController;
use App\Http\Controllers\API\Customer\RegisterController;
use App\Http\Controllers\API\Product\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:sanctum'], function () {
});

/********************************** Products API  **********************************************/
Route::group(['middleware' => 'api'], function () {

    Route::group(['prefix' => 'fr'], function () {

        Route::get('/products', [ProductController::class, 'index'])->name('api.products.fr');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('api.products.show.fr');
    });

    Route::group(['prefix' => 'ar'], function () {

        Route::get('/products', [ProductController::class, 'index'])->name('api.products.ar');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('api.products.show.ar');
        
    });
});

/********************************** END Products API  **********************************************/

/************Customer Login API ********************************/

Route::group(['prefix' => 'fr'], function () {

    Route::post('/login', [LoginController::class, 'login'])->name('api.customer.loginPost');
});

Route::group(['prefix' => 'ar'], function () {

    Route::post('/login', [LoginController::class, 'login'])->name('api.customer.loginPost');
});

Route::group(['prefix' => 'fr', 'middleware' => 'auth:sanctum'], function () {

    Route::post('/logout', [LogoutController::class, 'logout'])->name('api.customer.logout');
});

Route::group(['prefix' => 'ar', 'middleware' => 'auth:sanctum'], function () {

    Route::post('/logout', [LogoutController::class, 'logout'])->name('api.customer.logout');
});



Route::group(['prefix' => 'fr'], function () {

    Route::post('/register', [RegisterController::class, 'create'])->name('api.customer.create');
});

Route::group(['prefix' => 'ar'], function () {

    Route::post('/register', [RegisterController::class, 'create'])->name('api.customer.create');
});
