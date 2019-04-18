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

    /**
     * Set the values to be UC on first word and no spaces before saving to DB
     * 
     * @param string $value
     * @return void
     */
    public function setPackageIdAttribute($value)
    {
        $this->attributes['package_id'] = str_replace(' ', '', ucwords(strtolower($value)));
    }

    public function importMatch()
    {
        return $this->belongsTo('App\ImportData', 'bag_number', 'bag_id');
    }
}
