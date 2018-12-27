<?php

use Carbon\Carbon;
use App\BatchSubmit;
use App\User;
use App\ImportData;
use App\BatchBag;

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



/**
 * --------------------------------------------------------------------------
 * ELOQUENT CRUD
 * --------------------------------------------------------------------------
 */

//Route::post('/extraction', 'BatchInsertController@storeSubmit');

//Route::post('/extraction', 'BatchInsertController@storeBag');

Route::middleware(['auth'])->group(function () {

    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('batch', 'BatchController');
    Route::get('/admin/import', 'ImportCsvController@getImport')->name('import');
    Route::post('/admin/import_parse', 'ImportCsvController@parseImport')->name('import_parse');
    Route::post('/admin/import_process', 'ImportCsvController@processImport')->name('import_process');
    Route::get('/admin', function(){
        $user = Auth::user();
        return view('admin.index', compact('user'));
    });
    Route::get('/admin/edit', 'ExportsController@exportView');
});
