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


// this is the routes for the defaults
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/', 'HomeController@index')->name('home');

//this is the routes for modules
Route::group(['prefix' => 'pos', 'middleware' => 'auth' , 'as' => 'pos.'], function() {
	Route::get('/', 'PosController@index')->name('index');
});



Route::group(['prefix' => 'report', 'middleware' => 'auth' , 'as' => 'report.'], function() {
	Route::get('/', 'ReportController@index')->name('index');
});

Route::group(['prefix' => 'sales', 'middleware' => 'auth' , 'as' => 'sales.'], function() {
	Route::get('/', 'SalesController@index')->name('index');
});

Route::group(['prefix' => 'product', 'middleware' => 'auth' , 'as' => 'product.'], function() {
	Route::get('/', 'ProductController@index')->name('index');
	Route::get('new', 'ProductController@create')->name('create');
	Route::post('new', 'ProductController@store')->name('create');
	Route::get('{product}/edit', 'ProductController@edit')->name('edit');
	Route::post('{product}/edit', 'ProductController@storeEdit')->name('edit');
	Route::get('{product}/destroy', 'ProductController@destroy')->name('destroy');
	Route::get('{product}/forcedestroy', 'ProductController@forceDestroy')->name('forceDestroy');
	Route::get('{product}/restore', 'ProductController@restore')->name('restore');
});

Route::group(['prefix' => 'category', 'middleware' => 'auth' , 'as' => 'category.'], function() {
	Route::get('/', 'CategoryController@index')->name('index');
	Route::get('new', 'CategoryController@create')->name('create');
	Route::post('new', 'CategoryController@store')->name('create');
	Route::get('{category}/edit', 'CategoryController@edit')->name('edit');
	Route::post('{category}/edit', 'CategoryController@storeEdit')->name('edit');
	Route::get('{category}/destroy', 'CategoryController@destroy')->name('destroy');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth' , 'as' => 'user.'], function() {
	Route::get('/', 'UserController@index')->name('index');
	Route::get('new', 'UserController@create')->name('create');
	Route::post('new', 'UserController@store')->name('create');
	Route::get('{category}/edit', 'UserController@edit')->name('edit');
	Route::post('{category}/edit', 'UserController@storeEdit')->name('edit');
	Route::get('{category}/destroy', 'UserController@destroy')->name('destroy');
});

Route::group(['prefix' => 'role', 'middleware' => 'auth' , 'as' => 'role.'], function() {
	Route::get('/', 'RoleController@index')->name('index');
	Route::get('new', 'RoleController@create')->name('create');
	Route::post('new', 'RoleController@store')->name('create');
	Route::get('{category}/edit', 'RoleController@edit')->name('edit');
	Route::post('{category}/edit', 'RoleController@storeEdit')->name('edit');
	Route::get('{category}/destroy', 'RoleController@destroy')->name('destroy');
});

Route::group(['prefix' => 'member', 'middleware' => 'auth' , 'as' => 'member.'], function() {
	Route::get('/', 'MemberController@index')->name('index');
	Route::get('new', 'MemberController@create')->name('create');
	Route::post('new', 'MemberController@store')->name('create');
	Route::get('{member}/edit', 'MemberController@edit')->name('edit');
	Route::post('{member}/edit', 'MemberController@storeEdit')->name('edit');
	Route::get('{member}/destroy', 'MemberController@destroy')->name('destroy');
	Route::get('{member}/forcedestroy', 'MemberController@forceDestroy')->name('forceDestroy');
	Route::get('{member}/restore', 'MemberController@restore')->name('restore');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth' , 'as' => 'user.'], function() {
	Route::get('/', 'UserController@index')->name('index');
	Route::get('new', 'UserController@create')->name('create');
	Route::post('new', 'UserController@store')->name('create');
	Route::get('{usera}/edit', 'UserController@edit')->name('edit');
	Route::post('{user}/edit', 'UserController@storeEdit')->name('edit');
	Route::get('{user}/destroy', 'UserController@delete')->name('destroy');
});

Route::group(['prefix' => 'ordering', 'as' => 'ordering.'], function() {
	//customer side
	Route::get('/', 'OrderingController@main')->name('main');
	Route::get('hello', 'OrderingController@jello')->name('hello');
	// Route::get('product', 'OrderingController@product')->name('product');
	Route::get('category', 'OrderingController@chooseCategory')->name('category');
	Route::get('csrf', 'OrderingController@csrf')->name('csrf');

	//kitchen side
	Route::get('kitchen', 'OrderingController@kitchen')->name('kitchen');
	Route::get('orders', 'OrderingController@orders')->name('orders');
	
});

Route::group(['prefix' => 'api', 'middleware' => 'guest'], function() {
   

});
Route::group(['prefix' => 'cashier', 'middleware' => 'auth' , 'as' => 'cashier.'], function() {
	Route::get('/', 'CashierController@index')->name('index');
	Route::get('{cashier}/pay', 'CashierController@pay')->name('pay');
});

Route::group(['prefix' => 'reservation', 'middleware' => 'auth' , 'as' => 'reservation.'], function() {
	Route::get('/', 'ReservationController@index')->name('index');
});