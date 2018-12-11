<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LombaController extends Controller
{
  // register cabang
  public function store(Request $request) {
    // TODO: change user_id to current logged in user
    $user_id = 1;
    $user = User::find($user_id)->update([
      'penanggung_jawab' => $request->penanggung_jawab,
      'cabang' => $request->cabang,
      'universitas' => $request->universitas
    ]);
    //
    // $user = User::find($user_id);

    // return response()->json(['message' => $user], 200);
  }

}
