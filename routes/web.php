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
Route::prefix('admin')->middleware(['admin_only'])->group(function () {
  Route::get('/', 'AdminController@index')->name('admin.index');

  //verifikasi simposium
  Route::get('/verification/simposium', 'AdminController@verifSimposium')->name('verif.simposium');
  Route::get('/verification/simposium-acc', 'AdminController@verifSimposiumAcc')->name('verif.simposium.acc');
  Route::get('/verification/simposium-reject', 'AdminController@verifSimposiumReject')->name('verif.simposium.reject');

  Route::post('/verification/simposium-acc', 'AdminController@simposiumAcc')->name('verifikasi.simposium.acc');
  Route::post('/verification/simposium-reject', 'AdminController@simposiumReject')->name('verifikasi.simposium.reject');


  //verifikasi edukasi
  Route::get('/verification/edukasi', 'AdminController@verifEdukasi')->name('verif.edukasi');
  Route::get('/verification/edukasi-acc', 'AdminController@verifEdukasiAcc')->name('verif.edukasi.acc');
  Route::get('/verification/edukasi-reject', 'AdminController@verifEdukasiReject')->name('verif.edukasi.reject');

  Route::post('/verification/edukasi-acc', 'AdminController@edukasiAcc')->name('verifikasi.edukasi.acc');
  Route::post('/verification/edukasi-reject', 'AdminController@edukasiReject')->name('verifikasi.edukasi.reject');


  //verifikasi literaure
  Route::get('/verification/literature', 'AdminController@verifLiterature')->name('verif.literature');
  Route::get('/verification/literature-acc', 'AdminController@verifLiteratureAcc')->name('verif.literature.acc');
  Route::get('/verification/literature-reject', 'AdminController@verifLiteratureReject')->name('verif.literature.reject');

  Route::post('/verification/literature-acc', 'AdminController@literatureAcc')->name('verifikasi.literature.acc');
  Route::post('/verification/literature-reject', 'AdminController@literatureReject')->name('verifikasi.literature.reject');


  Route::get('/view/image/{type}/{id}', 'AdminController@viewUploadedFile');
  Route::get('inamsc', 'InamscController@getInamsc');
  Route::get('inamsc/simposium', 'InamscController@getSymposium');
  Route::get('lombas/{id}', 'LombaController@findLomba');
  Route::put('lombas/{id}', 'LombaController@updateLomba');
  Route::get('payment/{type}/{id}', 'AdminController@getPayment');
  Route::get('file/{type}/{id}', 'AdminController@getFile');
});


// participant


Route::prefix('users')->middleware(['participant_only'])->group(function () {
  // pages
  Route::get('/', 'ParticipantController@index')->name('user.index');
  Route::get('/dashboard', 'ParticipantController@dashboard');


  // register cabang lomba
  Route::put('register', 'LombaController@store');


  // this middleware is to make sure user doesnt execute routes while he hasnt
  // chose a cabang
  Route::middleware(['has_chose_cabang'])->group(function () {

    Route::post('/', 'LombaController@resetCabang')->name('reset.cabang');

    Route::middleware(['has_chose_cabang_spesifik'])->group(function () {
      // inamsc
      Route::get('inamsc/simposium', 'InamscController@registerSymposiumPage');
      Route::get('inamsc/education-video', 'InamscController@registerVideoPublikasiPage');
      Route::get('inamsc/literature-review', 'InamscController@registerLiteratureReviewPage');


      Route::post('inamsc/simposium', 'InamscController@registerSymposium');
      Route::post('inamsc/education-video', 'InamscController@registerVideoPublikasi')->name('register.video.publikasi');
      Route::post('inamsc/literature-review', 'InamscController@registerLiteratureReview')->name('register.literature.review');

      //imarc
      Route::get('imarc', 'ImarcController@registerImarcPage');
      Route::post('imarc', 'ImarcController@registerImarc')->name('register.imarc');

      //imsso
      Route::get('imsso', 'ImssoController@registerImssoPage');
      Route::post('imsso', 'ImssoController@registerImsso')->name('register.imsso');

    });

    Route::middleware(['has_verified_by_admin'])->group(function () {
      Route::get('upload/karya', 'ParticipantController@uploadKarya')->name('users.upload.karya');
    });

  });

  //lombanya telah disetujui

});
