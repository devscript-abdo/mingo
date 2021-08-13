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
        return $this->clearAllCache();
    }

    /**
     * Handle the Wishlist "updated" event.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return void
     */
    public function updated(Wishlist $wishlist)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the Wishlist "deleted" event.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return void
     */
    public function deleted(Wishlist $wishlist)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the Wishlist "restored" event.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return void
     */
    public function restored(Wishlist $wishlist)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the Wishlist "force deleted" event.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return void
     */
    public function forceDeleted(Wishlist $wishlist)
    {
        return $this->clearAllCache();
    }

    private function clearAllCache()
    {
        if (!request()->routeIs('api.account.wishlist-create.fr', 'api.account.wishlist-create.ar')) {
            $idd = json_encode(auth()->guard('customer')->user()->id);

            cache()->pull("customer_wishlist_{$idd}");
        } else {

            $id = json_encode(auth('sanctum')->user()->id);

            cache()->pull("customer_wishlist_{$id}");
        }
    }
}
