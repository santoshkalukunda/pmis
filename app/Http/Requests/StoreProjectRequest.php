<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required',
            'district' => 'nullable',
            'municipality' => 'nullable',
            'ward_no' => 'nullable',
            'fiscal_year_id' => 'nullable',
            'project_type_id' => 'nullable',
            'budget_subtitle' => 'nullable',
            'budget' => 'required',
            'expenditure_subtitle' => 'nullable',
            'population_to_be_benefited' => 'nullable',
            'agreement_date' => 'nullable|date',
            'tender_amount' => 'nullable',
            'project_start_date' => 'nullable|date',
            'physical_progress' => 'nullable',
            'status' => 'nullable|boolean',
            'project_completion_date' => 'nullable|date',
            'description' => 'nullable',
        ];
    }
}
