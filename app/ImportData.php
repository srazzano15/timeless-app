<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BatchBag;
use Illuminate\Database\Eloquent\Collection;

class ImportData extends Model
{
    protected $table = 'import_export_csv';

    public $fillable = [
        'batch_id',
        'bag_id',
        'bag_weight',
        'flower_weight',
    ];

    public function setBatchIdAttribute($value)
    {
        $this->attributes['batch_id'] = str_replace(' ', '', strtoupper($value));
    }

    public function setBagIdAttribute($value)
    {
        $this->attributes['bag_id'] = str_replace(' ', '', $value);
        $this->attributes['bag_id'] = str_replace('trim', 'Trim', $value);
        $this->attributes['bag_id'] = str_replace('timeless', 'Timeless', $value);
        $this->attributes['bag_id'] = str_replace('--', '-', $value);
        $this->attributes['bag_id'] = str_replace('extract', 'Extract', $value);
    }

    public function bagMatch()
    {
        return $this->hasOne('App\BatchBag', 'package_id', 'bag_id');
    }

}
