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
      // TODO: change user_id to current logged in user
      $user_id = 1;
      if (Auth::user()) {
        $user_id = Auth::user()->id;
      }
      $user = User::find($user_id)->update([
        'penanggung_jawab' => $request->penanggung_jawab,
        'cabang' => $request->cabang,
        'universitas' => $request->universitas
      ]);
      //
      // $user = User::find($user_id);

      return response()->json(['message' => $user], 200);
    }


    // register video publikasi
    public function registerVideoPublikasi(Request $request) {
      // TODO:

      $user_id = 1;
      $tipe_lomba = 2;
      if (Auth::user()) {
        $user_id = Auth::user()->id;
      }
      try {
        // register video publikasi
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
          'jumlah' => $request->jumlah_transfer
        ]);

      } catch (\Exception $e) {
        return response()->json($e->getMessage(), 500);
      }
      return response()->json(['message' => 'success'], 201);
    }


    public function registerLiteratureReview(Request $request) {
      // TODO:

      $user_id = 1;
      $tipe_lomba = 3;
      try {
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
      return response()->json(['message' => 'success'], 201);
    }

    // register symposium and workshop
    public function registerSymposium(Request $request) {
      // TODO: change user_id to current logged in user
      // tipe lomba aswell
      $user_id = 1;
      $tipe_lomba = 1;
      if (Auth::user()) {
        $user_id = Auth::user()->id;
      }
      try {

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
          'jumlah' => $request->jumlah_transfer
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
      return response()->json(INAMSC::all());
    }

    public function getSymposium() {
      return response()->json(Symposium::all());

    }
}
