<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\BatchBag;
use App\ImportData;
use Excel;
use App\Exports\ReportExport;
use App\Exports\ViewExport;

class ExportsController extends Controller
{
    public function exportView()
    {
        $user = Auth::user();
        $rows = ImportData::has('bagMatch')->get();
        return view('admin.crud.edit', compact('rows', 'user'));

    }

    public function export()
    {
        return Excel::download(new ViewExport, 'bag_report.xlsx');
    }
}
