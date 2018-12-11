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

Route::get('/email/verify/{token}', 'Auth\VerificationController@verify');
Route::get('/home', 'HomeController@index')->name('home');



// admin
Route::prefix('admin')->group(function () {
  Route::get('/', 'AdminController@index');
  Route::get('/verification/simposium', 'AdminController@verifSimposium')->name('verif.simposium');
  Route::get('/verification/simposium-acc', 'AdminController@verifSimposiumAcc')->name('verif.simposium.acc');
  Route::get('/verification/simposium-reject', 'AdminController@verifSimposiumReject')->name('verif.simposium.reject');

  Route::get('inamsc', 'InamscController@getInamsc');
  Route::get('inamsc/simposium', 'InamscController@getSymposium');
  Route::get('lombas/{id}', 'LombaController@findLomba');
  Route::put('lombas/{id}', 'LombaController@updateLomba');
  Route::get('payment/{type}/{id}', 'AdminController@getPayment');
});


// participant


Route::prefix('users')->group(function () {
  // pages
  Route::get('/', 'ParticipantController@index')->name('user.index');
  Route::get('/dashboard', 'ParticipantController@dashboard');


  // register cabang lomba
  Route::put('register', 'LombaController@store');
  Route::post('/', 'LombaController@resetCabang')->name('reset.cabang');

  // inamsc
  Route::get('inamsc/education-video', 'InamscController@registerVideoPublikasiPage');
  Route::get('inamsc/literature-review', 'InamscController@registerLiteratureReviewPage');
  Route::get('inamsc/simposium', 'InamscController@registerSymposiumPage');


  Route::post('inamsc/simposium', 'InamscController@registerSymposium');
  Route::post('inamsc/education-video', 'InamscController@registerVideoPublikasi')->name('register.video.publikasi');
  Route::post('inamsc/literature-review', 'InamscController@registerLiteratureReview')->name('register.literature.review');;
});
