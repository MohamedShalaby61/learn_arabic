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
        Route::get('lessons/{id}','LessonController@index')->name('lessons.index');

        Route::get('lessons/create/{id}','LessonController@create')->name('lessons.create');
        Route::post('lesson/store','LessonController@store')->name('lessons.store');

        Route::get('lessons/{id}/edit','LessonController@edit')->name('lessons.edit');
        Route::put('lessons/{id}/edit','LessonController@update')->name('lessons.update');

        Route::delete('lessons/delete/{id}','LessonController@destroy')->name('lessons.destroy');
    });
});