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
            /* 'bnum' => 'required|unique:batch_submits,batch_id',
            'dfilled' => 'required|date',
            'cooler' => 'required|integer',
            'drun' => 'required|date',
            'submitter' => 'required|string',
            'kegsFilled' => 'required_if:status,complete|nullable',
            'totalFlowWeight' => 'required',
            'totalBatchWeight' => 'required',
            'status' => 'required',

            // temp/time validation
            'split' => 'required_if:status,complete',
            'totTime' => 'required_if:status,complete',
            'resTempFirst' => 'required_if:status,complete',
            'exitTempFirst' => 'required_if:status,complete',
            'resTempScnd' => 'required_if:status,complete',
            'exitTempScnd' => 'required_if:status,complete',

            // bag/pillow validations
            'bag_number' => 'sometimes|required|string',
            'bag_weight' => 'sometimes|required',
            'flow_weight' => 'sometimes|required',
            'pillow' => 'sometimes|required', */

        ];
    }
}
