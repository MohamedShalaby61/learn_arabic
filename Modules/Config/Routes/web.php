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


Route::group(['prefix'=>'admin-panel','middleware'=>'lang'],function() {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('configs', 'ConfigController@edit')->name('configs.index');
        Route::post('configs', 'ConfigController@update')->name('configs.update');
    });
});
