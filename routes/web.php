<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Customer\CustomerLoginController;
use App\Http\Controllers\Customer\CustomerRegisterController;
use App\Http\Controllers\ProductController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),

        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [SiteController::class, 'index'])->name('home');

        Route::get('/products', [ProductController::class, 'indexWithFilters'])->name('products');
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.single');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::get('/categories/{category}', [CategoryController::class, 'index'])->name('categories.single');

        Route::get('/brands',[BrandController::class,'index'])->name('brands');
        Route::get('/brands/{brand}',[BrandController::class,'show'])->name('brands.single');

        /*************Customer Account ********************************************************************/

        Route::group(['prefix'=>'app'],function(){

            Route::get('/login',[CustomerLoginController::class,'loginForm'])->name('customer.login');
            Route::post('/login',[CustomerLoginController::class,'login'])->name('customer.loginPost');

            Route::get('/register',[CustomerRegisterController::class,'showRegistrationForm'])->name('customer.register');
            Route::post('/register',[CustomerRegisterController::class,'register'])->name('customer.registerPost');
        });

    }
);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homee');
