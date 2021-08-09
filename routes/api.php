<?php

use App\Http\Controllers\API\Category\CategoryController;
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

Route::group(['middleware' => 'verifyApiAccess'], function () {

    /********************************** Products API  **********************************************/
    Route::group(['middleware' => 'api'], function () {

        Route::group(['prefix' => 'fr'], function () {

            Route::get('/products', [ProductController::class, 'index'])->name('api.products.fr');
            Route::get('/products/{id}', [ProductController::class, 'show'])->name('api.products.show.fr');

            Route::get('/products-latest', [ProductController::class, 'latest'])->name('api.products.latest.fr');
            Route::get('/products-deals', [ProductController::class, 'latest'])->name('api.products.deals.fr');
        });

        Route::group(['prefix' => 'ar'], function () {

            Route::get('/products', [ProductController::class, 'index'])->name('api.products.ar');
            Route::get('/products/{id}', [ProductController::class, 'show'])->name('api.products.show.ar');

            Route::get('/products-latest', [ProductController::class, 'latest'])->name('api.products.deals.ar');
            Route::get('/products-deals', [ProductController::class, 'latest'])->name('api.products.deals.fr');
        });
    });

    /********************************** END Products API  **********************************************/


    /********************************** Categories API  **********************************************/
    Route::group(['prefix' => 'fr'], function () {

        Route::get('category', [CategoryController::class, 'index'])->name('api.categories.index.fr');
        Route::get('category/{id}', [CategoryController::class, 'show'])->name('api.categories.show.fr');
        Route::get('category/{id}/products', [CategoryController::class, 'getProductsOfCategory'])->name('api.categories.products.fr');
    });

    Route::group(['prefix' => 'ar'], function () {

        Route::get('category', [CategoryController::class, 'index'])->name('api.categories.index.ar');
        Route::get('category/{id}', [CategoryController::class, 'show'])->name('api.categories.show.ar');
        Route::get('category/{id}/products', [CategoryController::class, 'getProductsOfCategory'])->name('api.categories.products.ar');
    });



    /********************************** END Categories API  **********************************************/


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
});
