<?php

namespace App\Repositories\Wishlist;

interface WishlistInterface
{
    public function all();

    public function query();

    public function active();

    public function getCustomerWishlist();
    // more
}
