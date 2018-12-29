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
        $rows = ImportData::with('bagMatch')->get();
        return view('admin.crud.edit', compact('rows', 'user'));

    }

    public function export()
    {
        return Excel::download(new ViewExport, 'bag_report.xlsx');
        /* $rows = ImportData::with('bagMatch')->get()->toArray();

        $exportArray[] = array('Batch ID', 'Bag ID', 'Bag Weight', 'Flower Weight', 'Difference', 'Date Submitted'); */

        /* foreach ($rows as $row)
            if ($row['bag_match']['batch_id'] != null)
            {
                dd($row);
            } */


        /* foreach($rows as $row)
        {
            if ($row['bag_match']['batch_id'] != null)
            {
                $h = $row['bag_weight'];
                $l = ($row['bag_match']['flower_weight']);

                $exportArray[] = array(
                'Batch ID' => $row['bag_match']['batch_id'],
                'Bag ID' => $row['bag_id'],
                'Bag Weight' => $h,
                'Flower Weight' => $l,
                'Difference' => ($h - $l),
                'Date Submitted' => $row['created_at']
                );
            }
        }
        //dd($exportArray);
        return Excel::download($exportArray, 'batch_master.xlsx'); */
    }
}
