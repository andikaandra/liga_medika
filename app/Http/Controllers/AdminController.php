<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lomba;

class AdminController extends Controller
{
    public function index()
    {
        $lombas = Lomba::all();
        return view('admin.index', ['lombas' => $lombas]);
    }
}
