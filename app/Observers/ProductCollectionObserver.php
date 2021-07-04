<?php

namespace App\Observers;

use App\Models\ProductCollection;

class ProductCollectionObserver
{
    /**
     * Handle the ProductCollection "created" event.
     *
     * @param  \App\Models\ProductCollection  $productCollection
     * @return void
     */
    public function created(ProductCollection $productCollection)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the ProductCollection "updated" event.
     *
     * @param  \App\Models\ProductCollection  $productCollection
     * @return void
     */
    public function updated(ProductCollection $productCollection)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the ProductCollection "deleted" event.
     *
     * @param  \App\Models\ProductCollection  $productCollection
     * @return void
     */
    public function deleted(ProductCollection $productCollection)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the ProductCollection "restored" event.
     *
     * @param  \App\Models\ProductCollection  $productCollection
     * @return void
     */
    public function restored(ProductCollection $productCollection)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the ProductCollection "force deleted" event.
     *
     * @param  \App\Models\ProductCollection  $productCollection
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
