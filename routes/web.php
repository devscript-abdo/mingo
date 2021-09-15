<?php


use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExploreController;

use App\Http\Controllers\ProductCollectionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SMS\SmsController;

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

Route::get('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::get('/payment', [PaymentController::class, 'index'])->name('checkout.payment');

Route::get('/test', [SiteController::class, 'test']);
Route::get('/products-test', [SiteController::class, 'testProd']);

Route::get('/sms', [SmsController::class, 'index']);

Route::post('proccess', [PaymentController::class, 'proccess'])->name('payment.proccess');
//Route::post('proccess-done',[PaymentController::class,'proccessDone'])->name('payment.proccess.done');
Route::post('proccess-fail', [PaymentController::class, 'proccessDone'])->name('payment.proccess.fail');

Route::get('/tt',[SiteController::class,'index'])->name('home.ttt');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),

        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/page/{slug}', [SiteController::class, 'getPage'])->name('site.page');

        Route::get('/', [SiteController::class, 'index'])->name('home');

        Route::get('/about-us', [SiteController::class, 'about'])->name('about');

        Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
        Route::post('/contact-us', [ContactController::class, 'store'])->name('contactPost');

        Route::get('/products', [ProductController::class, 'indexWithFilters'])->name('products');
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.single');

        Route::get('/explore', [ExploreController::class, 'index'])->name('products.explore');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::get('/categories/{category}', [CategoryController::class, 'index'])->name('categories.single');

        Route::get('/collections', [ProductCollectionController::class, 'index'])->name('collections');
        Route::get('/collections/{collection}', [ProductCollectionController::class, 'index'])->name('collections.single');

        Route::get('/brands', [BrandController::class, 'index'])->name('brands');
        Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.single');

    }
);


Route::domain('abdo.demo.mingo.ma')->group(function () {
  
    Route::get('/',[SiteController::class,'subDomain']);
});

//Auth::routes();
