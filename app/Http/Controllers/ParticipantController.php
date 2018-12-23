<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lomba;
use Auth;
use App\Payment;
use App\Symposium;
use App\INAMSC;

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
        array_push($pendaftarLomba, 0, 0, 0, 0, 0); //kalo udah milih cabang spesifik, gaperlu cek kuotanya, biar nggak berat
      }
      else{
        //belum milih cabang spesifik, ngecek kuota
        array_push($pendaftarLomba, Symposium::count(), INAMSC::where('type',2)->count(), INAMSC::where('type',3)->count(), INAMSC::where('type',4)->count(), INAMSC::where('type',5)->count());      
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
      $cabang_id = Auth::user()->cabang;
      if ($cabang_id==3) {
        $cabang_spesifik = Auth::user()->cabang_spesifik;
        $dataLomba=Lomba::find($cabang_spesifik);;
      }
      return view('participant.upload-karya', compact('dataLomba'));
    }

}
