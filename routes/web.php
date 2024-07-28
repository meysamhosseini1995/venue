<?php

use App\Http\Controllers\Site\VenueController;
use Illuminate\Support\Facades\Route;



Route::group(['namespace' => 'App\Http\Controllers\Site'], function () {

    Route::controller(VenueController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/venue/{id}', 'show');
        Route::get('/venue-type/{venueType}', 'venueFilteredByVenueType')->name('venueTypePage');
        Route::get('/property-type/{propertyType}', 'venueFilteredByPropertyType')->name('propertyTypePage');
        Route::get('/event-list/{eventList}', 'venueFilteredByEventList')->name('eventListPage');
    });

});