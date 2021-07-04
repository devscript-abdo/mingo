<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryCacheServiceProvider extends ServiceProvider
{

    private $repositories = [
        [
            'abstract' => "App\Repositories\Category\CategoryInterface",
            'concrete' => "App\Repositories\Category\CategoryRepositoryCache"
        ],
        [
            'abstract' => "App\Repositories\Color\ColorInterface",
            'concrete' => "App\Repositories\Color\ColorRepositoryCache"
        ],
        [
            'abstract' => "App\Repositories\Product\ProductInterface",
            'concrete' => "App\Repositories\Product\ProductRepositoryCache"
        ],
        [
            'abstract' => "App\Repositories\Category\CategoryRepositoryInterface",
            'concrete' => "App\Repositories\Category\CategoryRepositoryCache"
        ],
        [
            'abstract' => "App\Repositories\Product\ProductRepositoryInterface",
            'concrete' => "App\Repositories\Product\ProductRepositoryCache"
        ],
        [
            'abstract' => "App\Repositories\ProductCollection\ProductCollectionInterface",
            'concrete' => "App\Repositories\ProductCollection\ProductCollectionRepositoryCache"
        ],
        [
            'abstract' => "App\Repositories\Slider\SliderInterface",
            'concrete' => "App\Repositories\Slider\SliderRepositoryCache"
        ],
        [
            'abstract' => "App\Repositories\Ads\AdsInterface",
            'concrete' => "App\Repositories\Ads\AdsRepository"
        ],
        [
            'abstract' => "App\Repositories\Brand\BrandInterface",
            'concrete' => "App\Repositories\Brand\BrandRepositoryCache"
        ],
        [
            'abstract' => "App\Repositories\Page\PageInterface",
            'concrete' => "App\Repositories\Page\PageRepositoryCache"
        ],
        [
            'abstract' => "App\Repositories\Team\TeamInterface",
            'concrete' => "App\Repositories\Team\TeamRepositoryCache"
        ],
        [
            'abstract' => "App\Repositories\Addresse\AddresseInterface",
            'concrete' => "App\Repositories\Addresse\AddresseRepositoryCache"
        ],
        [
            'abstract' => "App\Repositories\Order\OrderInterface",
            'concrete' => "App\Repositories\Order\OrderRepositoryCache"
        ],
        [
            'abstract' => "App\Repositories\Wishlist\WishlistInterface",
            'concrete' => "App\Repositories\Wishlist\WishlistRepositoryCache"
        ],
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $repo) {
            $this->app->bind(
                $repo['abstract'],
                $repo['concrete'],
            );
        }
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
