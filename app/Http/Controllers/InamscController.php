<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Symposium;
use App\Payment;
use App\INAMSC;

class InamscController extends Controller
{

    // register symposium and workshop
    public function registerSymposium(Request $request) {
      // TODO: change user_id to current logged in user
      // tipe lomba aswell
      $user_id = 1;
      $tipe_lomba = 1;
      try {

        $user = User::find($user_id)->update([
          'cabang_spesifik' => 1,
        ]);

        // register symposium
        Symposium::create([
          'user_id' => $user_id,
          'nama' => $request->nama,
          'ktp' => $request->ktp,
          'status_pembayaran' => $request->status_pembayaran
        ]);
        // upload payment details
        Payment::create([
          'user_id' => $user_id,
          'tipe_lomba' => $tipe_lomba,
          'location' => $request->location,
          'tipe_pembayaran' => $request->tipe_pembayaran
        ]);
        // done -> wait for admin confirmation
      } catch (\Exception $e) {
        return response()->json($e->getMessage(), 500);
      }

      return response()->json(['message' => 'success'], 201);

    }
    //get users who are registered to inamsc
    public function getInamsc() {
      return response()->json(INAMSC::all());
    }

    public function getSymposium() {
      return response()->json(Symposium::all());

    }
}
