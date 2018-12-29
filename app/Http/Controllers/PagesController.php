<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ImportData;


class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function admin() {
        $user = Auth::user();
        $rows = ImportData::with('bagMatch')->where('batch_id', '=', null)->get();
        return view('admin.index', compact('user', 'rows'));
    }
}
