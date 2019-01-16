<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Payment;
use App\IMARC;
use App\IMARCParticipant;
use Auth;
use App\Lomba;
use Validator;

class ImarcController extends Controller
{

    public function registerImarcPhotographyPage(){
        $lomba = Lomba::find(9);
        return view('registration-forms.photography', compact('lomba'));
    }

    public function registerImarcDancePage(){
        $lomba = Lomba::find(10);
        return view('registration-forms.traditional-dance', compact('lomba'));
    }

    public function registerImarcVocalPage(){
        $lomba = Lomba::find(11);
        return view('registration-forms.vocal-group', compact('lomba'));
    }

    public function registerImarcBandPage(){
        $lomba = Lomba::find(12);
        return view('registration-forms.band', compact('lomba'));
    }

    public function registerImarcPhotography(Request $request) {
      $tipe_lomba = 9;
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
        $path = $request->file('data_peserta')->store('public/imarc/photography-participants');


        $imarc = IMARC::create([
          'user_id' => $user_id,
          'event_type' => 1,
          'file_path' => str_replace("public","", $path),
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          IMARCParticipant::create([
            'imarc_id' => $imarc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i}
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/photography-payments');
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

    public function registerImarcDance(Request $request) {
      $tipe_lomba = 10;
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
        $path = $request->file('data_peserta')->store('public/imarc/dance-participants');


        $imarc = IMARC::create([
          'user_id' => $user_id,
          'event_type' => 2,
          'file_path' => str_replace("public","", $path),
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          IMARCParticipant::create([
            'imarc_id' => $imarc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i}
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/dance-payments');
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

    public function registerImarcVocal(Request $request) {
      $tipe_lomba = 11;
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
        $path = $request->file('data_peserta')->store('public/imarc/vocal-participants');


        $imarc = IMARC::create([
          'user_id' => $user_id,
          'event_type' => 3,
          'file_path' => str_replace("public","", $path),
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          IMARCParticipant::create([
            'imarc_id' => $imarc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i}
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/vocal-payments');
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

    public function registerImarcBand(Request $request) {
      $tipe_lomba = 12;
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
          'cabang_spesifik' => 4,
        ]);

        // store the participant files
        $path = $request->file('data_peserta')->store('public/imarc/band-participants');


        $imarc = IMARC::create([
          'user_id' => $user_id,
          'event_type' => 4,
          'file_path' => str_replace("public","", $path),
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          IMARCParticipant::create([
            'imarc_id' => $imarc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i}
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/band-payments');
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

    public function getPhotography() {
      return response()->json(['data' => IMARC::where('event_type', 1)->with('user:id,email,name')->get()]);
    }

    public function getDance() {
      return response()->json(['data' => IMARC::where('event_type', 2)->with('user:id,email,name')->get()]);
    }

    public function getVocal() {
      return response()->json(['data' => IMARC::where('event_type', 3)->with('user:id,email,name')->get()]);
    }

    public function getBand() {
      return response()->json(['data' => IMARC::where('event_type', 4)->with('user:id,email,name')->get()]);
    }

    public function findImarcDetails($id) {
      $imarc = IMARC::find($id);
      $payment = Payment::where('user_id', $imarc->user_id)->where('tipe_pembayaran', 1)->first();
      return response()->json(['location' => $imarc->file_path, 'payment' => $payment, 'user_id' => $imarc->user_id,
      'participants' => $imarc->participants]);
    }

    public function acceptImarc($id) {
      $imarc = IMARC::find($id);
      $userUpdate =   $imarc->user->update([
          'lomba_verified' => 1
        ]);
      $inamscUpdate = $imarc->update([
        'status_pembayaran' => 1,
        'status_verif' => 1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function declineImarc($id) {
      $imarc = IMARC::find($id);
      $userUpdate =   $imarc->user->update([
          'lomba_verified' => -1
        ]);
      $inamscUpdate = $imarc->update([
        'status_pembayaran' => -1,
        'status_verif' => -1
      ]);
      return response()->json(['message' => 'ok']);
    }

}
