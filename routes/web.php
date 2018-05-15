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
    return view('font_end.index');
});

Auth::routes();
Route::group(['prefix' => 'admin'], function() {
   Route::post('logout',function(){

   })->name('admin.logout');
});
Route::get('/home', 'HomeController@index')->name('home');


Route::get('anyData', 'ProductController@anyData')->name('datatables.data');
Route::get('products', 'ProductController@index');
Route::get('getProduct/{id}', 'ProductController@getProduct');
Route::post('product/store', 'ProductController@store');
Route::post('product/update', 'ProductController@updateProduct');
Route::delete('product/{id}', 'ProductController@destroy');



Route::get('anyDataVendor', 'VendorController@anyData')->name('vendors.data');
Route::get('vendors', 'VendorController@index');
Route::post('vendor/store', 'VendorController@store');
Route::get('getVendor/{id}', 'VendorController@getVendor');
Route::delete('vendor/{id}', 'VendorController@destroy');
Route::post('vendor/update', 'VendorController@updatevendor');

Route::get('anyUser', 'UserController@anyData')->name('users.data');
Route::get('users', 'UserController@index');
Route::get('users/edit/{id}', 'UserController@getData');
Route::post('users/store', 'UserController@store');
Route::delete('users/{id}', 'UserController@destroy');
Route::post('users/update', 'UserController@updateUser');

Route::get('anyCategory', 'CategoryController@anyData')->name('categories.data');
Route::get('categories', 'CategoryController@index');
Route::get('categories/edit/{id}', 'CategoryController@getData');
Route::post('categories/store', 'CategoryController@store');
Route::delete('categories/{id}', 'CategoryController@destroy');
Route::post('categories/update', 'CategoryController@updateData');










Route::get('create', 'ProductController@index');



