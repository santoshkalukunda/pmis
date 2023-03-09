<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBudgetRequest extends FormRequest
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
            'date' => 'required|date',
            'budget_source_id' => 'required',
            'budget_subtitle' => 'nullable',
            'budget' => 'required',
        ];
    }
}
