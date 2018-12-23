<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lomba;
use Auth;
use App\Payment;

class ParticipantController extends Controller
{
    public function index() {
      $cabang_id = 1;
      if (Auth::user()) {
        $cabang_id = Auth::user()->cabang;
      }
      $accountStatus = null;
      // check if user has registered cabang spesifik
      if (Auth::user()->cabang_spesifik) {
        $accountStatus = Payment::find(Auth::user()->id); //check payment status
      }

      $lomba = Lomba::find($cabang_id);

      return view('participant.index', ['lomba' => $lomba, 'status' => $accountStatus]);
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

      $uploaded = Auth::user()->inamscs[0]->submissions;
      if ($uploaded->count()) {
        $uploaded = $uploaded[0];
      }

      return view('participant.upload-karya', compact('allowed', 'wave', 'uploaded'));
    }

}
