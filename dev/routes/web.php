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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setDRT/{minutes}', [
    'as' => 'constants.set.refresh_time',
    'uses' => 'ConstantsController@setDataRefreshTime',
]);

Route::get('/list', [
    'as' => 'list',
    'uses' => 'CountriesController@getList',
]);

Route::get('/list/{name}', [
    'as' => 'list.country',
    'uses' => 'CountriesController@getCountry',
]);

Route::get('/getDRT', [
    'as' => 'constants.get.refresh_time',
    'uses' => 'ConstantsController@getDataRefreshTime',
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
