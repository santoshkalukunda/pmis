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
            'district' => 'required',
            'municipality' => 'required',
            'ward_no' => 'required',
            'fiscal_year_id' => 'required',
            'project_type_id' => 'required',
            'budget_source_id' => 'required',
            'budget_subtitle' => 'nullable',
            'budget' => 'required',
            'expenditure_type_id' => 'required',
            'expenditure_subtitle' => 'required',
            'population_to_be_benefited' => 'required',
            'agreement_date' => 'nullable|date',
            'tender_amount' => 'nullable',
            'project_start_date' => 'nullable|date',
            'physical_progress' => 'nullable',
            'status' => 'required',
            'project_completion_date' => 'nullable|date',
            'description' => 'nullable',
        ];
    }
}
