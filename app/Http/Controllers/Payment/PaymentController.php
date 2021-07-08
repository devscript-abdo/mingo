<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CMI\CmiClient;
class PaymentController extends Controller
{
    //

    public function proccess(Request $request)
    {
        $base_url = config('app.url');
        $client = new CmiClient([
            'storekey' => '', // STOREKEY
            'clientid' => '', // CLIENTID
            'oid' => $request->cmd, // COMMAND ID IT MUST BE UNIQUE
            'shopurl' => $base_url, // SHOP URL FOR REDIRECTION
            'okUrl' => route('payment.proccess.fail'), // REDIRECTION AFTER SUCCEFFUL PAYMENT
            'failUrl' => route('payment.proccess.fail'), // REDIRECTION AFTER FAILED PAYMENT
            'email' => 'mehdi.rochdi@gmail.com', // YOUR EMAIL APPEAR IN CMI PLATEFORM
            'BillToName' => 'mehdi rochdi', // YOUR NAME APPEAR IN CMI PLATEFORM
            'BillToCompany' => 'company name', // YOUR COMPANY NAME APPEAR IN CMI PLATEFORM
            'BillToStreet12' => '100 rue adress', // YOUR ADDRESS APPEAR IN CMI PLATEFORM NOT REQUIRED
            'BillToCity' => 'casablanca', // YOUR CITY APPEAR IN CMI PLATEFORM NOT REQUIRED
            'BillToStateProv' => 'Maarif Casablanca', // YOUR STATE APPEAR IN CMI PLATEFORM NOT REQUIRED
            'BillToPostalCode' => '20230', // YOUR POSTAL CODE APPEAR IN CMI PLATEFORM NOT REQUIRED
            'BillToCountry' => '504', // YOUR COUNTRY APPEAR IN CMI PLATEFORM NOT REQUIRED (504=MA)
            'tel' => '0021201020304', // YOUR PHONE APPEAR IN CMI PLATEFORM NOT REQUIRED
            'amount' => $request->amount, // RETRIEVE AMOUNT WITH METHOD POST
            'CallbackURL' => $base_url . '/callback', // CALLBACK
        ]);
    }

    public function proccessDone(Request $request)
    {
        dd($request->all());
    }
}
