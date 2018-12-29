<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\ImportData;
use App\BatchBag;


class ReportExport implements FromCollection
{

    public function collection()
    {
        $rows = ImportData::with('bagMatch')->get();

        foreach($rows as $row)
        {
            if ($row->bag_match->batch_id != null)
            {
                $h = $row->bag_weight;
                $l = $row->bag_match->flower_weight;

                
            }
        }

        return $exportArray;
    }
}
