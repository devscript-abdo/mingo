<?php

namespace App\Services\Payment\Payzone;

use App\Services\Payment\PaymentInterface;

class PayzonePayment implements PaymentInterface
{

    public function getPayment(){

        return 'PayzonePayment MAROC';
    }
    
}
