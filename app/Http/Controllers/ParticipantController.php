<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lomba;
use Auth;
use App\Payment;
use App\Symposium;
use App\INAMSC;
use Validator;
use App\IMARC;
use App\IMSSO;
use App\HFGM;

class ParticipantController extends Controller
{
    public function index() {
      $cabang_id = 1;
      if (Auth::user()) {
        $cabang_id = Auth::user()->cabang;
      }
      $accountStatus = null;

      $pendaftarLomba= array();
      
      // check if user has registered cabang spesifik
      if (Auth::user()->cabang_spesifik) {
        $accountStatus = Payment::find(Auth::user()->id); //check payment status
        array_push($pendaftarLomba, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0); //kalo udah milih cabang spesifik, gaperlu cek kuotanya, biar nggak berat
      }
      else{
        //belum milih cabang spesifik, ngecek kuota
        array_push($pendaftarLomba, Symposium::count(), INAMSC::where('type',2)->count(), INAMSC::where('type',3)->count(), INAMSC::where('type',4)->count(), INAMSC::where('type',5)->count(), IMSSO::where('sport_type',1)->count(), IMSSO::where('sport_type',2)->count(), IMSSO::where('sport_type',3)->count(), IMARC::where('event_type',1)->count(), IMARC::where('event_type',3)->count(), IMARC::where('event_type',3)->count(), IMARC::where('event_type',4)->count(), HFGM::where('type',1)->count(), HFGM::where('type',2)->count());
      }

      $lomba = Lomba::find($cabang_id);

      //cek status buka dan cek kuota
      $listLomba = Lomba::all();

      return view('participant.index', ['lomba' => $lomba, 'status' => $accountStatus, 'listLomba' => $listLomba, 'pendaftarLomba' => $pendaftarLomba]);
    }

    public function getParticipants() {
      if (Auth::user()->cabang ==2 ) {
        $participants = Auth::user()->imarcs;
      } else if(Auth::user()->cabang ==3) {
        $participants = Auth::user()->inamscs;
      } else if(Auth::user()->cabang ==1) {
        $participants = Auth::user()->imsso;
      }

      $has_filled_phone = Auth::user()->phone;
      
      return view('participant.participants', ['participants' => $participants, 'phone' => $has_filled_phone]);
    }

    public function dashboard() {
      return view('participant.dashboard');
    }

    public function uploadKarya() {
      // get status of uploads
      $lomba = Lomba::find(Auth::user()->cabang_spesifik);
      $allowed = $lomba->status_pengumpulan;
      $wave = $lomba->gelombang_sekarang;

      $cabang_spesifik = Auth::user()->cabang_spesifik;
      $dataLomba=Lomba::find($cabang_spesifik);;

      if(Auth::user()->cabang == 3)
        $uploaded = Auth::user()->inamscs[0]->submissions;
      else if(Auth::user()->cabang == 2)
        $uploaded = Auth::user()->imarcs[0]->submissions;      
      
      if ($uploaded->count()) {
        $uploaded = $uploaded[0];
      }

      return view('participant.upload-karya', compact('allowed', 'wave', 'uploaded', 'dataLomba'));

    }

    public function getLetterOfOriginality(){
      return response()->download(storage_path("app/public/committee-files/Letter-of-Originality_First Author_Institution.docx"));
    }

    public function getLetterOfOriginalityPhotography(){
      return response()->download(storage_path("app/public/committee-files/Letter-of-Originality_Photography.docx"));
    }

    // TODO: Travel Plan
    public function travelPlanPage() {
      return view('participant.travel-plan');
    }
    // TODO: Travel Plan
    public function travelPlanInamsc(Request $request) {
      $validator = Validator::make($request->all(), [
          'workshop' => 'bail|required',
          'accreditation' => 'bail|required',
          'link' => 'bail|max:126|required',
          'nama_rekening' => 'bail|max:126|required',
          'jumlah_transfer' => 'bail|max:12|required',
          'bukti_pembayaran' => 'bail|required|max:1500|mimes:jpeg,jpg,png',
      ]);

      if (strlen(str_replace('.','',$request->jumlah_transfer))>=10) {
        return redirect()->back();
      }

      if ($validator->fails()) {
        return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
      }

      $path = $request->file('bukti_pembayaran')->store('public/full-payments');

      INAMSC::find(Auth::user()->inamscs[0]->id)
      ->update([
        'link_travel_plan' => $request->link,
        'workshop' => $request->workshop,
        'accreditation' => $request->accreditation,
        'nama_rekening' => $request->nama_rekening,
        'jumlah_transfer' => str_replace('.','',$request->jumlah_transfer),
        'bukti_pembayaran' => str_replace("public","", $path),
      ]);
      return redirect()->back();
    }

    public function travelPlanImsso(Request $request) {
      IMSSO::find(Auth::user()->imsso[0]->id)
      ->update([
        'link_travel_plan' => $request->link
      ]);
      return redirect()->back();
    }

    public function storePhoneNumber(Request $request) {
      Auth::user()->phone = $request->phone;
      Auth::user()->save();
      return redirect()->back()->with('message', 'Phone number added!');
    }

}
