<?php

namespace App\Providers;

use App\Repositories\Category\CategoryInterface;
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

        View::composer($viewsPages, function ($view) use ($categories) {

            $view->with('categories', $categories);
        });
    }
}
