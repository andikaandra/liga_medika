<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lomba;
use Auth;

class ParticipantController extends Controller
{
    public function index() {
      $cabang_id = 1;
      if (Auth::user()) {
        $cabang_id = Auth::user()->cabang;
      }

      $lomba = Lomba::find($cabang_id);
      return $cabang_id;
      return view('participant.index', ['lomba' => $lomba]);
    }

    public function dashboard() {
      return view('participant.dashboard');
    }
}
