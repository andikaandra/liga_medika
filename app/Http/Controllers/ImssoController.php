<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Symposium;
use App\Payment;
use App\IMSSO;
use App\IMSSOParticipant;
use Auth;
use App\Lomba;
use Validator;

class ImssoController extends Controller
{
    public function registerImssoMenBasketballPage(){
        $lomba = Lomba::find(6);
        return view('registration-forms.men-basketball', compact('lomba'));
    }

    public function registerImssoWomenBasketballPage(){
        $lomba = Lomba::find(7);
        return view('registration-forms.women-basketball', compact('lomba'));
    }

    public function registerImssoMenFutsalPage(){
        $lomba = Lomba::find(8);
        return view('registration-forms.men-futsal', compact('lomba'));
    }

    public function registerImssoMenBasketball(Request $request) {
      $tipe_lomba = 6;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'data_peserta' => 'max:6100|mimes:zip',
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
          'cabang_spesifik' => 1,
        ]);

        // store the participant files
        $path = $request->file('data_peserta')->store('public/imsso/men-basketball-participants');


        $imsso = IMSSO::create([
          'user_id' => $user_id,
          'sport_type' => 1,
          'file_path' => str_replace("public","", $path),
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          IMSSOParticipant::create([
            'imsso_id' => $imsso->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i}
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/men-basketball-payments');
        // upload payment details
        Payment::create([
          'user_id' => $user_id,
          'tipe_lomba' => $tipe_lomba,
          'location' => str_replace("public","", $path),
          'tipe_pembayaran' => 1, //// TODO: change tipe to DP or Lunas
          'nama_rekening' => $request->nama_rekening,
          'jumlah' => str_replace('.','',$request->jumlah_transfer)
        ]);

      } catch (\Exception $e) {
        return response()->json($e->getMessage(), 500);
      }
      return redirect('users');
    }

    public function registerImssoWomenBasketball(Request $request) {
      $tipe_lomba = 7;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'data_peserta' => 'max:6100|mimes:zip',
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
        $path = $request->file('data_peserta')->store('public/imsso/women-basketball-participants');


        $imsso = IMSSO::create([
          'user_id' => $user_id,
          'sport_type' => 2,
          'file_path' => str_replace("public","", $path),
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          IMSSOParticipant::create([
            'imsso_id' => $imsso->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i}
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/women-basketball-payments');
        // upload payment details
        Payment::create([
          'user_id' => $user_id,
          'tipe_lomba' => $tipe_lomba,
          'location' => str_replace("public","", $path),
          'tipe_pembayaran' => 1, //// TODO: change tipe to DP or Lunas
          'nama_rekening' => $request->nama_rekening,
          'jumlah' => str_replace('.','',$request->jumlah_transfer)
        ]);

      } catch (\Exception $e) {
        return response()->json($e->getMessage(), 500);
      }
      return redirect('users');
    }

    public function registerImssoMenFutsal(Request $request) {
      $tipe_lomba = 8;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'data_peserta' => 'max:6100|mimes:zip',
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

        // store the participant files
        $path = $request->file('data_peserta')->store('public/imsso/men-futsal-participants');


        $imsso = IMSSO::create([
          'user_id' => $user_id,
          'sport_type' => 3,
          'file_path' => str_replace("public","", $path),
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          IMSSOParticipant::create([
            'imsso_id' => $imsso->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i}
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/men-futsal-payments');
        // upload payment details
        Payment::create([
          'user_id' => $user_id,
          'tipe_lomba' => $tipe_lomba,
          'location' => str_replace("public","", $path),
          'tipe_pembayaran' => 1, //// TODO: change tipe to DP or Lunas
          'nama_rekening' => $request->nama_rekening,
          'jumlah' => str_replace('.','',$request->jumlah_transfer)
        ]);

      } catch (\Exception $e) {
        return response()->json($e->getMessage(), 500);
      }
      return redirect('users');
    }


    public function getMenBasketball() {
      return response()->json(['data' => IMSSO::where('sport_type', 1)->with('user:id,email,name')->get()]);
    }

    public function getWomenBasketball() {
      return response()->json(['data' => IMSSO::where('sport_type', 2)->with('user:id,email,name')->get()]);
    }

    public function getMenFutsal() {
      return response()->json(['data' => IMSSO::where('sport_type', 3)->with('user:id,email,name')->get()]);
    }

    public function findImssoDetails($id) {
      $imsso = IMSSO::find($id);
      $payment = Payment::where('user_id', $imsso->user_id)->where('tipe_pembayaran', 1)->first();
      return response()->json(['location' => $imsso->file_path, 'payment' => $payment, 'user_id' => $imsso->user_id,
      'participants' => $imsso->participants]);
    }

    public function acceptImsso($id) {
      $imsso = IMSSO::find($id);
      $userUpdate =   $imsso->user->update([
          'lomba_verified' => 1
        ]);
      $inamscUpdate = $imsso->update([
        'status_pembayaran' => 1,
        'status_verif' => 1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function declineImsso($id) {
      $imsso = IMSSO::find($id);
      $userUpdate =   $imsso->user->update([
          'lomba_verified' => -1
        ]);
      $inamscUpdate = $imsso->update([
        'status_pembayaran' => -1,
        'status_verif' => -1
      ]);
      return response()->json(['message' => 'ok']);
    }

}
