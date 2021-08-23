<?php

namespace App\Providers;

use App\Http\View\Composers\AdsComposer;
use App\Http\View\Composers\CategoryComposer;
use App\Http\View\Composers\PageComposer;
use App\Http\View\Composers\ProductComposer;
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
        // $this->app->singleton(\App\Http\View\Composers\CategoryComposer::class);
        // $this->app->singleton(\App\Http\View\Composers\PageComposer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer(['theme.products.*', 'theme.categories.*', 'layouts.parts.*'], CategoryComposer::class);
        View::composer('layouts.parts.__footer', PageComposer::class);
        View::composer('layouts.parts.*', ProductComposer::class);
        View::composer(['theme.*'], AdsComposer::class);
    }
}
