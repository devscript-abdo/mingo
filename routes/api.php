<?php

use App\Http\Controllers\API\ProductController;
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
Route::group(['prefix'=>'fr'],function(){

    Route::get('/products',[ProductController::class,'index'])->name('api.products');
    Route::get('/products/{id}',[ProductController::class,'show'])->name('api.products.show');
});

