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

Route::get('/', 'PagesController@index');
Route::get('inamsc', 'PagesController@inamsc');
Route::get('imarc', 'PagesController@imarc');
Route::get('imsso', 'PagesController@imsso');
Route::get('hfgm', 'PagesController@hfgm');
Route::get('social-programme', 'PagesController@inamscSocialProgramme');
Route::get('gallery', 'PagesController@gallery');


Route::get('/email/verify/{token}', 'Auth\VerificationController@verify');
Route::get('inamsc/guidelines', 'InamscController@downloadGuidelines');

// admin
Route::prefix('admin')->middleware(['admin_only'])->group(function () {
  Route::get('/', 'AdminController@index')->name('admin.index');

  //verifikasi symposium
  Route::get('/verification/symposium', 'AdminController@verifsymposiumPage')->name('verif.symposium');

  Route::get('inamsc/symposium/{id}', 'InamscController@findsymposium');
  Route::put('inamsc/symposium/accept/{id}', 'InamscController@acceptSymposium');
  Route::put('inamsc/symposium/decline/{id}', 'InamscController@declineSymposium');

  //verifikasi edukasi
  Route::get('/verification/edukasi', 'AdminController@verifEdukasiPage')->name('verif.edukasi');
  Route::get('inamsc/education-video', 'InamscController@getEducationvideo');
  Route::get('inamsc/education-video/{id}', 'InamscController@findEducationVideoDetails');

  Route::put('inamsc/education-video/accept/{id}', 'InamscController@acceptEducationVideo');
  Route::put('inamsc/education-video/decline/{id}', 'InamscController@declineEducationVideo');


  //verifikasi poster
  Route::get('/verification/publication', 'AdminController@verifPublicationPosterPage')->name('verif.publication');
  Route::get('inamsc/publication-poster', 'InamscController@getPublicationPoster');
  Route::get('inamsc/publication-poster/{id}', 'InamscController@findPublicationPosterDetails');

  Route::put('inamsc/publication-poster/accept/{id}', 'InamscController@acceptPublicationPoster');
  Route::put('inamsc/publication-poster/decline/{id}', 'InamscController@declinePublicationPoster');


  //verifikasi literature
  Route::get('/verification/literature', 'AdminController@verifLiteraturePage')->name('verif.literature');
  Route::get('inamsc/literature-review', 'InamscController@getLiteratureReview');
  Route::get('inamsc/literature-review/{id}', 'InamscController@findLiteratureReviewDetails');

  Route::put('inamsc/literature-review/accept/{id}', 'InamscController@acceptLiteratureReview');
  Route::put('inamsc/literature-review/decline/{id}', 'InamscController@declineLiteratureReview');

  //verifikasi research
  Route::get('/verification/research', 'AdminController@verifResearchPage')->name('verif.research');
  Route::get('inamsc/research-poster', 'InamscController@getResearch');
  Route::get('inamsc/research-poster/{id}', 'InamscController@findResearchDetails');

  Route::put('inamsc/research-poster/accept/{id}', 'InamscController@acceptResearch');
  Route::put('inamsc/research-poster/decline/{id}', 'InamscController@declineResearch');


  //verifikasi imarc
  Route::get('/verification/photography', 'AdminController@verifImarcPhotographyPage')->name('verif.photography');
  Route::get('/verification/dance', 'AdminController@verifImarcDancePage')->name('verif.traditional.dance');
  Route::get('/verification/vocal-group', 'AdminController@verifImarcVocalPage')->name('verif.vocal-group');
  Route::get('/verification/band', 'AdminController@verifImarcBandPage')->name('verif.band');

  Route::get('imarc/photography', 'ImarcController@getPhotography');
  Route::get('imarc/dance', 'ImarcController@getDance');
  Route::get('imarc/vocal', 'ImarcController@getVocal');
  Route::get('imarc/band', 'ImarcController@getBand');
  Route::get('imarc/imarc/{id}', 'ImarcController@findImarcDetails');
  

  Route::put('imarc/imarc/accept/{id}', 'ImarcController@acceptImarc');
  Route::put('imarc/imarc/decline/{id}', 'ImarcController@declineImarc');


  //verifikasi imsso
  Route::get('/verification/men-basketball', 'AdminController@verifImssoMenBasketballPage')->name('verif.men.basketball');
  Route::get('/verification/women-basketball', 'AdminController@verifImssoWomenBasketballPage')->name('verif.women.basketball');
  Route::get('/verification/men-futsal', 'AdminController@verifImssoMenFutsalPage')->name('verif.men.futsal');

  Route::get('imsso/men-basketball', 'ImssoController@getMenBasketball');
  Route::get('imsso/women-basketball', 'ImssoController@getWomenBasketball');
  Route::get('imsso/men-futsal', 'ImssoController@getMenFutsal');
  Route::get('imsso/imsso/{id}', 'ImssoController@findImssoDetails');

  Route::put('imsso/imsso/accept/{id}', 'ImssoController@acceptImsso');
  Route::put('imsso/imsso/decline/{id}', 'ImssoController@declineImsso');


  Route::get('/view/symposium/image/{type}/{id}', 'AdminController@viewUploadedFilesymposium');
  Route::get('/view/image/{type}/{id}', 'AdminController@viewUploadedEducationAndLitrev');


  Route::get('inamsc', 'InamscController@getInamsc');
  Route::get('inamsc/symposium', 'InamscController@getSymposium');
  Route::get('lombas/{id}', 'LombaController@findLomba');
  Route::put('lombas/{id}', 'LombaController@updateLomba');
  Route::get('payment/{type}/{id}', 'AdminController@getPayment');

  Route::get('inamsc/file/{id}', 'AdminController@getInamscFiles');
  Route::get('imarc/file/{id}', 'AdminController@getImarcFiles');
  Route::get('imsso/file/{id}', 'AdminController@getImssoFiles');

  Route::get('inamscs/{type}', 'InamscController@getInamscSubmissions');
  Route::get('imarcs/{type}', 'ImarcController@getImarcSubmissions');

  Route::get('inamsc/submissions/{id}', 'InamscController@findInamscSubmissions');
  Route::get('imarc/submissions/{id}', 'ImarcController@findImarcSubmissions');

  Route::get('inamscs/submissions/educational-videos', 'AdminController@submissionsEducationalVideosPage');
  Route::get('letter-of-originality/{id}', 'InamscController@downloadLetterOfOriginality');

  Route::get('inamscs/submissions/literature-review', 'AdminController@literatureReviewPage');
  Route::get('inamscs/submissions/research-paper', 'AdminController@rppPage');
  Route::get('inamscs/submissions/public-poster', 'AdminController@publicPosterPage');

  Route::get('imarcs/submissions/photography', 'AdminController@photographyPage');

  
  Route::get('inamscs/{id}/download/submissions', 'InamscController@downloadSubmissions');
  Route::get('imarcs/{id}/download/submissions', 'ImarcController@downloadSubmissions');

  Route::get('account', 'AdminController@getAccountPage');
  Route::get('account/data', 'AdminController@getAccount');
  Route::get('account/data/{id}', 'AdminController@getAccountSingle');
  Route::put('account/accept/{id}', 'AdminController@acceptAccount');
});



      Route::get('users/inamsc/literature-review/files', 'InamscController@downloadLitrevFiles');



// participant



Route::prefix('users')->middleware(['participant_only'])->group(function () {
  // error route
  Route::get('error/37585526-1ef0-43fb-b41b-d9995f6f90b1', 'InamscController@registrationUnsuccessfull')->name('regis.error');

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
      Route::middleware(['inamsc_symposium_has_enough_quota'])->group(function () {
        Route::get('inamsc/symposium', 'InamscController@registerSymposiumPage');
        Route::post('inamsc/symposium', 'InamscController@registerSymposium');
      });

      Route::middleware(['inamsc_video_has_enough_quota'])->group(function () {
        Route::get('inamsc/education-video', 'InamscController@registerVideoPublikasiPage');
        Route::post('inamsc/education-video', 'InamscController@registerVideoPublikasi')->name('register.video.publikasi');
      });

      Route::middleware(['inamsc_publication_has_enough_quota'])->group(function () {
        Route::get('inamsc/poster-publication', 'InamscController@registerPosterPublicationPage');
        Route::post('inamsc/poster-publication', 'InamscController@registerPosterPublication')->name('register.poster.publication');

      });

      Route::middleware(['inamsc_literature_has_enough_quota'])->group(function () {
        Route::get('inamsc/literature-review', 'InamscController@registerLiteratureReviewPage');
        Route::post('inamsc/literature-review', 'InamscController@registerLiteratureReview')->name('register.literature.review');
      });

      Route::middleware(['inamsc_research_has_enough_quota'])->group(function () {
        Route::get('inamsc/research-paper', 'InamscController@registerResearchPosterPage');
        Route::post('inamsc/research-paper', 'InamscController@registerResearchPoster')->name('register.research.poster');

      });


      Route::get('inamsc/files', 'InamscController@downloadTemplates');

      //imarc
      Route::get('imarc/photography', 'ImarcController@registerImarcPhotographyPage');
      Route::post('imarc/photography', 'ImarcController@registerImarcPhotography')->name('register.imarc.photography');

      Route::get('imarc/traditional-dance', 'ImarcController@registerImarcDancePage');
      Route::post('imarc/traditional-dance', 'ImarcController@registerImarcDance')->name('register.imarc.traditional.dance');

      Route::get('imarc/vocal-group', 'ImarcController@registerImarcVocalPage');
      Route::post('imarc/vocal-group', 'ImarcController@registerImarcVocal')->name('register.imarc.vocal.group');

      Route::get('imarc/band', 'ImarcController@registerImarcBandPage');
      Route::post('imarc/band', 'ImarcController@registerImarcBand')->name('register.imarc.band');

      //imsso
      Route::get('imsso/men-basketball', 'ImssoController@registerImssoMenBasketballPage');
      Route::post('imsso/men-basketball', 'ImssoController@registerImssoMenBasketball')->name('register.imsso.men.basketball');

      Route::get('imsso/women-basketball', 'ImssoController@registerImssoWomenBasketballPage');
      Route::post('imsso/women-basketball', 'ImssoController@registerImssoWomenBasketball')->name('register.imsso.women.basketball');

      Route::get('imsso/men-futsal', 'ImssoController@registerImssoMenFutsalPage');
      Route::post('imsso/men-futsal', 'ImssoController@registerImssoMenFutsal')->name('register.imsso.men.futsal');

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
      Route::post('inamsc/submissions', 'InamscController@uploadSubmission');
      Route::post('imarc/submissions', 'ImarcController@uploadSubmission');
      Route::get('download/letter-of-originality', 'ParticipantController@getLetterOfOriginality');

    });

  });

  //lombanya telah disetujui

});
