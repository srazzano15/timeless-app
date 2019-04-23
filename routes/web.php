<?php

use Carbon\Carbon;
use App\BatchSubmit;
use App\User;
use App\ImportData;
use App\BatchBag;
use Illuminate\Support\Facades\Request;
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

    Route::get('/admin', 'PagesController@admin')->name('admin');
    

    Route::get('/admin/submit_bags', 'SingleBagsInsertController@index')->name('admin_submit_bags');
    Route::post('/admin/processing_bags', 'SingleBagsInsertController@store')->name('admin_bags_processing');

    Route::resource('submit', 'AdminBatchInsertController');

    /**
     * IMPORTING / EXPORTING ROUTES
     */
    /* Route::get('export', 'ImportExportController@export')->name('export'); */
    Route::get('import_csv', 'ImportExportController@getImport')->name('import_csv');
    Route::post('import', 'ImportExportController@import')->name('import');
    Route::get('/admin/edit', 'ExportsController@exportView')->name('batch_report');
    Route::get('/admin/edit/download', 'ExportsController@export')->name('report_download');

    // REPORTS ROUTES
    Route::get('/reports/bags_submitted', 'PagesController@bagStats')->name('report_bags_submitted');



    /**
     * Testing Routes
     */
/*         Route::get('/test_form', function() {
        $user = Auth::user();
        return view('admin.test', compact('user'));
    }); */
    /* Route::post('/test_post', function(Request $request) {
        $data = $request->get();
        dd($data);
    })->name('test_post'); */

    Route::put('/manipulate_data', function() {
        $arr = BatchBag::all();
        foreach ($arr as $i)
        {
            $p_id = $i->package_id;
            $p_id = str_replace('timeless', 'Timeless', $p_id);
            $p_id = str_replace('trim', 'Trim', $p_id);
            $p_id = str_replace('--', '-', $p_id);
            $p_id = str_replace(' ', '', $p_id);
            $i->save();
        }

    });


    /**
     * RETIRED ROUTES
     */
    /*Route::get('/admin/import', 'ImportCsvController@getImport')->name('import');
    Route::post('/admin/import_parse', 'ImportCsvController@parseImport')->name('import_parse');
    Route::post('/admin/import_process', 'ImportCsvController@processImport')->name('import_process'); */




});
