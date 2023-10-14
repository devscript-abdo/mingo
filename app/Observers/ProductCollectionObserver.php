<?php

namespace App\Observers;

use App\Models\ProductCollection;

class ProductCollectionObserver
{
    /**
     * Handle the ProductCollection "created" event.
     *
     * @return void
     */
    public function created(ProductCollection $productCollection)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the ProductCollection "updated" event.
     *
     * @return void
     */
    public function updated(ProductCollection $productCollection)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the ProductCollection "deleted" event.
     *
     * @return void
     */
    public function deleted(ProductCollection $productCollection)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the ProductCollection "restored" event.
     *
     * @return void
     */
    public function restored(ProductCollection $productCollection)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the ProductCollection "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(ProductCollection $productCollection)
    {
        return $this->clearAllCache();
    }

    private function clearAllCache()
    {
        cache()->pull('productsCollection_cache');
        cache()->pull('productsCollection_cache_home');
    }
}
