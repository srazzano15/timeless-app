<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class SubmitBatch extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Validation Rules

            // static input validation rules
            'bnum' => 'required|unique:batch_submits,batch_id',
            'dfilled' => 'required|date',
            'cooler' => 'required|integer',
            'drun' => 'required|date',
            'submitter' => 'required|string',
            'totalFlowWeight' => 'required',
            'totalBatchWeight' => 'required',
            'status' => 'required',

            // bag/pillow validations
            'bag_number' => 'sometimes|required|string',
            'bag_weight' => 'sometimes|required',
            'flow_weight' => 'sometimes|required',
            'pillow' => 'sometimes|required',

        ];
    }
}
