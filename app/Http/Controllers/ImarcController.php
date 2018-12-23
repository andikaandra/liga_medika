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

    public function registerImarcPage(){
        $lomba = Lomba::where('nama', 'IMARC')->first();
        return view('registration-forms.imarc', compact('lomba'));
    }

    public function registerImarc(Request $request) {
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
        $path = $request->file('data_peserta')->store('public/imarc/imarc-participants');


        $imarc = IMARC::create([
          'user_id' => $user_id,
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

        $path = $request->file('bukti_pembayaran')->store('public/imarc-payments');
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

    public function getImarc() {
      return response()->json(['data' => IMARC::with('user:id,email,name')->get()]);
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
