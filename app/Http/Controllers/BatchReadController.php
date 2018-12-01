<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BatchSubmit;
use Carbon\Carbon;

class BatchReadController extends Controller
{
    public function tableRead() {


        $submits = BatchSubmit::all();

        return view('pages.home', compact('submits'));


    }
}
