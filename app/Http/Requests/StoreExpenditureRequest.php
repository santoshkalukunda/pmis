<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenditureRequest extends FormRequest
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
            'date' => 'required',
            'expenditure_type_id' => 'required',
            'expenditure_subtitle' => 'nullable',
            'expenditure' => 'required',
            'remarks' => 'required',
        ];
    }
}
