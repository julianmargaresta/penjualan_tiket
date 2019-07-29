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

// route register => api/register/
Route::post('/register', 'Auth\RegisterController@doRegister');

Route::group(['prefix' => 'v1'], function () {
    // route film => api/v1/film/
    Route::group(['prefix' => 'film'], function () {
        /**
         * route film   => api/v1/film                  -> untuk semua film
         *              => api/v1/film?search={nama}    -> untuk berdasarkan nama
         *              => api/v1/film?genre={genre}    -> untuk berdasarkan genre
         *              => api/v1/film?active           -> untuk melihat film yang aktif
         */
        Route::get('/', 'Api\v1\FilmsController@index');

    });

    // route order => api/v1/order/
    Route::group(['prefix' => 'order'], function () {
        // route order => api/v1/order      -> untuk membuat order
        Route::post('/', 'Api\v1\OrderController@store');

    });

});
