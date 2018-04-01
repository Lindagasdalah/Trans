<?php

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', function(){
    return view('layouts.main');
});

Route::middleware('auth')->group(function (){

    Route::prefix('routes')->group(function (){

        Route::get('/', 'RouteController@index')->name('routes.index');
        Route::get('/create', 'RouteController@create')->name('routes.create');
        Route::post('/store', 'RouteController@store')->name('routes.store');
        Route::get('/{id}/show', 'RouteController@show')->name('routes.show');
        Route::get('/{id}/edit', 'RouteController@edit')->name('routes.edit');
        Route::post('/{id}/update', 'RouteController@update')->name('routes.update');
        Route::get('/{id}/delete', 'RouteController@delete')->name('routes.delete');
        Route::post('/getRoutesByLigne','RouteController@getRoutesByLigne')->name('getRoutesByLigne');



    });

    Route::prefix('agences')->group(function (){

        Route::get('/', 'AgenceController@index')->name('agences.index');
        Route::get('/create', 'AgenceController@create')->name('agences.create');
        Route::post('/store', 'AgenceController@store')->name('agences.store');
        Route::get('/{id}/show', 'AgenceController@show')->name('agences.show');
        Route::get('/{id}/edit', 'AgenceController@edit')->name('agences.edit');
        Route::post('/{id}/update', 'AgenceController@update')->name('agences.update');
        Route::get('/{id}/delete', 'AgenceController@delete')->name('agences.delete');

    });
    Route::prefix('users')->group(function (){

        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('/create', 'UserController@create')->name('users.create');
        Route::post('/store', 'UserController@store')->name('users.store');
        Route::get('/{id}/show', 'UserController@show')->name('users.show');
        Route::get('/{id}/edit', 'UserController@edit')->name('users.edit');
        Route::post('/{id}/update', 'UserController@update')->name('users.update');
        Route::get('/{id}/delete', 'UserController@delete')->name('users.delete');

    });
    Route::prefix('stops')->group(function (){

        Route::get('/', 'StopController@index')->name('stops.index');
        Route::get('/create', 'StopController@create')->name('stops.create');
        Route::post('/store', 'StopController@store')->name('stops.store');
        Route::get('/{id}/show', 'StopController@show')->name('stops.show');
        Route::get('/{id}/edit', 'StopController@edit')->name('stops.edit');
        Route::post('/{id}/update', 'StopController@update')->name('stops.update');
        Route::get('/{id}/delete', 'StopController@delete')->name('stops.delete');
        Route::post('getStopsByTransport','StopController@getStopsByTransport')->name('getStopsByTransport');




    });
    Route::prefix('stops_time')->group(function (){

        Route::get('/', 'StopTimeController@index')->name('stops_time.index');
        Route::get('/create', 'StopTimeController@create')->name('stops_time.create');
        Route::post('/store', 'StopTimeController@store')->name('stops_time.store');
        Route::get('/{id}/show', 'StopTimeController@show')->name('stops_time.show');
        Route::get('/{id}/edit', 'StopTimeController@edit')->name('stops_time.edit');
        Route::post('/{id}/update', 'StopTimeController@update')->name('stops_time.update');
        Route::get('/{id}/delete', 'StopTimeController@delete')->name('stops_time.delete');

    });
    Route::prefix('lignes')->group(function (){

        Route::get('/', 'LigneController@index')->name('lignes.index');
        Route::get('/create', 'LigneController@create')->name('lignes.create');
        Route::post('/store', 'LigneController@store')->name('lignes.store');
        Route::get('/{id}/show', 'LigneController@show')->name('lignes.show');
        Route::get('/{id}/edit', 'LigneController@edit')->name('lignes.edit');
        Route::post('/{id}/update', 'LigneController@update')->name('lignes.update');
        Route::get('/{id}/delete', 'LigneController@delete')->name('lignes.delete');
        Route::post('/getLignesByTransport','LigneController@getLignesByTransport')->name('getLignesByTransport');

    });
    Route::prefix('feries')->group(function (){

        Route::get('/', 'FeriesController@index')->name('feries.index');
        Route::get('/create', 'FeriesController@create')->name('feries.create');
        Route::post('/store', 'FeriesController@store')->name('feries.store');
        Route::get('/{id}/show', 'FeriesController@show')->name('feries.show');
        Route::get('/{id}/edit', 'FeriesController@edit')->name('feries.edit');
        Route::post('/{id}/update', 'FeriesController@update')->name('feries.update');
        Route::get('/{id}/delete', 'FeriesController@delete')->name('feries.delete');

    });

    Route::prefix('routeStops')->group(function (){

        Route::get('/', 'RouteStopsController@index')->name('routeStops.index');
        Route::get('/{id}/show', 'RouteStopsController@show')->name('routeStops.show');
        Route::post('/getStopsByTransport','RouteStopsController@getStopsByTransport')->name('getStopsByTransport');



    });

    Route::prefix('trips')->group(function (){

        Route::get('/', 'TripController@index')->name('trips.index');
        Route::get('/create', 'TripController@create')->name('trips.create');
        Route::post('/store', 'TripController@store')->name('trips.store');
        Route::get('/{id}/show', 'TripController@show')->name('trips.show');
        Route::get('/{id}/edit', 'TripController@edit')->name('trips.edit');
        Route::post('/{id}/update', 'TripController@update')->name('trips.update');
        Route::get('/{id}/delete', 'TripController@delete')->name('trips.delete');
        Route::post('/getTripsByRoute', 'TripController@getTripsByRoute')->name('getTripsByRoute');


    });

});
