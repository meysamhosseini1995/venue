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
                Route::get('/{id}', 'show');
            });
        });
    });

});