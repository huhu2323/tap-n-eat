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
Route::get('{category}/products', 'OrderingController@filteredProducts');
Route::get('productscategories/{id}', 'OrderingController@productsCategories');
Route::get('categories', 'OrderingController@categories');
Route::post('orderproduct', 'OrderingController@orderProduct');
Route::get('orders', 'OrderingController@index');
Route::post('member','OrderingController@login');
Route::post('create','OrderingController@create');
Route::post('reserve','OrderingController@reserve');
Route::get('kitchen','OrderingController@kitchen');



Route::post('submitrating', 'RatingController@store');
Route::get('{product}/comments', 'RatingController@index');
Route::get('{product}/calculate', 'RatingController@calculateRating');


Route::post('login','MenuController@login');