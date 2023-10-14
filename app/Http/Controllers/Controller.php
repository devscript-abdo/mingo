<?php

namespace App\Http\Controllers;

use App\Traits\InterfaceHandler;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, InterfaceHandler, ValidatesRequests;

    public function timeToLiveForCache()
    {
        return \Carbon\Carbon::now()->addDays(30);
    }
}
