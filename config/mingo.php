<?php

return [


    'elequont_cache_days' => 30,


    /***
     * used in RepositoryCacheServiceProvider
     * 
     * cache or database 
     * 
     * 
     * */

    'datasource' => env('APP_DATA_SOURCE', 'cache')
];
