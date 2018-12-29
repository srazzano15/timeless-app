<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ImportData;

class BatchBag extends Model
{
    protected $table = 'batch_bags';

    protected $fillable = [
        'batch_id',
        'bag_number',
        'flower_weight'
    ];

    /* public function bagMatch()
    {
        return $this->belongsTo('App\ImportData', 'bag_id', 'bag_number');
    } */
}
