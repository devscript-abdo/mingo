<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Devlopper\DevlopperController;


Route::group(['prefix' => 'dev', 'middleware' => 'web'], function () {

    Route::get('/truncate', [DevlopperController::class, 'clearAllData']);
    
});
