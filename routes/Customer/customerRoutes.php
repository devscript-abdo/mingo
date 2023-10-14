<?php

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Checkout\ConfirmationController;
use App\Http\Controllers\Coupon\CouponController;
use App\Http\Controllers\Customer\AddresseController;
use App\Http\Controllers\Customer\CustomerConfirmPasswordController;
use App\Http\Controllers\Customer\CustomerForgotPasswordController;
use App\Http\Controllers\Customer\CustomerLoginController;
use App\Http\Controllers\Customer\CustomerProfilController;
use App\Http\Controllers\Customer\CustomerRegisterController;
use App\Http\Controllers\Customer\CustomerResetPasswordController;
use App\Http\Controllers\Customer\FactureController;
use App\Http\Controllers\Customer\GenerateInvoiceController;
use App\Http\Controllers\Customer\InvoiceController;
use App\Http\Controllers\Customer\LoggedInController;
use App\Http\Controllers\Customer\NotificationController;
use App\Http\Controllers\Customer\Verify\VerifyController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\Payment\PaymentController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),

        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {

        Route::group(['prefix' => 'app'], function () {

            /****Email Verification for Customer */

            Route::get('/email/verification', [VerifyController::class, 'verifyNotice'])
                ->middleware('auth:customer')
                ->name('verification.notice');

            Route::get('/email/verification/{id}/{hash}', [VerifyController::class, 'verification'])
                ->middleware(['auth:customer', 'signed'])
                ->name('verification.verify');

            // resend Email Verification
            Route::post('/email/verification-notify', [VerifyController::class, 'resendVerificationEmail'])
                ->middleware(['auth:customer', 'throttle:6,1'])->name('verification.send');

            /**** END Email Verification for Customer *****/

            Route::get('/confirm-password', [CustomerConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');

            Route::post('/confirm-password', [CustomerConfirmPasswordController::class, 'confirm'])->name('password.confirm');

            Route::get('/login', [CustomerLoginController::class, 'loginForm'])->name('customer.login');
            Route::post('/login', [CustomerLoginController::class, 'login'])->name('customer.loginPost');

            Route::get('password/request', [CustomerForgotPasswordController::class, 'showLinkRequestForm'])
                ->middleware('guest:customer')
                ->name('customer.forgotpassword');

            Route::post('password/request', [CustomerForgotPasswordController::class, 'sendResetLinkEmail'])
                ->middleware('guest:customer')
                ->name('customer.forgotpasswordPost');

            Route::get('/password/reset/{token}', [CustomerResetPasswordController::class, 'showResetForm'])
                ->middleware('guest:customer')
                ->name('password.reset');

            Route::post('/password/reset/', [CustomerResetPasswordController::class, 'reset'])
                ->middleware('guest:customer')
                ->name('password.update');

            Route::get('/register', [CustomerRegisterController::class, 'showRegistrationForm'])->name('customer.register');
            Route::post('/register', [CustomerRegisterController::class, 'register'])->name('customer.registerPost');

            Route::get('/shopping-cart', [CartController::class, 'index'])->name('shoppingcart');
            Route::delete('/shopping-cart', [CartController::class, 'delete'])->name('shoppingcart.delete');

            Route::get('/checkout', [CheckoutController::class, 'index'])->middleware(['auth:customer'])->name('checkout');
            Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.post');

            Route::get('/checkout/payment', [PaymentController::class, 'index'])
                // ->middleware('verifyCanPayment')
                ->name('checkout.payment');
            Route::post('/checkout/payment', [PaymentController::class, 'store'])
                //->middleware('verifyCanPayment')
                ->name('checkout.paymentPost');

            Route::get('/guest-checkout', [CheckoutController::class, 'index'])->name('checkout.guest');

            Route::post('coupon', [CouponController::class, 'store'])->name('coupon.store');
            Route::delete('coupon', [CouponController::class, 'delete'])->name('coupon.delete');

            Route::get('/thankyou', [ConfirmationController::class, 'index'])->name('checkout.thankyou');

            Route::group(['middleware' => 'auth:customer'], function () {

                Route::post('/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');

                Route::get('/account', [CustomerProfilController::class, 'index'])->name('customer.profil');

                Route::post('/account', [CustomerProfilController::class, 'updateInfo'])->name('customer.profilUpdate');

                Route::get('/account/notifications', [NotificationController::class, 'index'])->name('customer.notifications');

                Route::get('/account/orders', [InvoiceController::class, 'index'])->name('customer.invoices');
                Route::delete('/account/orders', [InvoiceController::class, 'delete'])->name('customer.invoices.delete');

                Route::get('/account/orders/{slug}', [InvoiceController::class, 'show'])->name('customer.invoices.single');
                Route::post('/account/orders/{slug}', [GenerateInvoiceController::class, 'generate'])->name('customer.invoices.generate');

                Route::get('/account/invoices', [FactureController::class, 'index'])->name('customer.factures');
                Route::get('/account/invoices/{serial}', [FactureController::class, 'viewPdf'])->name('customer.factures.view');

                Route::get('/account/addresses', [AddresseController::class, 'index'])->name('customer.addresses');
                Route::post('/account/addresses', [AddresseController::class, 'store'])->name('customer.addresses.store');
                Route::delete('/account/addresses', [AddresseController::class, 'delete'])->name('customer.addresses.delete');

                Route::get('/account/wishlist', [WishlistController::class, 'index'])->name('customer.wishlist');
                Route::delete('/account/wishlist', [WishlistController::class, 'delete'])->name('customer.wishlist.delete');

                Route::get('/account/login-session', [LoggedInController::class, 'index'])->name('customer.logged');
                Route::delete('/account/login-session', [LoggedInController::class, 'deleteHistory'])->name('customer.logged.delete');
            });
        });
    }
);
