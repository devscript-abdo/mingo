<?php

namespace App\Providers;

use App\Repositories\Category\CategoryInterface;
use App\Repositories\Page\PageInterface;
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
            'theme.categories.*',
            'layouts.parts.*'
        ];

        $categories = app(CategoryInterface::class)->getWithChildrens();

        $categoriesMenu = app(CategoryInterface::class)->model()->showInMenu();

        View::composer($viewsPages, function ($view) use ($categories) {

            $view->with('categories', $categories);
        });

        View::composer('layouts.parts.*', function ($view) use ($categoriesMenu) {

            $view->with('categoriesMenu', $categoriesMenu);
        });

        $footerPages = app(PageInterface::class)->getFooters();

        View::composer('layouts.parts.__footer', function ($view) use ($footerPages) {

            $view->with('footerPages', $footerPages);
        });
    }
}
