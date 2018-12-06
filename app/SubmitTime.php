<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmitTime extends Model
{
    protected $table = 'submit_times';

    protected $fillable = [
        'batch_id',
        'res_temp_first',
        'soak_time_first',
        'aggitation_time_first',
        'exit_temp_first',
        'res_temp_scnd',
        'soak_time_scnd',
        'aggitation_time_scnd',
        'exit_temp_scnd',
        'total_time'
    ];
}
