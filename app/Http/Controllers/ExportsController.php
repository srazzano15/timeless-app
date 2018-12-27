<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\BatchBag;
use App\ImportData;
use Excel;


class ExportsController extends Controller
{
    public function exportView()
    {
        $user = Auth::user();
        $rows = ImportData::with('bagMatch')->get();
        return view('admin.crud.edit', compact('rows', 'user'));

    }

    public function export(Request $request)
    {
        $rows = ImportData::with('bagMatch')->get()->toArray();

        $exportArray[] = array('Batch ID', 'Bag ID', 'Bag Weight', 'Flower Weight', 'Difference', 'Date Submitted');

        foreach($rows as $row)
        {
            if ($row->bagMatch['batch_id'] != null)
            {
                $h = $row->bag_weight;
                $l = ($row->bagMatch['flower_weight']);

                $exportArray[] = array(
                'Batch ID' => $row->bagMatch['batch_id'],
                'Bag ID' => $row->bag_id,
                'Bag Weight' => $h,
                'Flower Weight' => $l,
                'Difference' => ($h - $l),
                'Date Submitted' => $row->created_at
                );
            }
        }
        Excel::download($exportArray, 'batch_master.xlsx');
    }
}
