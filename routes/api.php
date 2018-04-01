<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware('api')->group(function (){

Route::prefix('routes')->group(function (){

    Route::post('/', 'Api\RouteApiController@index')->name('routes.api.index');
    Route::post('/store', 'Api\RouteApiController@store')->name('routes.api.store');
    Route::post('/{id}/show', 'Api\RouteApiController@show')->name('routes.api.show');
    /*Route::get('/{id}/edit', 'RouteController@edit')->name('routes.edit');
    Route::post('/{id}/update', 'RouteController@update')->name('routes.update');
    Route::get('/{id}/delete', 'RouteController@delete')->name('routes.delete');*/

});

//-
//});

