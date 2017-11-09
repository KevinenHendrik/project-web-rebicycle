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

Route::get('/bike/{id}', 'BikeController@openABike');

Route::get('/sellBike', function () {
    return view('pages/sellBike');
});

Route::get('/bikes', 'BikeController@showAllBikes');
Route::post('/postBikeData','BikeController@postBikeData');
Route::get('/checkIfSellerhasAnAccount','BikeController@checkIfSellerhasAnAccount');

Route::get('/addBikeToShoppingBasket/{id}','BikeController@addBikeToShoppingBasket');
Route::get('/removeBikeFromShoppingBasket/{id}','BikeController@removeBikeFromShoppingBasket');

//Routes when user is authenticated
Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/myBikes', 'BikeController@showMyBikes');

	Route::get('/editMyBike/{id}','BikeController@openEditMyBike');
	Route::post('/editMyBike/{id}','BikeController@editMyBike');
	Route::get('/deleteMyBike/{id}','BikeController@deleteMyBike');
	Route::get('/deleteBikeMedia/{id}','BikeController@deleteBikeMedia');
	Route::post('/addBikeMedia/{id}','BikeController@addBikeMedia');
	Route::get('/setAsMainImage/{id}','BikeController@setAsMainImage');

	Route::get('/favoriteBikes', 'FavoriteController@showAllFavoriteBikes');
	Route::get('/favoriseBike/{id}','FavoriteController@favoriseBike');
	Route::get('/unfavoriseBike/{id}','FavoriteController@unfavoriseBike');




});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
