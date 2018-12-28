<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lomba;
use Auth;
use App\Payment;
use App\Symposium;
use App\INAMSC;
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
        array_push($pendaftarLomba, 0, 0, 0, 0, 0, 0, 0, 0, 0); //kalo udah milih cabang spesifik, gaperlu cek kuotanya, biar nggak berat
      }
      else{
        //belum milih cabang spesifik, ngecek kuota
        array_push($pendaftarLomba, Symposium::count(), INAMSC::where('type',2)->count(), INAMSC::where('type',3)->count(), INAMSC::where('type',4)->count(), INAMSC::where('type',5)->count(), IMSSO::count(), IMARC::count(), HFGM::where('type',1)->count(), HFGM::where('type',2)->count());
      }

      $lomba = Lomba::find($cabang_id);

      //cek status buka dan cek kuota
      $listLomba = Lomba::all();

      return view('participant.index', ['lomba' => $lomba, 'status' => $accountStatus, 'listLomba' => $listLomba, 'pendaftarLomba' => $pendaftarLomba]);
    }

    public function getParticipants() {
      $participants = Auth::user()->inamscs;
      return view('participant.participants', ['participants' => $participants]);
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

      $uploaded = Auth::user()->inamscs[0]->submissions;
      if ($uploaded->count()) {
        $uploaded = $uploaded[0];
      }

      return view('participant.upload-karya', compact('allowed', 'wave', 'uploaded', 'dataLomba'));

    }

    public function getLetterOfOriginality(){
      return response()->download(storage_path("app/public/committee-files/Letter-of-Originality_First Author_Institution.docx"));
    }

}
