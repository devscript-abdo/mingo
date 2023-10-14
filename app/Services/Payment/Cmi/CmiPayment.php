<?php

namespace App\Services\Payment\Cmi;

use App\Services\Payment\PaymentInterface;

class CmiPayment implements PaymentInterface
{
    public function getPayment()
    {

        return 'CMI MAROC';
    }
}
