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

      // check if user has registered cabang spesifik
      if (Auth::user()->cabang_spesifik) {
        $accountStatus = Payment::find(Auth::user()->id); //check payment status
      }

      $lomba = Lomba::find($cabang_id);

      return view('participant.index', ['lomba' => $lomba, 'status' => $accountStatus]);
    }

    public function dashboard() {
      return view('participant.dashboard');
    }
}
