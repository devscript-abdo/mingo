<?php

use App\Http\Controllers\ProductController;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
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

Route::get('/categories/{id}', function ($id) {
    return new CategoryResource(Category::findOrFail($id));
});

Route::get('/products/{id}', function ($id) {
    return new ProductResource(Product::findOrFail($id));
});
/*Route::group(
    [
        'prefix' =>'fr'

    ],
    function () {
        Route::get('/products', [ProductController::class, 'api'])->name('api');
        Route::get('/products/{id}', [ProductController::class, 'apiID'])->name('api');
    }
);*/
