<?php

use App\Http\Controllers\Devlopper\DevlopperController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dev', 'middleware' => 'web'], function () {

    Route::get('/truncate', [DevlopperController::class, 'clearAllData']);

});
