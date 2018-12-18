<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\YourExport;
use Maatwebsite\Excel\Facades\Excel;


class ImportCsvController extends Controller
{

        public function export()
        {
            return Excel::download(new YourExport, 'users.xlsx');
        }

        public function import()
        {
            return Excel::import(new YourImport, 'users.xlsx');
        }
    
}
