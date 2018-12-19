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
  Route::get('/verification/simposium', 'AdminController@verifSimposiumPage')->name('verif.simposium');

  Route::get('inamsc/simposium/{id}', 'InamscController@findSimposium');
  Route::put('inamsc/simposium/accept/{id}', 'InamscController@acceptSymposium');
  Route::put('inamsc/simposium/decline/{id}', 'InamscController@declineSymposium');

  //verifikasi edukasi
  Route::get('/verification/edukasi', 'AdminController@verifEdukasiPage')->name('verif.edukasi');

  Route::get('inamsc/education-video', 'InamscController@getEducationvideo');
  Route::get('inamsc/education-video/{id}', 'InamscController@findEducationVideoDetails');

  Route::put('inamsc/education-video/accept/{id}', 'InamscController@acceptEducationVideo');
  Route::put('inamsc/education-video/decline/{id}', 'InamscController@declineEducationVideo');

  //verifikasi literaure
  Route::get('/verification/literature', 'AdminController@verifLiteraturePage')->name('verif.literature');
  Route::get('inamsc/literature-review', 'InamscController@getLiteratureReview');
  Route::get('inamsc/literature-review/{id}', 'InamscController@findLiteratureReviewDetails');

  Route::put('inamsc/literature-review/accept/{id}', 'InamscController@acceptLiteratureReview');
  Route::put('inamsc/literature-review/decline/{id}', 'InamscController@declineLiteratureReview');



  Route::get('/view/image/{type}/{id}', 'AdminController@viewUploadedFile');
  Route::get('inamsc', 'InamscController@getInamsc');
  Route::get('inamsc/simposium', 'InamscController@getSymposium');
  Route::get('lombas/{id}', 'LombaController@findLomba');
  Route::put('lombas/{id}', 'LombaController@updateLomba');
  Route::get('payment/{type}/{id}', 'AdminController@getPayment');
  Route::get('inamsc/file/{id}', 'AdminController@getInamscFiles');
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


      //hfgm
      Route::get('hfgm/campaign', 'HfgmController@registerCampaignPage');
      Route::get('hfgm/concert', 'HfgmController@registerConcertPage');

      Route::post('hfgm/campaign', 'HfgmController@registerCampaign')->name('register.campaign');
      Route::post('hfgm/concert', 'HfgmController@registerConcert')->name('register.concert');

    });
    // needs to be verified by admin before allowed here
    Route::middleware(['has_verified_by_admin'])->group(function () {
      Route::get('uploads', 'ParticipantController@uploadKarya')->name('users.upload.karya');
      Route::get('participants', 'ParticipantController@getParticipants');

    });

  });

  //lombanya telah disetujui

});
