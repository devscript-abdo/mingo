<?php

namespace App\Repositories\Wishlist;

use App\Models\Wishlist;

class WishlistRepository  implements WishlistInterface
{

    protected $model;

    public function __construct(Wishlist $model)
    {
        $this->model = $model;
    }


    public function query()
    {
        return $this->model->query();
    }

    public function all()
    {
        return $this->model->all();
    }


    public function active()
    {
        return $this->model->active();
    }

    public function getCustomerWishlist()
    {
        return auth()->guard('customer')->user()->wishlist()->with('products')->get();
    }
}
