<?php

namespace App\Providers;

use App\Exceptions\DataSourceException;
use Illuminate\Support\ServiceProvider;

class RepositoryAdapterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        switch ($this->app->make('config')->get('mingo.datasource')) {

            case 'cache':

                $this->app->register(RepositoryCacheServiceProvider::class);

                break;

            case 'database':

                $this->app->register(RepositoryServiceProvider::class);

                break;
            default:
                throw new DataSourceException("Unknown data source type ");
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
