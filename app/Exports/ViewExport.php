<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\ImportData;
use App\BatchBag;
use Auth;

class ViewExport implements FromView
{

    public function view(): View
    {

        /* $rows = ImportData::with('bagMatch')->get()->toArray();
        $exportArray[] = array('Batch ID', 'Bag ID', 'Bag Weight', 'Flower Weight', 'Difference', 'Date Submitted'); */


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
        } */
        return view('admin.crud.inc.export_table', [
            'rows' => ImportData::with('bagMatch')->get(),
            'user' => Auth::user()
        ]);

    }
}
