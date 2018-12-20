<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Lomba;
use App\User;
use App\Symposium;
use App\Payment;
use App\INAMSC;
use App\IMARC;
use App\IMSSO;
use App\HFGM;

class AdminController extends Controller
{
    public function index()
    {
        $total_imsso_imarc = IMARC::count();
        $total_imsso_imarc += IMSSO::count();
        $total_inamsc = INAMSC::count();
        $total_hfgm = HFGM::count();
        $lombas = Lomba::all();
        return view('admin.index', compact('lombas','total_imsso_imarc', 'total_inamsc', 'total_hfgm'));
    }

    //VERIFIKASI SIMPOSIUM
    public function verifSimposiumPage()
    {
        $title = "Verification - Symposium & Workshop";
        return view('admin.inamsc.verification_simposium', compact('title'));

    }


    //VERIFIKASI EDUCATION VIDEO
    public function verifEdukasiPage()
    {
        $title = "Verification - Education Video & Public Poster ";
        return view('admin.inamsc.verification_education', compact('title'));
    }


    //VERIFIKASI LITERATURE
    public function verifLiteraturePage()
    {
        $title = "Verification - Literature Review & Research Public Poster ";
        return view('admin.inamsc.verification_literature', compact('title'));
    }


    //VERIFIKASI IMARC
    public function verifImarcPage()
    {
        $title = "Verification - IMARC ";
        return view('admin.imarc.verification_imarc', compact('title'));
    }

    //VERIFIKASI IMSSO
    public function verifImssoPage()
    {
        $title = "Verification - IMSSO ";
        return view('admin.imsso.verification_imsso', compact('title'));
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

   public function getImarcFiles($id)
    {
      try {
        $data = IMARC::where('user_id', $id)->first();
        $myFile = public_path().'/storage'.$data->file_path;
        $headers = array('Content-Type: application/octet-stream','Content-Length: '. filesize($myFile));
        $newName = time().'.zip';
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], $e->getCode());
      }

      return response()->download($myFile, $newName, $headers);
    }

   public function getImssoFiles($id)
    {
      try {
        $data = IMSSO::where('user_id', $id)->first();
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

    public function viewUploadedFileSimposium($type, $id)
    {
        $path='';
        $path = Symposium::find($id);
        $user_id = $path->user_id;
        if (!$path) {
          return "Not found";
        }
        if ($type=="ktp") {
            $path = $path->ktp;
        }
        if ($type=="payment") {
            $path = Payment::where('user_id', $user_id)->first();
            $path = $path->location;
        }
        return view('admin.view_uploaded_file', compact('path'));
    }

    public function viewUploadedEducationAndLitrev($type, $id)
    {
        $path='';
        $path = INAMSC::find($id);
        $user_id = $path->user_id;
        if (!$path) {
          return "Not found";
        }
        if ($type=="ktp") {
            $path = $path->ktp;
        }
        if ($type=="payment") {
            $path = Payment::where('user_id', $user_id)->first();
            $path = $path->location;
        }
        return view('admin.view_uploaded_file', compact('path'));
    }

}
