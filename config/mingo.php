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

    'datasource' => env('APP_DATA_SOURCE', 'cache'),


    /***
     * Dashboard URL
     */
    'admin' => env('APP_ADMIN_URL', 'admin'),


    /**************Order setting *******************/
    'days_befor_cancel_order' => 3
];
