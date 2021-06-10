<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $viewsPages = [
            'theme.products.*',
        ];

        $categories = app(CategoryInter::class)->getWithChildrens();

        View::composer($viewsPages, function ($view) use ($categories) {

            $view->with('pages', $categories);
        });
    }
}
