<?php

namespace App\Imports;

use App\ImportData;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ImportData([
            'batch_id' => $row[0],
            'bag_id' => str_replace(' ', '', ucwords(strtolower($row[1]))),
            'bag_weight' => str_replace(',','',$row[3]),
            'flower_weight' => str_replace(',','',$row[2])
        ]);
    }
}
