<?php

use Carbon\Carbon;
use App\BatchSubmit;



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



Route::get('/', 'PagesController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/extraction', 'PagesController@extraction')->name('extraction');

Route::get('/search', 'PagesController@search')->name('search');

Auth::routes();

/**
 * --------------------------------------------------------------------------
 * ELOQUENT CRUD
 * --------------------------------------------------------------------------
 */

Route::post('/extraction', 'BatchInsertController@storeSubmit');

//Route::post('/extraction', 'BatchInsertController@storeBag');

Route::get('/home', 'BatchReadController@tableRead');




