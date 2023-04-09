<?php

namespace App\Exports;

use App\Models\Office;
use App\Models\Project;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ProjectExport implements FromCollection, WithHeadings, WithMapping
{
    public $request;
    public $office;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct(Office $office, $request)
    {
        $this->office = $office;
        $this->request = $request;
    }

    public function headings(): array
    {
        return [
            'आयोजनाको नाम',
             'कार्यालय', 
             'आयोजनाको किसिम', 
             'जिल्ला', 
             'स्थानिय तह',
             'वड नम्बर', 
             'आयोजना सुरु भयको आ.ब.', 
             'स्वीकृत लागत अनुमान', 
             'अपेक्षित उपलब्धि', 
             'लाभाम्वित हुने जनसंख्या', 
             'सम्झौता रकम', 
             'हालसम्मको भौतिक प्रगति',
             'हालसम्मको कुल विनियोजित बजेट', 
             'हालसम्मको कुल खर्च', 
             'हालको मुख्य उपलब्धि',
             'हालको मुख्य सूचक',
             'चालु आ. ब.को कुल विनियोजित बजेट', 
             'चालु आ. ब.को कुल खर्च', 
             'चालु आ. ब.मा हुने मुख्य उपलब्धि', 
             'चालु आ. ब.मा हुने मुख्य सूचक', 
             'आयोजनाको स्थिति', 
             'कैफियत'];
    }

    public function collection()
    {
        $projects = new Project();

        if ($this->request->has('district')) {
            if ($this->request->district != null) {
                $projects = $projects->where('district', $this->request->district);
            }
        }
        if ($this->request->has('municipality')) {
            if ($this->request->municipality != null) {
                $projects = $projects->where('municipality', $this->request->municipality);
            }
        }
        if ($this->request->has('fiscal_year_id')) {
            if ($this->request->fiscal_year_id != null) {
                $projects = $projects->where('fiscal_year_id', $this->request->fiscal_year_id);
            }
        }
        if ($this->request->has('project_type_id')) {
            if ($this->request->project_type_id != null) {
                $projects = $projects->where('project_type_id', $this->request->project_type_id);
            }
        }
        if ($this->request->has('status')) {
            if ($this->request->status != null) {
                $projects = $projects->where('status', $this->request->status);
            }
        }

        if ($this->request->has('agreement')) {
            if ($this->request->agreement == true) {
                $projects = $projects->whereNotNull('agreement_date');
            }else{
                $projects = $projects->where('agreement_date', null);
            }
        }
        if ($this->request->has('name')) {
            if ($this->request->name != null) {
                $projects = $projects->where('name', 'LIKE', "$this->request->name%");
            }
        }
        return $projects = $projects
            ->where('office_id', $this->office->id)
            ->orderBy('fiscal_year_id')
            ->latest()
            ->get();
    }
    public function map($projects): array
    {
        return [
            $projects->name,
            $projects->office->name,
            $projects->projectType->name ?? "",
            $projects->district,
            $projects->municipality,
            $projects->ward_no,
            $projects->fiscalYear->fiscal_year,
            $projects->approval_budget,
            implode(
                ', ',
                $projects
                    ->acheivement()
                    ->pluck('name')
                    ->toArray(),
            ),
            $projects->population_to_be_benefited,
            $projects->tender_amount,
            $projects->physical_progress,
            
            $projects->budget()->sum('budget'),
            $projects->expenditure()->sum('expenditure'),
            implode(
                ', ',
                $projects
                    ->acheivement()
                    ->where('status', 1)
                    ->pluck('name')
                    ->toArray(),
            ),
            implode(
                ', ',
                $projects
                    ->indicator()
                    ->where('status', 1)
                    ->pluck('name')
                    ->toArray(),
            ),
            $this->request->has('fiscal_year_id')
            ? $projects
                ->budget()
                ->where('fiscal_year_id', $this->request->fiscal_year_id)
                ->sum('budget')
            : $projects
                ->budget()
                ->where('fiscal_year_id', Session::get('active_fiscal_year'))
                ->sum('budget'),
            $this->request->has('fiscal_year_id')
                ? $projects
                    ->expenditure()
                    ->where('fiscal_year_id', $this->request->fiscal_year_id)
                    ->sum('expenditure')
                : $projects
                    ->expenditure()
                    ->where('fiscal_year_id', Session::get('active_fiscal_year'))
                    ->sum('expenditure'),
            $this->request->has('fiscal_year_id') ? implode(
                ', ',
                $projects
                    ->acheivement()
                    ->where('fiscal_year_id', $this->request->fiscal_year_id)
                    ->where('status', 0)
                    ->pluck('name')
                    ->toArray(),
            ) : implode(
                ', ',
                $projects
                    ->acheivement()
                    ->where('fiscal_year_id', Session::get('active_fiscal_year'))
                    ->where('status', 0)
                    ->pluck('name')
                    ->toArray(),
            ),
            $this->request->has('fiscal_year_id') ? implode(
                ', ',
                $projects
                    ->indicator()
                    ->where('status', 0)
                    ->pluck('name')
                    ->toArray(),
            ) : implode(
                ', ',
                $projects
                    ->indicator()
                    ->where('fiscal_year_id', Session::get('active_fiscal_year'))
                    ->where('status', 0)
                    ->pluck('name')
                    ->toArray()),
            $projects->status == 1 ? 'सम्पन्न भइसकेको छ' : 'काम भइरहेको छ',
            strip_tags($projects->description),
        ];
    }
}
