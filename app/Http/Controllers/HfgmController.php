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

    public function getCampaign() {
      return response()->json(['data' => HFGM::with('user:id,email')->where('type','1')->get()]);
    }

    public function getConcert() {
      return response()->json(['data' => HFGM::with('user:id,email')->where('type','2')->get()]);
    }

    public function findCampaign($id) {
      $campaign = HFGM::find($id); //find campaign data
      $payment = Payment::where('user_id', $campaign->user_id)->first(); //get payment for user
      return response()->json(['campaign_data' => $campaign, 'payment' => $payment]);
    }

    public function acceptCampaign($id) {
      // look for campaign data and verify it
      $campaign = HFGM::find($id);
      // verify user aswell
      User::find($campaign->user_id)
      ->update([
        'lomba_verified' => 1
      ]);

      $campaign->update([
        'status_pembayaran' => 1,
        'status_verif' => 1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function declineCampaign($id) {
      // look for campaign data and verify it
      $campaign = HFGM::find($id);
      // verify user aswell
      User::find($campaign->user_id)
      ->update([
        'lomba_verified' => -1
      ]);

      $campaign->update([
        'status_pembayaran' => -1,
        'status_verif' => -1
      ]);

      return response()->json(['message' => 'ok']);
    }

    public function findConcert($id) {
      $concert = HFGM::find($id); //find concert data
      $payment = Payment::where('user_id', $concert->user_id)->first(); //get payment for user
      return response()->json(['concert_data' => $concert, 'payment' => $payment]);
    }

    public function acceptConcert($id) {
      // look for concert data and verify it
      $concert = HFGM::find($id);
      // verify user aswell
      User::find($concert->user_id)
      ->update([
        'lomba_verified' => 1
      ]);

      $concert->update([
        'status_pembayaran' => 1,
        'status_verif' => 1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function declineConcert($id) {
      // look for concert data and verify it
      $concert = HFGM::find($id);
      // verify user aswell
      User::find($concert->user_id)
      ->update([
        'lomba_verified' => -1
      ]);

      $concert->update([
        'status_pembayaran' => -1,
        'status_verif' => -1
      ]);

      return response()->json(['message' => 'ok']);
    }

    
    public function registerCampaign(Request $request) {
      $tipe_lomba = 13;
      $user_id = Auth::user()->id;

      try {

        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'ktp' => 'bail|required|max:1100|mimes:jpeg,jpg,png',
            'bukti_pembayaran' => 'bail|required|max:1100|mimes:jpeg,jpg,png',
            'nama' => 'required',
            'jumlah' => 'required',
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
            'jumlah' => 'required',
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
