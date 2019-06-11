<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchSubmit extends Model
{
    protected $table = 'batch_submits';

    protected $fillable = [
        'user_id',
        'batch_id',
        'date_filled',
        'cooler',
        'kegs_filled',
        'submitter',
        'status',
        'total_flower_weight',
        'total_batch_weight',
    ];

     protected $dates = [
        'date_filled',
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

    // pre-format data as it is going into DB for uniformity
    public function setBatchIdAttribute($value)
    {
        $this->attributes['batch_id'] = str_replace(' ', '', strtoupper($value));
    }
}

