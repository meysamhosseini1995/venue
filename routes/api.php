<?php

use App\Http\Controllers\Api\Application\V1\VenueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {

    Route::group(['prefix' => 'application', 'namespace' => 'Application'], function () {

        Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function () {
            Route::get('main', 'MainController');

            Route::prefix('venue')->controller(VenueController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/sort-by-event-list/{event_list_id}', 'getVenueWithSortByEventList');
                Route::get('/sort-by-venue-type/{venue_type_id}', 'getVenueWithSortByVenueType');
                Route::get('/sort-by-property-type/{property_type_id}', 'getVenueWithSortByPropertyType');
                Route::get('/{id}', 'show');
            });
        });
    });

});