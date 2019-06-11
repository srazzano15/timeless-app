<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ImportData;
use DataTables;
use App\DataTables\ImportDataTable;
use App\BatchBag;
use App\CsvData;
use App\User;
use App\BatchSubmit;

class PagesController extends Controller
{
    public function index() 
    {
        return view('pages.index');
    }

    public function bagStats()
    {
        return view('reports.submitted_bags');
    }

    public function disparityReport()
    {
        return view('reports.disparity_report');
    }

    public function admin() 
    {
        // get current user
        $user = Auth::user();
        
        // get DB statistics
        $importCount = CsvData::count();
        $userCount = User::count();
        $bagCount = ImportData::count();
        $avgs = ImportData::has('bagMatch')->get();

        $rows = BatchSubmit::where('status', 'Stuffed')->simplePaginate(8);


        return view('admin.index', compact('user', 'rows', 'userCount', 'importCount', 'avgs', 'bagCount'));
    }
}
