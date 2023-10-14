<?php

namespace App\Helpers;

class Helper
{
    public function getPrice($priceInDecimals): string
    {
        $price = floatval($priceInDecimals) / 1;

        return number_format($price, 2, '.', ',');
    }

    public function int_to_decimal(int $number): string
    {
        return number_format(($number / 100), 2);
    }

    public function presentPrice($price): ?string
    {
        return money_format('$%i', $price / 100);
    }

    /***********Local  */

    public function currentLocale()
    {
        return \LaravelLocalization::getCurrentLocale();
    }

    public function currentLocaleName()
    {
        return \LaravelLocalization::getCurrentLocaleName();
    }

    public function getInvoiceLogo(): string
    {
        //return public_path('storage//' . setting('site.logo'))
        // ??
        return public_path('vendor/invoices/logo.png');
    }

    public function daysBeforCancelOrder($date): bool
    {
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $date);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', now());
        $diff_in_days = $to->diffInDays($from);

        return $diff_in_days >= config('mingo.days_befor_cancel_order');
    }
}
