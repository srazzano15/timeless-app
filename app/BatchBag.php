<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ImportData;
use Illuminate\Database\Eloquent\Relations;

class BatchBag extends Model
{
    protected $table = 'batch_bags';

    protected $fillable = [
        'batch_id',
        'package_id',
        'flower_weight'
    ];

    public function importMatch()
    {
        return $this->belongsTo('App\ImportData', 'bag_number', 'bag_id');
    }
}
