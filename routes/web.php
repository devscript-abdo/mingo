<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Checkout\ConfirmationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Coupon\CouponController;
use App\Http\Controllers\Customer\AddresseController;
use App\Http\Controllers\Customer\CustomerLoginController;
use App\Http\Controllers\Customer\CustomerProfilController;
use App\Http\Controllers\Customer\CustomerRegisterController;
use App\Http\Controllers\Customer\GenerateInvoiceController;
use App\Http\Controllers\Customer\InvoiceController;
use App\Http\Controllers\Customer\NotificationController;
use App\Http\Controllers\Customer\SocialController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\ProductCollectionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Models\Archive;
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

/*******************Social Login */
Route::get('/redirect/{service}', [SocialController::class, 'redirect'])
    ->name('customer.service.login');
//->where('service', 'facebook|google');

Route::get('/callback/{service}', [SocialController::class, 'callback']);
//->name('customer.service.login');
//->where('service', 'facebook|google');



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

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::get('/categories/{category}', [CategoryController::class, 'index'])->name('categories.single');

        Route::get('/collections', [ProductCollectionController::class, 'index'])->name('collections');
        Route::get('/collections/{collection}', [ProductCollectionController::class, 'index'])->name('collections.single');

        Route::get('/brands', [BrandController::class, 'index'])->name('brands');
        Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.single');

        /********************************************   Customer Account  *****************************************************/

        Route::group(['prefix' => 'app'], function () {

            Route::get('/login', [CustomerLoginController::class, 'loginForm'])->name('customer.login');
            Route::post('/login', [CustomerLoginController::class, 'login'])->name('customer.loginPost');

            Route::get('/register', [CustomerRegisterController::class, 'showRegistrationForm'])->name('customer.register');
            Route::post('/register', [CustomerRegisterController::class, 'register'])->name('customer.registerPost');

            Route::get('/shopping-cart', [CartController::class, 'index'])->name('shoppingcart');
            Route::delete('/shopping-cart', [CartController::class, 'delete'])->name('shoppingcart.delete');

            Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth:customer');
            Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.post');

            Route::get('/guest-checkout', [CheckoutController::class, 'index'])->name('checkout.guest');

            Route::post('coupon', [CouponController::class, 'store'])->name('coupon.store');
            Route::delete('coupon', [CouponController::class, 'delete'])->name('coupon.delete');

            Route::get('/thankyou', [ConfirmationController::class, 'index'])->name('checkout.thankyou');

            Route::group(['middleware' => 'auth:customer'], function () {

                Route::post('/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');

                Route::get('/profil', [CustomerProfilController::class, 'index'])->name('customer.profil');
                Route::post('/profil', [CustomerProfilController::class, 'updateInfo'])->name('customer.profilUpdate');

                Route::get('/profil/notifications', [NotificationController::class, 'index'])->name('customer.notifications');

                Route::get('/profil/orders', [InvoiceController::class, 'index'])->name('customer.invoices');
                Route::delete('/profil/orders', [InvoiceController::class, 'delete'])->name('customer.invoices.delete');

                Route::get('/profil/orders/{slug}', [InvoiceController::class, 'show'])->name('customer.invoices.single');
                Route::post('/profil/orders/{slug}', [GenerateInvoiceController::class, 'generate'])->name('customer.invoices.generate');

                Route::get('/profil/addresses', [AddresseController::class, 'index'])->name('customer.addresses');
                Route::post('/profil/addresses', [AddresseController::class, 'store'])->name('customer.addresses.store');
                Route::delete('/profil/addresses', [AddresseController::class, 'delete'])->name('customer.addresses.delete');

                Route::get('/profil/wishlist', [WishlistController::class, 'index'])->name('customer.wishlist');
                Route::delete('/profil/wishlist', [WishlistController::class, 'delete'])->name('customer.wishlist.delete');
            });
        });
    }
);


Route::group(['prefix' => config('mingo.admin')], function () {
    Voyager::routes();
});

//Auth::routes();
