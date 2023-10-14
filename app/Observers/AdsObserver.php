<?php

namespace App\Observers;

use App\Models\Ads;

class AdsObserver
{
    /**
     * Handle the Ads "created" event.
     *
     * @return void
     */
    public function created(Ads $ads)
    {
        cache()->pull('ads_cache');
        cache()->pull('ads_published_cache');
        cache()->pull('ads_locations_cache');
    }

    /**
     * Handle the Ads "updated" event.
     *
     * @return void
     */
    public function updated(Ads $ads)
    {
        cache()->pull('ads_cache');
        cache()->pull('ads_published_cache');
        cache()->pull('ads_locations_cache');
    }

    /**
     * Handle the Ads "deleted" event.
     *
     * @return void
     */
    public function deleted(Ads $ads)
    {
        cache()->pull('ads_cache');
        cache()->pull('ads_published_cache');
        cache()->pull('ads_locations_cache');
    }

    /**
     * Handle the Ads "restored" event.
     *
     * @return void
     */
    public function restored(Ads $ads)
    {
        cache()->pull('ads_cache');
        cache()->pull('ads_published_cache');
        cache()->pull('ads_locations_cache');
    }

    /**
     * Handle the Ads "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Ads $ads)
    {
        cache()->pull('ads_cache');
        cache()->pull('ads_published_cache');
        cache()->pull('ads_locations_cache');
    }
}
