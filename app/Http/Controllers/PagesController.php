<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function extraction() {

        $user = Auth::user();

        return view('pages.extraction', compact('user'));

        // return view('pages.extraction');
    }

    public function search() {
        return view('pages.search');
    }


}
