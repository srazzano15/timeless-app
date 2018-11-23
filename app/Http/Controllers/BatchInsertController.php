<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class BatchInsertController extends Controller
{
    public function store(Request $request) {

        $insert = new Post;
        $insert = $request->input('test');

    }


}
