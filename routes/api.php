<?php

use Illuminate\Http\Request;
use App\BatchBag;
use App\ImportData;
use App\BatchSubmit;
use App\User;
//use Doorman;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



/**
 * Reporting API Endpoints
 */
/* Route::get('/bag_stats', 'ApiEndpointController@bagStats');
Route::get('/disparity_data', 'ApiEndpointController@disparityData');
Route::get('/stuffed_batches', 'ApiEndpointController@stuffedBatches'); */



/**
 * Dashboard API Endpoints
 */
Route::get('/dash_stats', function () {
    return BatchBag::count();
});

/**
 * FORM/REPORT Endpoints
 */
Route::get('/bag_stats', function() {
    return BatchBag::all();
});
Route::get('/disparity_data', function () {
    $data = ImportData::has('bagMatch')->with('bagMatch')->get();
    return $data;
});
Route::get('/stuffed_batches', function () {
    $data = BatchSubmit::where('status', 'Stuffed')->get();
    return $data;
});
Route::get('/all_users', function() {
    return User::all();
});
Route::get('/imported', function() {
    $data = ImportData::doesntHave('bagMatch')->get();
    return $data;
});
Route::get('/invites', function() {
    $invites = DB::table('invites')->where('uses', '=', 0)->get();
    return $invites;
});