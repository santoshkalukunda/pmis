<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEstimateRequest extends FormRequest
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
            'fiscal_year_id' => 'required',
            'name' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
            'rate' => 'required',
            'yearly_target_quantity' => 'nullable',
            'first_quarterly_target_quantity' => 'nullable',
            'second_quarterly_target_quantity' => 'nullable',
            'third_quarterly_target_quantity' => 'nullable',
            'fourth_quarterly_target_quantity' => 'nullable',
        ];
    }
}
