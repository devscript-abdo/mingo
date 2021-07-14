<?php

namespace App\Http\View\Composers;

use App\Repositories\Product\ProductInterface;
use Illuminate\View\View;
use Illuminate\Cache\CacheManager;

class ProductComposer
{

    protected $product;

    protected $cache;

    public function __construct(ProductInterface $product, CacheManager $cache)
    {
        // Dependencies are automatically resolved by the service container...
        if (!$this->product) {
            $this->product = $product;
        }
        $this->cache = $cache;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //$view->with('categories', $this->categories->getWithChildrens());

        $view->with('productsSimilaire', $this->cache->remember('productsSimilaire', $this->timeToLive() /* cache expired time(mins) */, function () {
            return $this->product->similaire();
        }));
    }


    private function timeToLive()
    {

        return \Carbon\Carbon::now()->addDays(30);
    }
}
