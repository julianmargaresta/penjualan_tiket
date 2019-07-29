<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@doLogin');
Route::get('/logout', 'Auth\LoginController@doLogout');
Route::get('/register', 'Auth\RegisterController@index');
Route::post('/register', 'Auth\RegisterController@doRegister');
Route::get('/home', 'Admin\GenresController@index');
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::middleware("auth")->group(function() {

  Route::prefix('genre')->group(function(){
  	Route::get('/', 'Admin\GenresController@index');
  	Route::post('/store','Admin\GenresController@store');
  	Route::post('/{id}/update','Admin\GenresController@update');
  	Route::get('/{id}/edit','Admin\GenresController@edit');
  	Route::get('/{id}/delete','Admin\GenresController@destroy');
  });

  Route::prefix('studio')->group(function(){
    Route::get('/', 'Admin\StudiosController@index');
    Route::post('/store','Admin\StudiosController@store');
    Route::post('/{id}/update','Admin\StudiosController@update');
    Route::get('/{id}/edit','Admin\StudiosController@edit');
    Route::get('/{id}/delete','Admin\StudiosController@destroy');
    Route::get('/{id}','Admin\StudiosController@show');

  });

  Route::prefix('film')->group(function(){
  	Route::get('/', 'Admin\FilmsController@index');
  	Route::post('/store','Admin\FilmsController@store');
  	Route::post('/{id}/update','Admin\FilmsController@update');
  	Route::get('/{id}/edit','Admin\FilmsController@edit');
  	Route::get('/{id}/delete','Admin\FilmsController@destroy');
  	Route::get('/{id}','Admin\FilmsController@show');
  });

  Route::prefix('user')->group(function(){
  	Route::get('/', 'Admin\UsersController@index');
  	Route::post('/store','Admin\UsersController@store');
  	Route::post('/{id}/update','Admin\UsersController@update');
  	Route::get('/{id}/edit','Admin\UsersController@edit');
  	Route::get('/{id}/delete','Admin\UsersController@destroy');
  	Route::get('/{id}','Admin\UsersController@show');
  });

  Route::get('/orderuser', 'User\OrderController@index');

  Route::prefix('dashboard')->group(function(){
    Route::get('/', 'User\DashboardController@index');
  });
  // route order kecuali create
  Route::resource('order', 'Admin\OrdersController')->except([
    'create', 'edit', 'update', 'destroy'
  ]);

});
;
