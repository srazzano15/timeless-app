<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'kegsFilled' => 'required_if:status,Complete',
            'totalFlowWeight' => 'required',
            'totalPillowWeight' => 'required',
            'status' => 'required',

            // temp/time validation
            'split[0]' => 'required_if:status,Complete',
            'split[1}' => 'required_if:status,Complete',
            'split[2]' => 'required_if:status,Complete',
            'split[3]' => 'required_if:status,Complete',
            'totTime' => 'required_if:status,Complete',
            'resTempFirst' => 'required_if:status,Complete|numeric',
            'exitTempFirst' => 'required_if:status,Complete|numeric',
            'resTempScnd' => 'required_if:status,Complete|numeric',
            'exitTempScnd' => 'required_if:status, Complete|numeric'

        ];
    }
}
