<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PillowWeight extends Model
{
    protected $table = 'pillow_weights';


    protected $fillable = [
        'batch_id',
        'pillow'
    ];
}
