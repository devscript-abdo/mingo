<?php

namespace App\Observers;

use App\Models\Brand;

class BrandObserver
{
    /**
     * Handle the Brand "created" event.
     *
     * @return void
     */
    public function created(Brand $brand)
    {
        return $this->clearAllCache($brand->slug);
    }

    /**
     * Handle the Brand "updated" event.
     *
     * @return void
     */
    public function updated(Brand $brand)
    {
        return $this->clearAllCache($brand->slug);
    }

    /**
     * Handle the Brand "deleted" event.
     *
     * @return void
     */
    public function deleted(Brand $brand)
    {
        return $this->clearAllCache($brand->slug);
    }

    /**
     * Handle the Brand "restored" event.
     *
     * @return void
     */
    public function restored(Brand $brand)
    {
        return $this->clearAllCache($brand->slug);
    }

    /**
     * Handle the Brand "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Brand $brand)
    {
        return $this->clearAllCache($brand->slug);
    }

    private function clearAllCache($slug)
    {
        $slg = json_encode($slug);

        cache()->pull('brands_cache');

        cache()->pull("brands_cache_slug_{$slg}");

        cache()->pull('brands_cache_active');
    }
}
