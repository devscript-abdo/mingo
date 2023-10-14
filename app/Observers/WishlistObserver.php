<?php

namespace App\Observers;

use App\Models\Wishlist;

class WishlistObserver
{
    /**
     * Handle the Wishlist "created" event.
     *
     * @return void
     */
    public function created(Wishlist $wishlist)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the Wishlist "updated" event.
     *
     * @return void
     */
    public function updated(Wishlist $wishlist)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the Wishlist "deleted" event.
     *
     * @return void
     */
    public function deleted(Wishlist $wishlist)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the Wishlist "restored" event.
     *
     * @return void
     */
    public function restored(Wishlist $wishlist)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the Wishlist "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Wishlist $wishlist)
    {
        return $this->clearAllCache();
    }

    private function clearAllCache()
    {
        if (! request()->routeIs(
            'api.account.wishlist-create.fr',
            'api.account.wishlist-create.ar',
            'api.account.wishlist-delete.ar',
            'api.account.wishlist-delete.fr',
        )) {
            $idd = json_encode(auth()->guard('customer')->user()->id);

            cache()->pull("customer_wishlist_{$idd}");
        } else {

            $id = json_encode(auth('sanctum')->user()->id);

            cache()->pull("customer_wishlist_{$id}");
        }
    }
}
