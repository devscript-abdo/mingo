<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //

    public  function  index()
    {
        $lists = Wishlist::where('customer_id', auth()->user()->id)
            ->with('products')
            ->get();

        return view('theme.auth.customer.app.wishlist.index', compact('lists'));
    }

    public function delete(Request $request)
    {
        $request->validate(['wisher' => 'required|integer']);
        
        $wish = Wishlist::find($request->wisher);

        if ($wish) {

            $wish->delete();

            return redirect()->back();
        }
        return redirect()->back();
    }
}
