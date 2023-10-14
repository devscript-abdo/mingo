<?php

namespace App\Repositories\Wishlist;

use App\Models\Wishlist;
use App\Repositories\CacheTrait;

class WishlistRepositoryCache implements WishlistInterface
{
    use CacheTrait;

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
        $auth = auth()->guard('customer')->user();
        $id = json_encode($auth->id);

        return $this->setCache()->remember("customer_wishlist_{$id}", $this->timeToLive(), function () use ($auth) {
            return $auth->wishlist()->with('products')->get();
        });
    }
}
