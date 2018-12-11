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
});


// participant


Route::prefix('users')->group(function () {
  // pages
  Route::get('/', 'ParticipantController@index');

  // register cabang lomba
  Route::put('register', 'LombaController@store');

  // inamsc
  Route::get('inamsc/simposium', 'InamscController@registerSymposiumPage');
  Route::post('inamsc/simposium', 'InamscController@registerSymposium');

  Route::post('inamsc/video-publikasi', 'InamscController@registerVideoPublikasi')->name('register.video.publikasi');;
});

// get inamsc page
Route::prefix('inamsc')->group(function () {
  Route::get('/video-publikasi', 'InamscController@videoPublikasi');
  Route::get('/literature-review', 'InamscController@literatureReview');
});
