<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function extraction() {
        return view('pages.extraction');
    }

    public function search() {
        return view('pages.search');
    }


}
