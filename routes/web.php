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

//Session Validation Not Required
Route::get('/', function () {
    return redirect()->route('signin');
});

Route::get('/sign_in', 'SignInController@index')->name('signin');
Route::get('/sign_in/validate', 'SignInController@checkLoggedInUser')->name('signin.justify');
Route::post('/sign_in', 'SignInController@requestSignIn');

Route::get('/sign_up', 'SignUpController@index')->name('signup');
Route::post('/sign_up', 'SignUpController@requestSignUp');

//Has Session Validation
Route::middleware(['SESSION'])->group(function()
{
    Route::get('/sign_out', 'CommonController@requestSignOut')->name('signout');

    //ADMIN Session Validation
    Route::group(['middleware'=>['ADMIN']],function()
    {
      Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dash');
      Route::get('/admin/dashboard/survey-results', 'AdminController@viewScore')->name('admin.score');
    });

    //MANAGER Session Validation
    Route::group(['middleware'=>['CONSUMER']],function()
    {
      Route::get('/consumer/dashboard', 'ConsumerController@index')->name('consumer.dash');

      Route::get('/consumer/dashboard/take_quiz', 'ConsumerController@viewQuizModule')->name('consumer.quiz');
      Route::post('/consumer/dashboard/take_quiz', 'ConsumerController@postQuizModule');

      Route::get('/consumer/dashboard/scores', 'ConsumerController@viewScore')->name('consumer.score');
    });
});
