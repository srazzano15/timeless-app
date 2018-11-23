<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchSubmit extends Model
{
    protected $fillable = [
        'batch_id',
        'date_filled',
        'cooler',
        'date_run'
    ];
}
