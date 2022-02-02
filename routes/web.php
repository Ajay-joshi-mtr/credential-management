<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/userlist','UserController@userlist');

Auth::routes(['verify'=>true,'register'=>false]);

// users
Route::group(['middleware' => ['auth:web'],/* 'as' => 'admin.'*/], function () {

Route::resource('user', 'UserController');
Route::get('user/restore/{id}', 'UserController@restore');
Route::resource('category', 'CategoryController');
Route::resource('credential', 'CredentialController');

Route::resource('profile', 'ProfileController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile/change_password/{id}', 'ProfileController@change_password');
Route::put('profile/update_password/{id}', 'ProfileController@update_password');

});



