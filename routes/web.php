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

Route::get('/', 'PostsController@index');
Route::resource('discussions','PostsController');

Route::get('user/register', 'UsersController@register');
Route::post('user/register', 'UsersController@store');
Route::get('user/login', 'UsersController@login')->name('login');
Route::post('user/login', 'UsersController@signin');

Route::get('/verify/{confirm_code}','UsersController@confirmEmail');

Route::get('/logout', 'UsersController@logout');