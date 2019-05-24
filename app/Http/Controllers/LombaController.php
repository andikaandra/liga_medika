<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Lomba;
use Validator;

class LombaController extends Controller
{
  // register cabang
  public function store(Request $request) {

    $validator = Validator::make($request->all(), [
      'penanggung_jawab' => 'required',
      'cabang' => 'required',
      'universitas' => 'required',
      'phone' => 'required'
  ]);

  // test the validator
  if ($validator->fails()) {
    return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
  }

    if (Auth::user()) {
      $user_id = Auth::user()->id;
    }
    $user = User::find($user_id)->update([
      'penanggung_jawab' => $request->penanggung_jawab,
      'cabang' => $request->cabang,
      'universitas' => $request->universitas,
      'phone' => $request->phone
    ]);

    return redirect()->back()->with('message', 'Success');
  }

  public function resetCabang(Request $request) {
    $user = User::find($request->user_id)->update([
      'penanggung_jawab' => NULL,
      'cabang' => NULL,
      'universitas' => NULL,
      'phone' => NULL
    ]);

    return redirect('users')->with('message', 'Reset Data Success!');;

    // return view('participant.index')->with('message', 'Reset Data Success!');
  }


  public function findLomba($id) {
    return response()->json(Lomba::find($id));
  }

  public function updateLomba($id, Request $request) {
    return response()->json(Lomba::find($id)->update([
      'jumlah_gelombang' => $request->jumlah_gelombang,
      'gelombang_sekarang' => $request->gelombang_sekarang,
      'biaya' => str_replace('.','',$request->biaya),
      'status_pendaftaran' => $request->status_pendaftaran,
      'status_pengumpulan' => $request->status_pengumpulan,
      'kuota' => $request->kuota,
      'dp' => str_replace('.','',$request->dp)
    ]));
  }

}
