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

//Route::get('/', 'PagesController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', 'BatchInsertController@show');


Route::get('/extraction', 'PagesController@extraction');

Route::get('/search', 'PagesController@search');

/**
 * --------------------------------------------------------------------------
 * Database CRUD routes
 * --------------------------------------------------------------------------
 */

  /* Route::get('/extraction', function () {

    DB::insert('insert into batch_submit(batch_id, date_filled, cooler, date_run) values (?, ?, ?, ? )', ['mka-002', '2018-12-01', 1, '2018-12-01']);

 }); */
   // Route::post('/extraction', 'PostsController');


