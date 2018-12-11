<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lomba;
use App\Symposium;
use App\Payment;

class AdminController extends Controller
{
    public function index()
    {
        $lombas = Lomba::all();
        return view('admin.index', ['lombas' => $lombas]);
    }

    public function verifSimposium()
    {
        $verif = Symposium::where('status_verif','=',0)->get();
        $title = "Queued Verification Symposium";
        return view('admin.verification_simposium', compact('verif', 'title'));
    }

    public function verifSimposiumAcc()
    {
        $verif = Symposium::where('status_verif', 1)->get();
        $title = "Accepted Verification Symposium";
        return view('admin.verification_simposium', compact('verif', 'title'));
    }

    public function verifSimposiumReject()
    {
        $verif = Symposium::where('status_verif', 2)->get();
        $title = "Rejected Verification Symposium";
        return view('admin.verification_simposium', compact('verif', 'title'));
    }

    public function getPayment($type, $id)
    {
      return response()->json(Payment::where('user_id',$id)->where('tipe_lomba',$type)->first());
    }

}
