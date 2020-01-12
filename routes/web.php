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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/questions', function(){
    return view('questions');
})->name('questions');

Route::get('/user/profile', 'UserProfileController@showProfile')->name('user/profile')->middleware('auth');
Route::get('/user/profile/edit', 'UserProfileController@showProfileEdit')->name('user/profile/edit')->middleware('auth');
Route::post('/user/profile/edit', 'UserUpdateController@updateUserInfo')->name('user/profile/edit')->middleware('auth');
Route::get('/user/profile/add-address', 'UserProfileController@showAddAddressForm')->name('user/profile/add-address')->middleware('auth','no.address');
Route::post('/user/profile/add-address', 'UserProfileController@AddAddress')->name('user/profile/add-address')->middleware('auth');

Route::get('/admin', 'AdminController@showDashBoard')->name('admin')->middleware('auth','admin');
Route::get('/admin/edit-product/{product}', 'ProductController@showEditForm')->name('product.edit')->middleware('auth','admin');
Route::post('/admin/edit-product/{product}', 'ProductController@update')->middleware('auth','admin');

Route::get('/products', 'ProductController@index')->name('products');
Route::delete('/products', 'ProductController@delete');
Route::get('/products/{product}', 'ProductController@show')->name('product.show');
Route::post('/products', 'ProductController@store');
Route::post('/products/add-to-cart', 'CartController@addProduct')->name('products.add-to-cart')->middleware('auth');
Route::post('/products/remove-from-cart', 'CartController@removeProduct')->name('products.remove-from-cart')->middleware('auth');
Route::post('buy-cart', 'CartController@buyCart')->middleware('auth');
