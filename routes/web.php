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
    return view('welcome');
});

Auth::routes();

// Halaman Frontend
Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'home'], function(){
        Route::get('', 'HomeController@index')->name('home');
        // Monitoring
        Route::get('/monitoring', 'ReportController@monitoring')->name('monitoring');
        Route::post('/simpan-monitoring', 'ReportController@simpan_monitoring')->name('simpan_monitoring');
    });
});

