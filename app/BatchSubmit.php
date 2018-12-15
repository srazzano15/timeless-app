<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchSubmit extends Model
{
    protected $table = 'batch_submits';

    protected $fillable = [
        'batch_id',
        'date_filled',
        'date_run',
        'cooler',
        'kegs_filled',
        'submitter',
        'status',
        'total_flower_weight',
        'total_batch_weight',
    ];

     protected $dates = [
        'date_filled',
        'date_run'
    ];


    public function bags()
    {
        return $this->hasMany('App\BatchBag', 'batch_id', 'batch_id');
    }

    public function time()
    {
        return $this->hasOne('App\SubmitTime', 'batch_id', 'batch_id');
    }

    public function pillows()
    {
        return $this->hasMany('App\PillowWeight', 'batch_id', 'batch_id');
    }
}

