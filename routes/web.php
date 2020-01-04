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

Route::get('user/profile', 'UserProfileController@showProfile')->name('user/profile')->middleware('auth');

Route::get('user/profile/edit', 'UserProfileController@showProfileEdit')->name('user/profile/edit')->middleware('auth');

Route::get('user/profile/add-address', 'UserProfileController@showAddAddressForm')->name('user/profile/add-address')->middleware('auth','no.address');

Route::post('user/profile/add-address', 'UserProfileController@AddAddress')->name('user/profile/add-address')->middleware('auth');
