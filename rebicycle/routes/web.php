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

Route::get('/bikes', function () {
    return view('pages/bikes');
});

Route::get('/bike', function () {
    return view('pages/bike');
});

Route::get('/sellBike', function () {
    return view('pages/sellBike');
});

Route::group(['middleware' => 'auth'], function () {
	//Routes when user is authenticated
	Route::post('/storeNewBike','BikeController@storeNewBike');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
