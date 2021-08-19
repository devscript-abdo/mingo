<?php

return [


    /**************************API ACCESS TOKEN for app mobile */

    'api_access_token' => env('APP_API_TOKEN', 'mingo.ma'),



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
    'days_befor_cancel_order' => 3,

    /******************************************** */

    /*****Method de payment ****************/

    'paymentMethod' => env('PAYMENT_METHOD', 'cmi'),

    /******Define if API  use cache or no */

    'api_can_cache' => env('APP_API_CACHE', false)
];
