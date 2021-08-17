<?php

namespace App\Http\Controllers\Devlopper;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Review;
use App\Models\UserLogin;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class DevlopperController extends Controller
{



    public function clearAllData()
    {
        UserLogin::truncate();
        Wishlist::truncate();
        Invoice::truncate();
        Order::truncate();
        OrderProduct::truncate();
        Review::truncate();

        return response()->json(['message' => 'all data was deleted'], 200);
    }
}