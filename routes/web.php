<?php

use Carbon\Carbon;
use App\BatchSubmit;
use App\User;


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

Auth::routes();

Route::get('/', 'PagesController@index');

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/extraction', 'PagesController@extraction')->name('extraction');

//Route::get('/search', 'PagesController@search')->name('search');

Route::get('/admin', function(){

    $user = Auth::user();

    return view('admin.index', compact('user'));

});

/**
 * --------------------------------------------------------------------------
 * ELOQUENT CRUD
 * --------------------------------------------------------------------------
 */

//Route::post('/extraction', 'BatchInsertController@storeSubmit');

//Route::post('/extraction', 'BatchInsertController@storeBag');

Route::resource('admin/users', 'AdminUsersController');

Route::resource('batch', 'BatchController');
