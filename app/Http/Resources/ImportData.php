<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImportData extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        /* return [
            'id' => $this->id,
            'batch_id' => $this->batch_id,
            'bag_id' => $this->bag_id,
            'bag_weight' => $this->bag_weight,
            'flower_weight' => $this->flower_weight,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ]; */
    }
}
