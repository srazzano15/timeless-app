<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ImportData;
use DataTables;
use App\DataTables\ImportDataTable;
use App\BatchBag;
//use Illuminate\Database\Eloquent\Builder;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    /* public function adminIndex()
    {
        return view('admin.index');
    } */
    
    public function admin() {
        $user = Auth::user();
        /* $rows = ImportData::with(['bagMatch' => function ($query) {
            $query->whereNull('bag_number');
        }])->get();    */        
        /* $rows = $rows->filter(function($row) {
            return $row->bagMatch['batch_id'] == null;
        }); */
        $rows = ImportData::doesntHave('bagMatch')->simplePaginate(8);

        //dd($rows);
        return view('admin.index', compact('user', 'rows'));
    }
}
