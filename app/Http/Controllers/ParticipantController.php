<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lomba;
use Auth;

class ParticipantController extends Controller
{
    public function index() {
      $user_id = 1;
      if (Auth::user()) {
        $user_id = Auth::user()->id;
      }
      $lomba = Lomba::find($user_id) ;
      return view('participant.index', ['lomba' => $lomba]);
    }

    public function dashboard() {
      return view('participant.dashboard');
    }
}
