<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
class SmsController extends Controller
{
    



    public function index()
    {
        Nexmo::message()->send([
            'to'=>'212660405003',
            'from'=>'212677512753',
            'text'=>'Hey mingo'
        ]);

        echo "Is sent";
    }
}
