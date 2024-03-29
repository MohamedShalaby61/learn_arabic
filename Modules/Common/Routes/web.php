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
    Route::group(['middleware' => 'admin'],function (){
        Route::get('/home', 'CommonController@index')->name('admin_home');
        Route::get('logout','CommonController@logout')->name('get_logout');
    });
    Route::get('login','CommonController@get_login')->name('get_login');
    Route::post('login','CommonController@post_login')->name('post_login');
});

Route::get('locale/{locale}',function ($locale){
    if (session()->has('lang')){
        session()->forget('lang');
        session()->put('lang',$locale);
    }else{
        session()->put('lang',$locale);
    }

    return back();
})->name('locale');