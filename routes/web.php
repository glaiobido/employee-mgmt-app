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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('ajax-get-page-content', 'HomeController@loadPageContent');
Route::get('ajax-get-user-form', 'UserController@show');

Route::resource('users', 'UserController')->only(['store']);
Route::post('ajax-update-user', 'UserController@update');
Route::get('ajax-delete-user/{id}', 'UserController@destroy');
