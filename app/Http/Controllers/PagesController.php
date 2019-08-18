<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('index');
    }

    public function inamsc() {
        return view('inamsc');
    }

    public function inamscAmbassador() {
        return view('ambassadors');
    }

    public function imarc() {
        return view('imarc');
    }

    public function imsso() {
        return view('imsso');
    }

    public function hfgm() {
        return view('hfgm');
    }

    public function inamscSocialProgramme() {
        return view('social-programme');
    }

    public function gallery() {
        return view('gallery');
    }

    public function faq() {
        return view('faq');
    }

    public function generalGuidelinesImsso()
    {
        return response()->download(public_path('guidelines/imsso/imsso_2019_guidelines.pdf'));
    }

    public function basketballGuidelines()
    {
        return response()->download(public_path('guidelines/imsso/basketball_guidelines.pdf'));
    }

    public function miniSoccerGuidelines()
    {
        return response()->download(public_path('guidelines/imsso/mini_soccer_guidelines.pdf'));
    }

    public function downloadMedicalSop()
    {
        return response()->download(public_path('guidelines/imsso/medical_sop.pdf'));
    }
}
