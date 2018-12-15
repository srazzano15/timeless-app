<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchBag extends Model
{
    protected $table = 'batch_bags';

    protected $fillable = [
        'batch_id',
        'bag_number',
        'bag_weight',
        'flower_weight'
    ];

    /* public function bag_submission()
    {
        return $this->belongsTo('App\BatchSubmit');
    } */
}
