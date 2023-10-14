<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private $repositories = [
        [
            'abstract' => "App\Repositories\Category\CategoryInterface",
            'concrete' => "App\Repositories\Category\CategoryRepository",
        ],
        [
            'abstract' => "App\Repositories\Color\ColorInterface",
            'concrete' => "App\Repositories\Color\ColorRepository",
        ],
        [
            'abstract' => "App\Repositories\Product\ProductInterface",
            'concrete' => "App\Repositories\Product\ProductRepository",
        ],
        [
            'abstract' => "App\Repositories\Category\CategoryRepositoryInterface",
            'concrete' => "App\Repositories\Category\CategoryRepository",
        ],
        [
            'abstract' => "App\Repositories\Product\ProductRepositoryInterface",
            'concrete' => "App\Repositories\Product\ProductRepository",
        ],
        [
            'abstract' => "App\Repositories\ProductCollection\ProductCollectionInterface",
            'concrete' => "App\Repositories\ProductCollection\ProductCollectionRepository",
        ],
        [
            'abstract' => "App\Repositories\Slider\SliderInterface",
            'concrete' => "App\Repositories\Slider\SliderRepository",
        ],
        [
            'abstract' => "App\Repositories\Ads\AdsInterface",
            'concrete' => "App\Repositories\Ads\AdsRepository",
        ],
        [
            'abstract' => "App\Repositories\Brand\BrandInterface",
            'concrete' => "App\Repositories\Brand\BrandRepository",
        ],
        [
            'abstract' => "App\Repositories\Page\PageInterface",
            'concrete' => "App\Repositories\Page\PageRepository",
        ],
        [
            'abstract' => "App\Repositories\Team\TeamInterface",
            'concrete' => "App\Repositories\Team\TeamRepository",
        ],
        [
            'abstract' => "App\Repositories\Addresse\AddresseInterface",
            'concrete' => "App\Repositories\Addresse\AddresseRepository",
        ],
        [
            'abstract' => "App\Repositories\Order\OrderInterface",
            'concrete' => "App\Repositories\Order\OrderRepository",
        ],
        [
            'abstract' => "App\Repositories\Wishlist\WishlistInterface",
            'concrete' => "App\Repositories\Wishlist\WishlistRepository",
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

        /* $this->app->bind(
            'App\Repositories\Category\CategoryInterface',
            'App\Repositories\Category\CategoryRepository'
        );*/
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
