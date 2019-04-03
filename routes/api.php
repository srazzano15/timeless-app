<?php

use Illuminate\Http\Request;
use App\BatchBag;
use App\ImportData;
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
Route::get('/bag_stats', function() {
    return BatchBag::all();
});

Route::get('/disparity_data', function () {

    $data = ImportData::has('bagMatch')->with('bagMatch')->get();

    return $data;
});

/**
 * Dashboard API Endpoints
 */
Route::get('/dash_stats', function () {
    return BatchBag::count();
});
