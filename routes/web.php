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

Auth::routes();
Route::post('login', 'Auth\LoginController@doLogin');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email/verify/{token}', 'Auth\RegisterController@verify');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index');


// admin
Route::prefix('admin')->group(function () {
  Route::get('inamsc', 'InamscController@getInamsc');
  Route::get('inamsc/simposium', 'InamscController@getSymposium');
  Route::get('lombas/{id}', 'LombaController@findLomba');
  Route::put('lombas/{id}', 'LombaController@updateLomba');
});


// participant


Route::prefix('users')->group(function () {
  // pages
  Route::get('/', 'ParticipantController@index');
  Route::get('/dashboard', 'ParticipantController@dashboard');


  // register cabang lomba
  Route::put('register', 'LombaController@store');

  // inamsc
  Route::get('inamsc/video-publikasi', 'InamscController@registerVideoPublikasiPage');
  Route::get('inamsc/literature-review', 'InamscController@registerLiteratureReviewPage');
  Route::get('inamsc/simposium', 'InamscController@registerSymposiumPage');


  Route::post('inamsc/simposium', 'InamscController@registerSymposium');
  Route::post('inamsc/video-publikasi', 'InamscController@registerVideoPublikasi')->name('register.video.publikasi');
  Route::post('inamsc/literature-review', 'InamscController@registerLiteratureReview')->name('register.literature.review');;
});
