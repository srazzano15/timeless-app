<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BatchBag;

class ImportData extends Model
{
    protected $table = 'import_export_csv';

    public $fillable = [
        'batch_id',
        'bag_id',
        'bag_weight',
        'flower_weight'
    ];


    public function bagMatch()
    {
        return $this->hasOne('App\BatchBag', 'bag_number', 'bag_id');
    }

}
