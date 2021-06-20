<?php

namespace App\Helpers;

use App\Repository\Cart\CartInterface;

class Helper
{

   /* public function myCart()
    {
        return app(CartInterface::class);
    }*/

    public function int_to_decimal(int $number)
    {
        return number_format(($number / 100), 2);
    }

    function presentPrice($price)
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

}
