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
        'cooler'
    ];

    /* protected $dates = [
        'date_filled',
        'date_run'
    ]; */
}

