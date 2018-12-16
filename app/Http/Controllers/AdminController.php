<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Lomba;
use App\User;
use App\Symposium;
use App\Payment;
use App\INAMSC;

class AdminController extends Controller
{
    public function index()
    {
        $lombas = Lomba::all();
        return view('admin.index', ['lombas' => $lombas]);
    }

    //VERIFIKASI SIMPOSIUM
    public function verifSimposiumPage()
    {
        $verif = Symposium::where('status_verif','=',0)->get();
        $title = "Verification Symposium";
        return view('admin.inamsc.verification_simposium', compact('verif', 'title'));

    }

    public function verifSimposiumAcc()
    {
        $verif = Symposium::where('status_verif', 1)->get();
        $title = "Accepted Verification Symposium";
        return view('admin.inamsc.verification_simposium', compact('verif', 'title'));
    }

    public function verifSimposiumReject()
    {
        $verif = Symposium::where('status_verif', 2)->get();
        $title = "Rejected Verification Symposium";
        return view('admin.inamsc.verification_simposium', compact('verif', 'title'));
    }

    public function simposiumAcc(Request $request)
    {
        Symposium::where('id',$request->symposium_id)->update([
          'status_verif' => 1,
        ]);

        User::where('id',$request->user_id)->update([
          'lomba_verified' => 1,
        ]);
        return redirect()->back()->with('message', 'Success');
    }

    public function simposiumReject(Request $request)
    {
        Symposium::where('id',$request->symposium_id)->update([
          'status_verif' => 2,
        ]);

        User::where('id',$request->user_id)->update([
          'lomba_verified' => 2,
        ]);
        return redirect()->back()->with('message', 'Success');
    }


    //VERIFIKASI EDUCATION VIDEO
    public function verifEdukasi()
    {
        $verif = INAMSC::where('status_verif','=',0)->where('type','=',2)->get();
        $title = "Queued Verification Education Video Public Poster ";
        return view('admin.verification_education', compact('verif', 'title'));
    }

    public function verifEdukasiAcc()
    {
        $verif = INAMSC::where('status_verif', 1)->where('type','=',2)->get();
        $title = "Accepted Verification Education Video Public Poster ";
        return view('admin.verification_education', compact('verif', 'title'));
    }

    public function verifEdukasiReject()
    {
        $verif = INAMSC::where('status_verif', 2)->where('type','=',2)->get();
        $title = "Rejected Verification Education Video Public Poster ";
        return view('admin.verification_education', compact('verif', 'title'));
    }

    public function edukasiAcc(Request $request)
    {
        INAMSC::where('id',$request->edukasi_id)->update([
          'status_verif' => 1,
        ]);

        User::where('id',$request->user_id)->update([
          'lomba_verified' => 1,
        ]);

        return redirect()->back()->with('message', 'Success');
    }

    public function edukasiReject(Request $request)
    {
        INAMSC::where('id',$request->edukasi_id)->update([
          'status_verif' => 2,
        ]);

        User::where('id',$request->user_id)->update([
          'lomba_verified' => 2,
        ]);
        return redirect()->back()->with('message', 'Success');
    }


    //VERIFIKASI LITERATURE REVIEW
    public function verifLiterature()
    {
        $verif = INAMSC::where('status_verif','=',0)->where('type','=',3)->get();
        $title = "Queued Verification Literature Review & Research Public Poster ";
        return view('admin.verification_literature', compact('verif', 'title'));
    }

    public function verifLiteratureAcc()
    {
        $verif = INAMSC::where('status_verif', 1)->where('type','=',3)->get();
        $title = "Accepted Verification Literature Review & Research Public Poster ";
        return view('admin.verification_literature', compact('verif', 'title'));
    }

    public function verifLiteratureReject()
    {
        $verif = INAMSC::where('status_verif', 2)->where('type','=',3)->get();
        $title = "Rejected Verification Literature Review & Research Public Poster ";
        return view('admin.verification_literature', compact('verif', 'title'));
    }

    public function literatureAcc(Request $request)
    {
        INAMSC::where('id',$request->literature_id)->update([
          'status_verif' => 1,
        ]);

        User::where('id',$request->user_id)->update([
          'lomba_verified' => 1,
        ]);
        return redirect()->back()->with('message', 'Success');
    }

    public function literatureReject(Request $request)
    {
        INAMSC::where('id',$request->literature_id)->update([
          'status_verif' => 2,
        ]);

        User::where('id',$request->user_id)->update([
          'lomba_verified' => 2,
        ]);
        return redirect()->back()->with('message', 'Success');
    }



    public function getFIle($type, $id)
    {
        $data = INAMSC::where('user_id',$id)->where('type',$type)->select('file_path')->first();

        $myFile = public_path().'/storage'.$data['file_path'];
        $headers = array('Content-Type: application/octet-stream','Content-Length: '. filesize($myFile));
        $newName = time().'.zip';
      return response()->download($myFile, $newName, $headers);
    }

    public function getPayment($type, $id)
    {
      return response()->json(Payment::where('user_id',$id)->where('tipe_lomba',$type)->first());
    }

    public function viewUploadedFile($type, $id)
    {
        $path='';
        if ($type=="ktp") {
            $path = Symposium::where('id', $id)->select('ktp')->first();
            $path = $path['ktp'];
        }
        if ($type=="payment") {
            $path = Payment::where('id', $id)->select('location')->first();
            $path = $path['location'];
        }
        return view('admin.view_uploaded_file', compact('path'));
    }

}
