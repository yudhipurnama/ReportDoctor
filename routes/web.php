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
        Route::get('/morning-report', 'ReportController@morningReport')->name('morningReport');
        Route::post('/simpan-morning-report', 'ReportController@simpan_morningReport')->name('simpan_morningReport');
    });
});

