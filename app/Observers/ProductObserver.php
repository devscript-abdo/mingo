<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        return $this->clearAllCache($product->slug);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        return $this->clearAllCache($product->slug);
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        return $this->clearAllCache($product->slug);
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        return $this->clearAllCache($product->slug);
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        return $this->clearAllCache($product->slug);
    }



    private function clearAllCache($slug)
    {
        $sluger = json_encode($slug);
        cache()->pull('all_products_cache');
        cache()->pull('products_cache_navbar');
        cache()->pull("single_product_cache_{$sluger}");
        cache()->pull('products_cache_active');
        cache()->pull('products_cache_related');
        cache()->pull('products_cache_random');
        cache()->pull('products_cache_topsearch');
        
        cache()->pull('api-products');
        cache()->pull('api-products-latest');
    }
}
