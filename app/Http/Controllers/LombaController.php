<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Lomba;

class LombaController extends Controller
{
  // register cabang
  public function store(Request $request) {
    // TODO: change user_id to current logged in user
    $user_id = 1;
    if (Auth::user()) {
      $user_id = Auth::user()->id;
    }
    $user = User::find($user_id)->update([
      'penanggung_jawab' => $request->penanggung_jawab,
      'cabang' => $request->cabang,
      'universitas' => $request->universitas
    ]);

    return redirect()->back()->with('message', 'Success');

    // $user = User::find($user_id);

    // return response()->json(['message' => $user], 200);
  }

  public function findLomba($id) {
    return response()->json(Lomba::find($id));
  }

  public function updateLomba($id, Request $request) {
    return response()->json(Lomba::find($id)->update(
      $request->all()
    ));
  }

}
