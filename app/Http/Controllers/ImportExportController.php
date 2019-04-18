<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function getImport()
    {
        return view('admin.crud.import');
    }
    public function import()
    {
        Excel::import(new CsvImport, request()->file('file'));

        return back()->with('success', 'File Successfully Imported');
    }
}
