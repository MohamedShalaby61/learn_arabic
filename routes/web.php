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


Route::get('test22', function () {
//    $thisDate=date('Y-m-d',strtotime('2019-8-18'));
//    $times=\App\Models\TutorTime::where(['tutor_id'=>17,'status'=>1,'date'=>$thisDate])->get();
//    dd($times);
//    return view('all-mentors');
});
Auth::routes();

Route::get('setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
});

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/courses', 'HomeController@courses')->name('courses');
Route::get('/course/{id}', 'HomeController@courseDetails')->name('courseDetails');
Route::get('/lesson/{id}', 'HomeController@courseLesson')->name('courseLesson');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact_submit', 'HomeController@contactSubmit')->name('contactSubmit');

Route::get('/student/subscribe', 'StudentController@subscribe')->name('student.subscribe');
Route::get('/student/subscribe_course/{id}', 'StudentController@subscribe_course')->name('student.subscribe_course');
Route::get('/student/subscribe_course_confirmation/{id}', 'StudentController@subscribe_course_confirmation')->name('student.subscribe_course_confirmation');

Route::get('/test', 'MeetingController@test')->name('test');

Route::get('/tutor/register', 'TutorController@register')->name('tutor.register');
Route::post('/tutor/register', 'TutorController@register')->name('tutor.register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/students', 'HomeController@students')->name('students');
    Route::get('/progress', 'HomeController@progress')->name('progress');
//    Route::get('/attendence-record', 'HomeController@attendence')->name('attendence');
    Route::get('/schedule', 'HomeController@schedule')->name('schedule');
    Route::get('/student/schedule', 'HomeController@studentSchedule');
    Route::get('/calls', 'HomeController@calls')->name('calls');

    Route::get('/tutor/calls', 'TutorController@calls')->name('tutorCalls');
    Route::get('/tutor/{id}/call', 'MeetingController@callTutor')->name('callTutor');
    Route::get('/tutor/accept_call/{studentId}', 'MeetingController@acceptCall')->name('acceptCall');
    Route::get('/tutor/profile', 'TutorController@profile')->name('tutor.profile');
    Route::put('/tutor/profile', 'TutorController@profile')->name('tutor.profile_save');
    Route::get('/tutor/availability', 'TutorController@availability')->name('tutor.availability');
    Route::post('/tutor/availability', 'TutorController@postAvailability');
    Route::get('/getTutorTime/{date}/{tutor}', 'TutorController@getTutorTime');
    Route::post('/book/time', 'TutorController@bookTime');
    Route::get('/tutor/time', 'TutorController@allTutorTimes');
    Route::get('/tutor/time/{tutor}', 'TutorController@thisTutorTime');
    Route::get('/cancel/time/{time}', 'TutorController@cancelTime');
    Route::get('/cancel/student/time/{time}', 'TutorController@cancelStudentTime');
    Route::get('/student/time', 'TutorController@allStudentTimes');
    Route::get('tutor/student', 'TutorController@tutorStudent');


    Route::get('/student/profile', 'StudentController@profile')->name('student.profile');
    Route::put('/student/profile', 'StudentController@profile')->name('student.profile_save');
    Route::get('/student/enrolled', 'StudentController@enrolled')->name('student.enrolled');
    Route::get('/student/enroll_course/{id}', 'StudentController@enrollCourse')->name('student.enroll_course');
    Route::post('/student/like_tutor', 'StudentController@likeTutor')->name('student.like_tutor');
	
	Route::get('/student/payment/{months}/{days}/{minutes}', 'StudentController@payment')->name('student.payment');
});

Route::get('/tutor/{id}', 'HomeController@tutorProfile')->name('tutorProfile');