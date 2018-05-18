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

Route::get('/','FontEndController@index');
Route::get('posts/{slug}', 'FontEndController@posts');

Auth::routes();
// Route::group(['prefix' => 'admin'], function() {
Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth:web')->group(function(){




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

Route::post('users/{slug}', 'UserController@manageUser');
});

// });

Route::post('posts/addCustom', 'FontEndController@addCustom');
Route::post('getColor', 'FontEndController@getColor');
Route::post('getSize', 'FontEndController@getSize');
Route::post('getColor-one', 'FontEndController@getColor_one');
Route::post('getSize-one', 'FontEndController@getSize_one');







Route::group(['prefix'=>'admin'], function() {
		/*
		*
		* manage login admin
		*@param  
		*@param  
		*@return 
		*/
	    Route::get('anyData', 'ProductController@anyData')->name('datatables.data');
        Route::get('products', 'ProductController@index');
        Route::get('product/plus/{id}', 'ProductController@plusData');
        Route::get('getProduct/{id}', 'ProductController@getProduct');
        Route::post('product/store', 'ProductController@store');
        Route::post('product/update', 'ProductController@updateProduct');
        Route::delete('product/{id}', 'ProductController@destroy');




		Route::get('login', 'Admin\AuthController@showLoginForm');
        Route::post('login', 'Admin\AuthController@login')->name('admin.login');
        Route::post('logout', 'Admin\AuthController@logout')->name('admin.logout');

        // Registration Routes...
        Route::get('register', 'Admin\AdminRegisterController@showRegistrationForm')->name('admin.register');
        Route::post('register', 'Admin\AdminRegisterController@register');

        // // Password Reset Routes...
        Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('password/reset', 'Admin\ResetPasswordController@reset');
    });