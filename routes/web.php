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
    return redirect()->route('home');
});

//Session Validation Not Required
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sign_in', 'SignInController@index')->name('signin');

Route::get('/sign_up', 'SignUpController@index')->name('signup');