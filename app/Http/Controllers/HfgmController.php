<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\HFGMParticipant;
use App\Payment;
use App\Lomba;
use App\User;
use App\HFGM;
use Auth;

class HfgmController extends Controller
{
    public function registerCampaignPage(){
        $lomba = Lomba::find(13);
        return view('registration-forms.campaign', compact('lomba'));
    }

    public function registerConcertPage(){
        $lomba = Lomba::find(14);
        return view('registration-forms.concert', compact('lomba'));
    }

    
    public function registerCampaign(Request $request) {
      $tipe_lomba = 13;
      $user_id = Auth::user()->id;

      try {

        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'ktp' => 'required|max:1100|mimes:jpeg,jpg,png',
            'bukti_pembayaran' => 'required|max:1100|mimes:jpeg,jpg,png',
            'nama' => 'required',
            'jumlah' => 'required|size:20',
            'nama_rekening' => 'required',
            'gelombang' => 'required'
        ]);

        if ($validator->fails()) {
          	return redirect()
				   ->back()
                   ->withErrors($validator)
                   ->withInput();
      	}

        $user = User::find($user_id)->update([
          'cabang_spesifik' => $tipe_lomba, //campaign
        ]);

        $path = $request->file('ktp')->store('public/identifications');

        // register campaign
        HFGM::create([
          'user_id' => $user_id,
          'type' => 1,
          'nama' => $request->nama,
          'ktp' => str_replace("public","", $path),
          'gelombang' => $request->gelombang,
          'jumlah_tiket' => $request->jumlah,
          'status_pembayaran' => 1// pasti lunas
        ]);


        $path = $request->file('bukti_pembayaran')->store('public/campaign-payments');

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
    }

    public function registerConcert(Request $request) {
      $tipe_lomba = 14;
      $user_id = Auth::user()->id;

      try {

        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'ktp' => 'max:1100|mimes:jpeg,jpg,png',
            'bukti_pembayaran' => 'max:1100|mimes:jpeg,jpg,png',
            'nama' => 'required',
            'jumlah' => 'required|size:20',
            'nama_rekening' => 'required',
            'gelombang' => 'required'
        ]);

        if ($validator->fails()) {
          	return redirect()
				   ->back()
                   ->withErrors($validator)
                   ->withInput();
      	}

        $user = User::find($user_id)->update([
          'cabang_spesifik' => $tipe_lomba, //concert
        ]);

        $path = $request->file('ktp')->store('public/identifications');

        // register campaign
        HFGM::create([
          'user_id' => $user_id,
          'type' => 2,
          'nama' => $request->nama,
          'ktp' => str_replace("public","", $path),
          'gelombang' => $request->gelombang,
          'jumlah_tiket' => $request->jumlah,
          'status_pembayaran' => 1// pasti lunas
        ]);


        $path = $request->file('bukti_pembayaran')->store('public/concert-payments');

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
    }
}
