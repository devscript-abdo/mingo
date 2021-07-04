<?php

namespace App\Observers;

use App\Models\Wishlist;

class WishlistObserver
{
    /**
     * Handle the Wishlist "created" event.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return void
     */
    public function created(Wishlist $wishlist)
    {
        return $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    /**
     * Handle the Wishlist "updated" event.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return void
     */
    public function updated(Wishlist $wishlist)
    {
        return $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    /**
     * Handle the Wishlist "deleted" event.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return void
     */
    public function deleted(Wishlist $wishlist)
    {
        return $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    /**
     * Handle the Wishlist "restored" event.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return void
     */
    public function restored(Wishlist $wishlist)
    {
        return $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    /**
     * Handle the Wishlist "force deleted" event.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return void
     */
    public function forceDeleted(Wishlist $wishlist)
    {
        return $this->clearAllCache(auth()->guard('customer')->user()->id);
    }

    private function clearAllCache($id)
    {

        $idd = json_encode($id);

        cache()->pull("customer_wishlist_{$idd}");
    }
}
