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
Route::get('products', 'ProductController@index');













Route::get('create', 'ProductController@index');



