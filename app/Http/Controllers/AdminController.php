<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Lomba;
use App\User;
use App\Symposium;
use App\Payment;
use App\INAMSCParticipant;
use App\IMARCParticipant;
use App\IMSSOParticipant;
use App\INAMSC;
use App\IMARC;
use App\IMSSO;
use App\HFGM;
use App\Jobs\SendVerificationEmail;

class AdminController extends Controller
{
    public function index()
    {
        $total_imsso_imarc = IMARC::count();
        $total_imsso_imarc += IMSSO::count();
        $total_inamsc = INAMSC::count() + Symposium::count();
        $total_hfgm = HFGM::count();
        $lombas = Lomba::all();
        return view('admin.index', compact('lombas','total_imsso_imarc', 'total_inamsc', 'total_hfgm'));
    }

    //VERIFIKASI symposium
    public function verifsymposiumPage()
    {
        $title = "Verification - Symposium & Workshop ";
        return view('admin.inamsc.verification_symposium', compact('title'));

    }

    //VERIFIKASI Educational Video
    public function verifEdukasiPage()
    {
        $title = "Verification - Educational Video ";
        return view('admin.inamsc.verification_education', compact('title'));
    }

    //VERIFIKASI PUBLIKASI POSTER
    public function verifPublicationPosterPage()
    {
        $title = "Verification - Public Poster ";
        return view('admin.inamsc.verification_publication_poster', compact('title'));
    }


    //VERIFIKASI LITERATURE
    public function verifLiteraturePage()
    {
        $title = "Verification - Literature Review ";
        return view('admin.inamsc.verification_literature', compact('title'));
    }

    //VERIFIKASI RESEARCH POSTER
    public function verifResearchPage()
    {
        $title = "Verification - Research Paper";
        return view('admin.inamsc.verification_research_poster', compact('title'));
    }


    //VERIFIKASI IMARC
    public function verifImarcPhotographyPage()
    {
        $title = "Verification - IMARC Photography ";
        return view('admin.imarc.verification_photography', compact('title'));
    }

    public function verifImarcDancePage()
    {
        $title = "Verification - IMARC Traditional Dance ";
        return view('admin.imarc.verification_dance', compact('title'));
    }

    public function verifImarcVocalPage()
    {
        $title = "Verification - IMARC Vocal Group ";
        return view('admin.imarc.verification_vocal', compact('title'));
    }

    public function verifImarcBandPage()
    {
        $title = "Verification - IMARC Band ";
        return view('admin.imarc.verification_band', compact('title'));
    }

    //VERIFIKASI IMSSO
    public function verifImssoMenBasketballPage()
    {
        $title = "Verification - IMSSO Men Basketball ";
        return view('admin.imsso.verification_men_basketball', compact('title'));
    }

    public function verifImssoWomenBasketballPage()
    {
        $title = "Verification - IMSSO Women Basketball";
        return view('admin.imsso.verification_women_basketball', compact('title'));
    }

    public function verifImssoMenFutsalPage()
    {
        $title = "Verification - IMSSO Men Futsal";
        return view('admin.imsso.verification_men_futsal', compact('title'));
    }

    public function getInamscFiles($id)
    {
      try {
        $data = INAMSCParticipant::find($id);
        $myFile = public_path().'/storage'.$data->file_path;
        $headers = array('Content-Type: application/octet-stream','Content-Length: '. filesize($myFile));
        $newName = str_slug($data->nama).'.zip';
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
        $newName = str_slug($data->nama).'.zip';
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], $e->getCode());
      }

      return response()->download($myFile, $newName, $headers);
    }

   public function getImssoFiles($id)
    {
      try {
        $data = IMSSOParticipant::find($id);
        $myFile = public_path().'/storage'.$data->file_path;
        $headers = array('Content-Type: application/octet-stream','Content-Length: '. filesize($myFile));
        $newName = str_slug($data->nama).'.zip';
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], $e->getCode());
      }

      return response()->download($myFile, $newName, $headers);
    }

    public function getPayment($type, $id)
    {
      return response()->json(Payment::where('user_id',$id)->where('tipe_lomba',$type)->first());
    }

    public function viewUploadedFilesymposium($type, $id)
    {
        // $path='';
        // $path = Symposium::find($id);
        // $user_id = $path->user_id;
        // if (!$path) {
        //   return "Not found";
        // }
        if ($type=="ktp") {
            $path = Symposium::find($id);
            $path = $path->ktp;
        }
        if ($type=="payment") {
            $path = Payment::find($id);
            $path = $path->location;
        }
        return view('admin.view_uploaded_file', compact('path'));
    }

    public function viewUploadedEducationAndLitrev($type, $id)
    {
        if ($type=="payment") {
            $path = Payment::find($id);
            $path = $path->location;
        }
        return view('admin.view_uploaded_file', compact('path'));
    }

    public function submissionsEducationalVideosPage() {
      return view('admin.inamsc.submissions_education');
    }

    public function literatureReviewPage() {
      return view('admin.inamsc.submissions_literature');
    }
    public function rppPage() {
      return view('admin.inamsc.submissions_research_poster');
    }

    public function publicPosterPage() {
      return view('admin.inamsc.submissions_publication_poster');
    }

    public function resendEmails() {
        $users = User::where('verified', 0)->get();
        foreach ($users as $u) {
            dispatch(new SendVerificationEmail($u));
        }
        // return 
    }

    public function getAccountPage()
    {
        $title = "Account Management";
        return view('admin.account.management', compact('title'));
    }

    public function getAccount()
    {
      return response()->json(['data' => USER::where('role',1)->get()]);
    }

    public function acceptAccount($id) {
      $user = USER::find($id);
      $user->update(['verified' => 1]);
      return response()->json(['message' => 'ok']);
    }

    public function getAccountSingle($id) {
      $user = USER::find($id);
      return response()->json(['user' => $user]);
    }
}
