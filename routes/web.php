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
    return redirect()->route('signin');
});

//Session Validation Not Required
Route::get('/sign_in', 'SignInController@index')->name('signin');
Route::post('/sign_in', 'SignInController@requestSignIn');

Route::get('/sign_up', 'SignUpController@index')->name('signup');
Route::post('/sign_up', 'SignUpController@requestSignUp');

//Session Validation Required
Route::get('/sign_out', 'SignInController@requestSignOut')->name('signout');

//Session(ADMIN) Validation Required
Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dash');
Route::get('/admin/dashboard/survey-results', 'AdminController@viewScore')->name('admin.score');

//Session(CONSUMER) Validation Required
Route::get('/consumer/dashboard', 'ConsumerController@index')->name('consumer.dash');

Route::get('/consumer/dashboard/take_quiz', 'ConsumerController@viewQuizModule')->name('consumer.quiz');
Route::post('/consumer/dashboard/take_quiz', 'ConsumerController@postQuizModule');

Route::get('/consumer/dashboard/scores', 'ConsumerController@viewScore')->name('consumer.score');
