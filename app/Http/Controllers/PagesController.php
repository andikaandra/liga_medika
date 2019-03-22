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
}
