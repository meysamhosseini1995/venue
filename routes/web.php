<?php

use Illuminate\Support\Facades\Route;



Route::group(['namespace' => 'App\Http\Controllers\Site'], function () {
    Route::get('/', 'VenueController@index');
    Route::get('/venue/{id}', 'VenueController@show');
});