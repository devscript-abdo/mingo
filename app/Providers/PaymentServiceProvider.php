<?php

namespace App\Providers;

use App\Exceptions\PaymentMethodException;
use App\Services\Payment\Cmi\CmiPayment;
use App\Services\Payment\PaymentInterface;
use App\Services\Payment\Payzone\PayzonePayment;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentInterface::class, function ($app) {

            switch ($app->make('config')->get('mingo.paymentMethod')) {

                case 'cmi':

                    return new CmiPayment();
                case 'payzone':

                    return new PayzonePayment();

                default:
                    throw new PaymentMethodException("Unknown payment method");
            }
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
