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


// get all books
 
// protected routes, access only with authentication
Route::middleware('auth:api')->group(function() {
   
});

Route::get('products', 'OrderingController@products');
Route::get('productscategories/{id}', 'OrderingController@productsCategories');
Route::get('categories', 'OrderingController@categories');
Route::post('orderproduct', 'OrderingController@orderProduct');
Route::post('member','OrderingController@member');
Route::post('create','OrderingController@create');
Route::post('reserve','OrderingController@reserve');

Route::post('submitrating', 'RatingController@store');

Route::post('login','MenuController@login');

