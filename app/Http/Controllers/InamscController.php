<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Symposium;
use App\Payment;
use App\INAMSC;
use App\INAMSCParticipant;
use Auth;
use App\Lomba;
use Validator;
use Storage;
use App\Submission;
use Log;
use DB;

class InamscController extends Controller
{
    public function registerVideoPublikasiPage(){
        $lomba = Lomba::find(2);
        if ($lomba->status_pendaftaran) {
          return view('registration-forms.videoPublikasi', compact('lomba'));
        }
        else{
          return redirect()->action('PagesController@index');
        }
    }

    public function registerPosterPublicationPage(){
        $lomba = Lomba::find(3);
        if ($lomba->status_pendaftaran) {
          return view('registration-forms.posterPublication', compact('lomba'));
        }
        else{
          return redirect()->action('PagesController@index');
        }
    }

    public function registerLiteratureReviewPage(){
        $lomba = Lomba::find(4);
        if ($lomba->status_pendaftaran) {
          return view('registration-forms.literatureReview', compact('lomba'));
        }
        else{
          return redirect()->action('PagesController@index');
        }
    }

    public function registerResearchPosterPage(){
        $lomba = Lomba::find(5);
        if ($lomba->status_pendaftaran) {
          return view('registration-forms.researchPoster', compact('lomba'));
        }
        else{
          return redirect()->action('PagesController@index');
        }
    }

    public function registerSymposiumPage() {
      $lomba = Lomba::find(1);
      if ($lomba->status_pendaftaran) {
        return view('registration-forms.symposium', ['lomba' => $lomba]);
      }
      else{
        return redirect()->action('PagesController@index');
      }
    }

    // register current user to inamsc
    public function store(Request $request) {
      $user_id = Auth::user()->id;

      $user = User::find($user_id)->update([
        'penanggung_jawab' => $request->penanggung_jawab,
        'cabang' => $request->cabang,
        'universitas' => $request->universitas
      ]);

      return response()->json(['message' => $user], 200);
    }

    // register video publikasi
    public function registerVideoPublikasi(Request $request) {
      $tipe_lomba = 2;
      $user_id = Auth::user()->id;
  

      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'bail|required|max:1100|mimes:jpeg,jpg,png',
            'nama_rekening' => 'bail|required',
            'jumlah_transfer' => 'bail|required'
        ]);

        if (strlen(str_replace('.','',$request->jumlah_transfer))>=10) {
          return redirect()->back();
        }

        // test the validator out
        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $rules = [];

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
            $rules['data_peserta'.$i] = 'bail|required|max:8000|mimes:zip';
            $rules['nama'.$i] = 'required';
            $rules['univ'.$i] = 'required';
            $rules['jurusan'.$i] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $user = User::find($user_id)->update([
          'cabang_spesifik' => 2,
        ]);



        $inamsc = INAMSC::create([
          'user_id' => $user_id,
          'type' => $tipe_lomba,
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          
          $path = $request->file('data_peserta'.$i)->store('public/inamsc/video-publikasi-participants');
          INAMSCParticipant::create([
            'inamsc_id' => $inamsc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'kode_ambassador' => $request->{'kode'.$i},
            'file_path' => str_replace("public","", $path),
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/video-publikasi-payments');
        // upload payment details
        Payment::create([
          'user_id' => $user_id,
          'tipe_lomba' => $tipe_lomba,
          'location' => str_replace("public","", $path),
          'tipe_pembayaran' => 1, // Bayar DP
          'nama_rekening' => $request->nama_rekening,
          'jumlah' => str_replace('.','',$request->jumlah_transfer)
        ]);

      } catch (\Exception $e) {
        $message = 'Video - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        Log::emergency($message);
        return redirect()->route('regis.error');
      }
      return redirect('users');
    }

    // register publikasi poster
    public function registerPosterPublication(Request $request) {
      $tipe_lomba = 3;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            // 'data_peserta' => 'max:6100|mimes:zip',
            'bukti_pembayaran' => 'bail|required|max:1100|mimes:jpeg,jpg,png',
            'gelombang' => 'required',
            'nama_rekening' => 'required',
            'jumlah_transfer' => 'required'
        ]);


        if (strlen(str_replace('.','',$request->jumlah_transfer))>=10) {
          return redirect()->back();
        }

        // test the validator out
        if ($validator->fails()) {
          // return response()->json($validator);
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $rules = [];

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
            $rules['data_peserta'.$i] = 'bail|required|max:8000|mimes:zip';
            $rules['nama'.$i] = 'required';
            $rules['univ'.$i] = 'required';
            $rules['jurusan'.$i] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $user = User::find($user_id)->update([
          'cabang_spesifik' => 3,
        ]);
          

        $inamsc = INAMSC::create([
          'user_id' => $user_id,
          'type' => $tipe_lomba,
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {          
          $path = $request->file('data_peserta'.$i)->store('public/inamsc/poster-publikasi-participants');
          INAMSCParticipant::create([
            'inamsc_id' => $inamsc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'kode_ambassador' => $request->{'kode'.$i},
            'file_path' => str_replace("public","", $path),
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/poster-publikasi-payments');
        // upload payment details
        Payment::create([
          'user_id' => $user_id,
          'tipe_lomba' => $tipe_lomba,
          'location' => str_replace("public","", $path),
          'tipe_pembayaran' => 1, // Bayar DP
          'nama_rekening' => $request->nama_rekening,
          'jumlah' => str_replace('.','',$request->jumlah_transfer)
        ]);

      } catch (\Exception $e) {
        $message = 'Poster publication - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        Log::emergency($message);
        return redirect()->route('regis.error');

      }
      return redirect('users');
    }

    public function registerLiteratureReview(Request $request) {
      $tipe_lomba = 4;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $rules = [];

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
            $rules['data_peserta'.$i] = 'bail|required|max:8000|mimes:zip';
            $rules['nama'.$i] = 'required';
            $rules['univ'.$i] = 'required';
            $rules['jurusan'.$i] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $user = User::find($user_id)->update([
          'cabang_spesifik' => 4,
        ]);

        // register literature review


        $inamsc = INAMSC::create([
          'user_id' => $user_id,
          'type' => $tipe_lomba,
          'gelombang' => $request->gelombang,
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          $path = $request->file('data_peserta'.$i)->store('public/inamsc/literature-review-participants');
          INAMSCParticipant::create([
            'inamsc_id' => $inamsc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'kode_ambassador' => $request->{'kode'.$i},
            'file_path' => str_replace("public","", $path),
          ]);
        }

      } catch (\Exception $e) {
        $message = 'Litrev - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        Log::emergency($message);        
        return redirect()->route('regis.error');

      }
      return redirect('users');
    }

    public function registerResearchPoster(Request $request) {
      $tipe_lomba = 5;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $rules = [];

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
            $rules['data_peserta'.$i] = 'bail|required|max:8000|mimes:zip';
            $rules['nama'.$i] = 'required';
            $rules['univ'.$i] = 'required';
            $rules['jurusan'.$i] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $user = User::find($user_id)->update([
          'cabang_spesifik' => 5,
        ]);

        // register literature review
        $inamsc = INAMSC::create([
          'user_id' => $user_id,
          'type' => $tipe_lomba,
          'gelombang' => $request->gelombang,
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          $path = $request->file('data_peserta'.$i)->store('public/inamsc/research-poster-participants');
          INAMSCParticipant::create([
            'inamsc_id' => $inamsc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'kode_ambassador' => $request->{'kode'.$i},
            'file_path' => str_replace("public","", $path),
          ]);
        }

      } catch (\Exception $e) {
        $message = 'RPP - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        Log::emergency($message);
        return redirect()->route('regis.error');
      }
      return redirect('users');
    }

    // register symposium and workshop
    public function registerSymposium(Request $request) {
      $tipe_lomba = 1;
      $user_id = Auth::user()->id;

      $messages = [
          'ktp.max' => 'Uploaded KTP file cannot exceed 1 mb.',
          'ktp.mimes' => 'Uploaded KTP file has to be jpeg, jpg or png format.',
          'bukti_pembayaran.max' => 'Uploaded proof of payment file cannot exceed 1 mb.',
          'bukti_pembayaran.mimes' => 'Uploaded proof of payment file has to be jpeg, jpg or png format.',
          'nama.required' => 'Please fill in name field.',
          'nama_rekening.required' => 'Please fill in account sender.',
          'jumlah_transfer' => 'Please fill in amount.'
      ];

      try {

        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'ktp' => 'bail|required|max:1100|mimes:jpeg,jpg,png',
            'bukti_pembayaran' => 'bail|required|max:1100|mimes:jpeg,jpg,png',
            'nama' => 'required',
            'nama_rekening' => 'required',
            'jumlah_transfer' => 'required',
            'workshop' => 'required',
        ], $messages);

        // test the validator out
        if ($validator->fails()) {
          // return response()->json($validator)
          // return "Error";
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
       }

       $validator = Validator::make(
          $request->all(), ['nama' => 'required',
          'gelombang' => 'required',
          'nama_rekening' => 'required']
      );

      if ($validator->fails()) {
        return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
      }

        $user = User::find($user_id)->update([
          'cabang_spesifik' => 1,
        ]);

        $path = $request->file('ktp')->store('public/identifications');

        if ($request->workshop==1) {
          $sertifikat = $request->accreditation;
        }
        else{
          $sertifikat = 'no';
        }
        
        // register symposium
        Symposium::create([
          'user_id' => $user_id,
          'nama' => $request->nama,
          'ktp' => str_replace("public","", $path),
          'status_pembayaran' => $request->status_pembayaran,
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 0,
          'workshop' => $request->workshop,
          'sertifikat' => $sertifikat,
        ]);


        $path = $request->file('bukti_pembayaran')->store('public/symposium-payments');

        // upload payment details
        Payment::create([
          'user_id' => $user_id,
          'tipe_lomba' => $tipe_lomba,
          'location' => str_replace("public","", $path),
          'tipe_pembayaran' => 2, //// TODO: change tipe to DP or Lunas
          'nama_rekening' => $request->nama_rekening,
          'jumlah' => str_replace('.','',$request->jumlah_transfer)//because client side ada jquery mask
        ]);
        // done -> wait for admin confirmation
      } catch (\Exception $e) {
        $message = 'Symposium - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        return $message;
        Log::emergency($message);
        return redirect()->route('regis.error');
      }

      return redirect('users');

    }

    //get users who are registered to inamsc
    public function getInamsc() {
      return response()->json(['data' => INAMSC::all()]);
    }

    public function getSymposium() {
      return response()->json(['data' => Symposium::with('user:id,email')->get()]);
    }

    public function findsymposium($id) {
      $symposium = Symposium::find($id); //find symposium data
      $payment = Payment::where('user_id', $symposium->user_id)->first(); //get payment for user
      return response()->json(['symposium_data' => $symposium, 'payment' => $payment]);
    }

    public function acceptSymposium($id) {
      // look for symposium data and verify it
      $symposium = Symposium::find($id);

      // verify user aswell
      User::find($symposium->user_id)
      ->update([
        'lomba_verified' => 1
      ]);

      $symposium->update([
                'status_pembayaran' => 1,
                'status_verif' => 1
              ]);
      return response()->json(['message' => 'ok']);
    }

    public function declineSymposium($id) {
      // look for symposium data and verify it
      $symposium = Symposium::find($id);
      // verify user aswell
      User::find($symposium->user_id)
      ->update([
        'lomba_verified' => -1
      ]);

      $symposium->update([
        'status_pembayaran' => -1,
        'status_verif' => -1
      ]);

      return response()->json(['message' => 'ok']);
    }

    public function getEducationvideo() {
      return response()->json(['data' => INAMSC::where('type', 2)->with('user:id,email,name')->get()]);
    }

    public function findEducationVideoDetails($id) {
      //get Educational Video details and payment DP proof
      $educationVideo = INAMSC::find($id);
      $payment = Payment::where('user_id', $educationVideo->user_id)->where('tipe_pembayaran', 1)->first();
      return response()->json(['payment' => $payment, 'user_id' => $educationVideo->user_id,
      'participants' => $educationVideo->participants, 'id' => $educationVideo->id]);
    }

    public function acceptEducationVideo($id) {
      $inamsc = INAMSC::find($id);
      $userUpdate =   $inamsc->user->update([
          'lomba_verified' => 1
        ]);
      $inamscUpdate = $inamsc->update([
        'status_pembayaran' => 1,
        'status_verif' => 1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function declineEducationVideo($id) {
      $inamsc = INAMSC::find($id);
      $userUpdate =   $inamsc->user->update([
          'lomba_verified' => -1
        ]);
      $inamscUpdate = $inamsc->update([
        'status_pembayaran' => -1,
        'status_verif' => -1
      ]);
      return response()->json(['message' => 'ok']);
    }


    public function getPublicationPoster() {
      return response()->json(['data' => INAMSC::where('type', 3)->with('user:id,email,name')->get()]);
    }

    public function findPublicationPosterDetails($id) {
      $publicationPoster = INAMSC::find($id);
      $payment = Payment::where('user_id', $publicationPoster->user_id)->where('tipe_pembayaran', 1)->first();
      return response()->json(['payment' => $payment, 'user_id' => $publicationPoster->user_id,
      'participants' => $publicationPoster->participants, 'id' => $publicationPoster->id]);
    }

    public function acceptPublicationPoster($id) {
      $inamsc = INAMSC::find($id);
      $userUpdate =   $inamsc->user->update([
          'lomba_verified' => 1
        ]);
      $inamscUpdate = $inamsc->update([
        'status_pembayaran' => 1,
        'status_verif' => 1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function declinePublicationPoster($id) {
      $inamsc = INAMSC::find($id);
      $userUpdate =   $inamsc->user->update([
          'lomba_verified' => -1
        ]);
      $inamscUpdate = $inamsc->update([
        'status_pembayaran' => -1,
        'status_verif' => -1
      ]);
      return response()->json(['message' => 'ok']);
    }


    public function getLiteratureReview() {
      return response()->json(['data' => INAMSC::where('type', 4)->with('user:id,email,name')->get()]);
    }

    public function findLiteratureReviewDetails($id) {
      //get Educational Video details and payment DP proof
      $lr = INAMSC::find($id);
      return response()->json(['user_id' => $lr->user_id,
      'participants' => $lr->participants, 'id' => $lr->id]);
    }

    public function acceptLiteratureReview($id) {
      $inamsc = INAMSC::find($id);
      $userUpdate =   $inamsc->user->update([
          'lomba_verified' => 1
        ]);
      $inamscUpdate = $inamsc->update([
        'status_pembayaran' => 1,
        'status_verif' => 1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function declineLiteratureReview($id) {
      $inamsc = INAMSC::find($id);
      $userUpdate =   $inamsc->user->update([
          'lomba_verified' => -1
        ]);
      $inamscUpdate = $inamsc->update([
        'status_pembayaran' => -1,
        'status_verif' => -1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function getResearch() {
      return response()->json(['data' => INAMSC::where('type', 5)->with('user:id,email,name')->get()]);
    }

    public function findResearchDetails($id) {
      $lr = INAMSC::find($id);
      return response()->json(['user_id' => $lr->user_id,
      'participants' => $lr->participants, 'id' => $lr->id]);
    }

    public function acceptResearch($id) {
      $inamsc = INAMSC::find($id);
      $userUpdate =   $inamsc->user->update([
          'lomba_verified' => 1
        ]);
      $inamscUpdate = $inamsc->update([
        'status_pembayaran' => 1,
        'status_verif' => 1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function declineResearch($id) {
      $inamsc = INAMSC::find($id);
      $userUpdate =   $inamsc->user->update([
          'lomba_verified' => -1
        ]);
      $inamscUpdate = $inamsc->update([
        'status_pembayaran' => -1,
        'status_verif' => -1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function downloadLitrevFiles() {
      return response()->download(storage_path("app/public/committee-files/litrev.zip"));
    }

    public function downloadInamscFiles() {
      return response()->download(storage_path("app/public/committee-files/INAMSC.zip"));
    }

    public function downloadTemplates() {
      return response()->download(storage_path("app/public/committee-files/templates.zip"));
    }

    public function uploadSubmission(Request $request) {
      // check if its an uploaded link or file
      if ($request->cabang_spesifik != 2) {
          // make sure file uploaded are within size limit and file type
          if($request->cabang_spesifik == 3) {
            $validator = Validator::make($request->all(), [
              'file_path' => 'required|max:25100|mimes:zip',
              'title' => 'required'
          ]);
          } else {
            $validator = Validator::make($request->all(), [
              'file_path' => 'required|max:6100|mimes:zip',
              'title' => 'required'
          ]);
          }     
          // test the validator out
          if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $path = $request->file('file_path')->store('public/inamsc/karya-submissions');
        $path = str_replace("public","", $path);
      }else {

        $validator = Validator::make($request->all(), [
            'letter_of_originality_path' => 'required|max:3500|mimes:zip',
            'title' => 'required'
        ]);

        // test the validator out
        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
       }


        // get letter of originality for education video
        $lop = $request->file('letter_of_originality_path')->store('public/inamsc/education-video');
        $lop = str_replace("public","", $lop);

        // video link
        // $path = $request->file_path;
        $path = "";
        
        Submission::create([
          'inamsc_id' => Auth::user()->inamscs[0]->id,
          'title' => $request->title,
          'file_path' => $path,
          'letter_of_originality_path' => $lop
        ]);

        return redirect('users/uploads')->with('message', 'Successfully uploaded!');
      }

      Submission::create([
        'inamsc_id' => Auth::user()->inamscs[0]->id,
        'title' => $request->title,
        'file_path' => $path
      ]);

      return redirect('users/uploads')->with('message', 'Successfully uploaded!');
    }

    public function getInamscSubmissions($type) {
      // get educational videos data that has submission
      // $videos = User::where('cabang_spesifik', $type)
      //           ->whereHas('inamscs.submissions')->with('inamscs.submissions')->orderBy('created_at', 'ASC')->get();

      $videos = DB::table('users')
          ->join('inamsc', 'inamsc.user_id', '=', 'users.id')
          ->join('submission', 'submission.inamsc_id', '=', 'inamsc.id')
          ->where('users.cabang_spesifik', '=', $type)
          ->orderBy('submission.created_at', 'ASC')
          ->select('*', 'users.status_lolos as status_lolos_user')
          ->get();

      return response()->json(['data' => $videos]);
    }

    public function findInamscSubmissions($id) {
      return response()->json(Submission::find($id));
    }

    public function downloadLetterOfOriginality($id) {
      $path = Submission::find($id);
      $myFile = public_path().'/storage'.$path->letter_of_originality_path;
      $headers = array('Content-Type: application/octet-stream','Content-Length: '. filesize($myFile));
      $newName = str_slug($path->title).'.zip';
      return response()->download(storage_path("app/public". $path->letter_of_originality_path, $newName, $headers));
    }

    public function downloadSubmissions($id) {
      $path = Submission::find($id);
      $myFile = public_path().'/storage'.$path->file_path;
      $headers = array('Content-Type: application/octet-stream','Content-Length: '. filesize($myFile));
      $newName = str_slug($path->title).'.zip';
      return response()->download(storage_path("app/public". $path->file_path, $newName, $headers));
    }

    public function downloadGuidelines() {
      $myFile = storage_path("app/public/committee-files/Preliminary Guideline INAMSC 2019.pdf");
      $headers = array('Content-Type: application/octet-stream','Content-Length: '. filesize($myFile));
      return response()->download(storage_path("app/public/committee-files/Preliminary Guideline INAMSC 2019.pdf", 'Preliminary Guideline INAMSC 2019.pdf', $headers));      
    }
    
    public function registrationUnsuccessfull() {
      return "Registration unsuccessful. Please contact commitee.";
    }

    public function accTeam($id) {
      User::find($id)->update([
        'status_lolos' => 1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function decTeam($id) {
      $user = User::find($id);
      //jika telah di acc, gabisa di decline
      if ($user->status_lolos==1) {
        return response()->json(['message' => 'fail']);
      }

      $user->update([
        'status_lolos' => -1
      ]);
      return response()->json(['message' => 'ok']);
    }
}
