<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\ImportData;


class Import implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row)
        {
            ImportData::create([
                'bag_id' => $row[0],
                'bag_weight' => $row[1],
            ]);
        }
    }
}
