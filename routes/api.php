<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/login', 'Api\\UserController@login');
Route::post('/register', 'Api\\UserController@register');
Route::get('/countries', 'Api\\CountryController@index');
Route::get('/top_tutors', 'Api\\TutorController@topTutors');
Route::get('/courses', 'Api\\CourseController@index');

Route::group(['middleware' => 'auth:api'], function () {
	Route::get('/logout', 'Api\\UserController@logout');
	Route::get('/profile', 'Api\\UserController@profile');
	Route::post('/update_profile', 'Api\\UserController@updateProfile');

    /*Route::get('/refresh_token', 'Api\\UserController@refreshToken');
	Route::post('/forgot_password', 'Api\\UserController@forgotPassword');
	Route::post('/reset_password', 'Api\\UserController@resetPassword');
	Route::post('/change_password', 'Api\\UserController@changePassword');*/

    Route::get('/tutors', 'Api\\TutorController@tutors');
    Route::get('/tutor/{id}', 'Api\\TutorController@tutor');
    Route::get('/favorite_tutors', 'Api\\TutorController@favorites');
});
