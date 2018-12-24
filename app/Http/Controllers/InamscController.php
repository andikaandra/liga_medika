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

class InamscController extends Controller
{
    public function registerVideoPublikasiPage(){
        $lomba = Lomba::find(2);
        return view('registration-forms.videoPublikasi', compact('lomba'));
    }

    public function registerPosterPublicationPage(){
        $lomba = Lomba::find(3);
        return view('registration-forms.posterPublication', compact('lomba'));
    }

    public function registerLiteratureReviewPage(){
        $lomba = Lomba::find(4);
        return view('registration-forms.literatureReview', compact('lomba'));
    }

    public function registerResearchPosterPage(){
        $lomba = Lomba::find(5);
        return view('registration-forms.researchPoster', compact('lomba'));
    }

    public function registerSymposiumPage() {
      $lomba = Lomba::find(1);
      return view('registration-forms.symposium', ['lomba' => $lomba]);
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
            // 'data_peserta' => 'max:6100|mimes:zip',
            'bukti_pembayaran' => 'max:1100|mimes:jpeg,jpg,png',
        ]);

        // test the validator out
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
        return response()->json($e->getMessage(), 500);
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
            'bukti_pembayaran' => 'max:1100|mimes:jpeg,jpg,png',
        ]);

        // test the validator out
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
        return response()->json($e->getMessage(), 500);
      }
      return redirect('users');
    }

    public function registerLiteratureReview(Request $request) {
      $tipe_lomba = 4;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            // 'data_peserta' => 'max:6100|mimes:zip',
        ]);

        // test the validator out
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
            'file_path' => str_replace("public","", $path),
          ]);
        }

      } catch (\Exception $e) {
        return response()->json($e->getMessage(), 500);
      }
      return redirect('users');
    }

    public function registerResearchPoster(Request $request) {
      $tipe_lomba = 5;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            // 'data_peserta' => 'max:6100|mimes:zip',
        ]);

        // test the validator out
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
            'file_path' => str_replace("public","", $path),
          ]);
        }

      } catch (\Exception $e) {
        return response()->json($e->getMessage(), 500);
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
      ];


      try {

        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'ktp' => 'max:1100|mimes:jpeg,jpg,png',
            'bukti_pembayaran' => 'max:1100|mimes:jpeg,jpg,png',
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

        $user = User::find($user_id)->update([
          'cabang_spesifik' => 1,
        ]);

        $path = $request->file('ktp')->store('public/identifications');

        // register symposium
        Symposium::create([
          'user_id' => $user_id,
          'nama' => $request->nama,
          'ktp' => str_replace("public","", $path),
          'status_pembayaran' => $request->status_pembayaran,
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 0
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
        return response()->json($e->getMessage(), 500);
      }

      return redirect('users');

      // return response()->json(['message' => 'success'], 201);

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

    public function downloadTemplates() {
      return response()->download(storage_path("app/public/committee-files/templates.zip"));
    }

    public function uploadSubmission(Request $request) {
      // check if its an uploaded link or file
      if ($request->cabang_spesifik != 2) {
          // make sure file uploaded are within size limit and file type
          $validator = Validator::make($request->all(), [
              'file_path' => 'max:6100|mimes:zip',
          ]);

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
        $path = $request->file_path;
      }

      Submission::create([
        'inamsc_id' => Auth::user()->inamscs[0]->id,
        'title' => $request->title,
        'file_path' => $path
      ]);

      return redirect('users/uploads')->with('message', 'Successfully uploaded!');
    }
}
