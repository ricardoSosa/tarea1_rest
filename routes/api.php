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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();


//Route::get('/test', function () {
//    dd('si esntro');
//});

Route::get('sellers', 'SellersController@index');

//Route::get('sellers/{id}', 'SellersController@show');

//Route::post('sellers', 'SellersController@store');

//Route::put('sellers/{id}', 'SellersController@update');

//Route::patch('sellers/{id}', 'SellersController@update');

//Route::delete('sellers/{id}', 'SellersController@destroy');

//Route::post('sellers/{id}/sellersAddresses', 'SellerAddressesController@store');

//Route::put('sellers/{id}/sellerAddresses', 'SellerAddressesController@update');

Route::get('products', 'ProductsController@index');

//Route::get('products/{id}', 'ProductsController@show');

Route::post('products', 'ProductsController@store');

//Route::put('products/{id}', 'ProductsController@update');

//Route::patch('products/{id}', 'ProductsController@update');

//Route::delete('products/{id}', 'ProductsController@destroy');

//Route::post('products/{id}/reviews', 'ReviewsController@store');

//Route::get('products/{id}/reviews', 'ReviewsController@index');

//Route::delete('products/{id}/reviews/{id}', 'ProductsController@destroy');
//index, show, store, update, N/A patch, destroy
//});
