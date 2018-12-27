<?php

namespace App\Http\Controllers;

use App\ImportData;
use Auth;
use App\Http\Requests\CsvImportRequest;
use App\CsvData;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;




class ImportCsvController extends Controller
{

    public function getImport()
    {
        $user = Auth::user();
        return view('admin.crud.import', compact('user'));
    }



    public function parseImport(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();
        $user = Auth::user();
        $data = array_map('str_getcsv', file($path));
        $csv_data_file = CsvData::create([
            'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
            'csv_header' => $request->has('header'),
            'csv_data' => json_encode($data)
        ]);

        $csv_data = array_slice($data, 0, 2);

        return view('admin.crud.import_fields', compact('csv_data', 'csv_data_file', 'user'));
    }

    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        $request->fields = array_flip($request->fields);
        foreach ($csv_data as $row) {
            $import = new ImportData();
            foreach (config('app.db_fields') as $index => $field) {
                $import->$field = $row[$request->fields[$index]];
            }
            $import->save();
        }

        return redirect('/admin');
    }
}
