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

    public function inamscSocialProgramme() {
        return view('inamsc-social-programme');
    }
}
