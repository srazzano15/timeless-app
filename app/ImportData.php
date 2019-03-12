<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BatchBag;
use Illuminate\Database\Eloquent\Collection;

class ImportData extends Model
{
    protected $table = 'import_export_csv';

    public $fillable = [
        'bag_id',
        'bag_weight',
        'flower_weight',
        'product_weight'
    ];


    public function bagMatch()
    {
        return $this->hasOne('App\BatchBag', 'package_id', 'bag_id');
    }

}
