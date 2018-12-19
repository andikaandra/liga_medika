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
        $title = "Verification- Symposium & Workshop";
        return view('admin.inamsc.verification_simposium', compact('title'));

    }


    //VERIFIKASI EDUCATION VIDEO
    public function verifEdukasiPage()
    {
        $title = "Verification - Education Video & Public Poster ";
        return view('admin.inamsc.verification_education', compact('title'));
    }



    public function verifLiteraturePage()
    {
        $title = "Verification Literature Review & Research Public Poster ";
        return view('admin.inamsc.verification_literature', compact('title'));
    }

    public function getInamscFiles($id)
    {
      try {
        $data = INAMSC::where('user_id', $id)->first();
        $myFile = public_path().'/storage'.$data->file_path;
        $headers = array('Content-Type: application/octet-stream','Content-Length: '. filesize($myFile));
        $newName = time().'.zip';
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], $e->getCode());
      }

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
