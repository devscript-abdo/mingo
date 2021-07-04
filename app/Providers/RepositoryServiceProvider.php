<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            'App\Repositories\Category\CategoryInterface',
            'App\Repositories\Category\CategoryRepository'
        );

        $this->app->bind(
            'App\Repositories\Color\ColorInterface',
            'App\Repositories\Color\ColorRepositoryCache'
        );

        $this->app->bind(
            'App\Repositories\Product\ProductInterface',
            'App\Repositories\Product\ProductRepositoryCache'
        );

        $this->app->bind(
            'App\Repositories\ProductCollection\ProductCollectionInterface',
            'App\Repositories\ProductCollection\ProductCollectionRepositoryCache'
        );

        $this->app->bind(
            'App\Repositories\Slider\SliderInterface',
            'App\Repositories\Slider\SliderRepositoryCache'
        );

        $this->app->bind(
            'App\Repositories\Ads\AdsInterface',
            'App\Repositories\Ads\AdsRepository'
        );

        $this->app->bind(
            'App\Repositories\Brand\BrandInterface',
            'App\Repositories\Brand\BrandRepositoryCache'
        );

        $this->app->bind(
            'App\Repositories\Page\PageInterface',
            'App\Repositories\Page\PageRepositoryCache'
        );

        $this->app->bind(
            'App\Repositories\Team\TeamInterface',
            'App\Repositories\Team\TeamRepositoryCache'
        );

        $this->app->bind(
            'App\Repositories\Addresse\AddresseInterface',
            'App\Repositories\Addresse\AddresseRepositoryCache'
        );

        $this->app->bind(
            'App\Repositories\Order\OrderInterface',
            'App\Repositories\Order\OrderRepositoryCache'
        );

        $this->app->bind(
            'App\Repositories\Wishlist\WishlistInterface',
            'App\Repositories\Wishlist\WishlistRepositoryCache'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
