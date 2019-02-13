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

Route::group(['middleware' => ['auth']], function()
{
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('ajax-get-page-content', 'HomeController@loadPageContent');
    Route::get('ajax-get-user-form', 'UserController@show');
    Route::get('ajax-get-department-form', 'DepartmentController@show');
    Route::get('ajax-get-division-form', 'DivisionController@show');
    Route::get('ajax-get-country-form', 'CountryController@show');
    Route::get('ajax-get-state-form', 'StateController@show');
    Route::get('ajax-get-city-form', 'CityController@show');
    
    Route::resource('users', 'UserController')->only(['store']);
    Route::post('ajax-update-user', 'UserController@update');
    Route::get('ajax-delete-user/{id}', 'UserController@destroy');

    Route::resource('departments', 'DepartmentController')->only(['store']);
    Route::resource('divisions', 'DivisionController')->only(['store']);
    Route::resource('countries', 'CountryController')->only(['store']);
    Route::resource('states', 'StateController')->only(['store']);
    Route::resource('cities', 'CityController')->only(['store']);

});
