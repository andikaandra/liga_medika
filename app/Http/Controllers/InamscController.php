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

// TODO: add server side file validation

class InamscController extends Controller
{
    public function registerVideoPublikasiPage(){
        $lomba = Lomba::where('nama', 'INAMSC')->first();
        return view('registration-forms.videoPublikasi', compact('lomba'));
    }

    public function registerLiteratureReviewPage(){
        $lomba = Lomba::where('nama', 'INAMSC')->first();
        return view('registration-forms.literatureReview', compact('lomba'));
    }

    public function registerSymposiumPage() {
      $lomba = Lomba::where('nama', 'INAMSC')->first();
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
            'data_peserta' => 'max:4100|mimes:zip',
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

        // store the participant files
        $path = $request->file('data_peserta')->store('public/inamsc/video-publikasi-participants');


        $inamsc = INAMSC::create([
          'user_id' => $user_id,
          'type' => $tipe_lomba,
          'file_path' => str_replace("public","", $path),
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          INAMSCParticipant::create([
            'inamsc_id' => $inamsc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'kode_ambassador' => $request->{'kode'.$i}
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/video-publikasi-payments');
        // upload payment details
        Payment::create([
          'user_id' => $user_id,
          'tipe_lomba' => $tipe_lomba,
          'location' => str_replace("public","", $path),
          'tipe_pembayaran' => 2, //// TODO: change tipe to DP or Lunas
          'nama_rekening' => $request->nama_rekening,
          'jumlah' => str_replace('.','',$request->jumlah_transfer)
        ]);

      } catch (\Exception $e) {
        return response()->json($e->getMessage(), 500);
      }
      return redirect('users');
    }


    public function registerLiteratureReview(Request $request) {
      $tipe_lomba = 3;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'data_peserta' => 'max:4100|mimes:zip',
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

        // register literature review
        $path = $request->file('data_peserta')->store('public/inamsc/literature-review-participants');

        $inamsc = INAMSC::create([
          'user_id' => $user_id,
          'type' => $tipe_lomba,
          'file_path' => str_replace("public","", $path),
          'gelombang' => $request->gelombang
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          INAMSCParticipant::create([
            'inamsc_id' => $inamsc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'kode_ambassador' => $request->{'kode'.$i}
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

    public function findSimposium($id) {
      $symposium = Symposium::find($id); //find simposium data
      $payment = Payment::find($symposium->user_id); //get payment for user
      return response()->json(['simposium_data' => $symposium, 'payment' => $payment]);
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
}
