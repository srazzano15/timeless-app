<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportData extends Model
{
    protected $table = 'import_export_csv';
    
    public $fillable = [
        'bag_id',
        'bag_weight',
    ];
}
