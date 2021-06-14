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
            'App\Repositories\Color\ColorRepository'
        );

        $this->app->bind(
            'App\Repositories\Product\ProductInterface',
            'App\Repositories\Product\ProductRepository'
        );

        $this->app->bind(
            'App\Repositories\Slider\SliderInterface',
            'App\Repositories\Slider\SliderRepository'
        );

        $this->app->bind(
            'App\Repositories\Ads\AdsInterface',
            'App\Repositories\Ads\AdsRepository'
        );

        $this->app->bind(
            'App\Repositories\Brand\BrandInterface',
            'App\Repositories\Brand\BrandRepository'
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
