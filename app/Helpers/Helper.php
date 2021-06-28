<?php

namespace App\Helpers;

class Helper
{

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
