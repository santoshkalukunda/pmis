@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="text-center py-3">{{ $title = $office->name . 'को आयोजनाहरु आयोजनाहरु' }}</h4>
        <div class="d-flex align-items-center mb-3">
            <div class="ml-auto">
                <a href="{{ route('projects.create', $office) }}" class="btn btn-success z-depth-0">नयाँ दर्ता</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">आयोजनाहरु</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped text-sm">
                                <thead style="white-space: nowrap;">
                                    <th>आयोजनाको नाम</th>
                                    <th>आयोजनाको किसिम</th>
                                    <th>जिल्ला</th>
                                    <th>स्थानिय तह</th>
                                    <th>वड नम्बर</th>
                                    <th>आयोजना सुरु भयको आ.ब.</th>
                                    <th>बजेट स्रोत</th>
                                    <th>बजेट उपशीर्षक न.(ब.उ.शी.न.)</th>
                                    <th>स्वीकृत लागत अनुमान</th>
                                    <th>खर्चको किसिम</th>
                                    <th>खर्च उपशीर्षक न.(ख.उ.शी.न.)</th>
                                    <th>लाभाम्वित हुने जनसंख्या</th>
                                    <th>सम्झौता मिति</th>
                                    <th>सम्झौता रकम</th>
                                    <th>आयोजना सुरु मिति</th>
                                    <th>हालसम्मको भौतिक प्रगति</th>
                                    <th>आयोजनाको स्थिति</th>
                                    <th>आयोजना समाप्त मिति</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($projects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->projectType->name }}</td>
                                            <td>{{ $project->district }}</td>
                                            <td>{{ $project->municipality }}</td>
                                            <td>{{ $project->ward_no }}</td>
                                            <td>{{ $project->fiscalYear->fiscal_year }}</td>
                                            <td>{{ $project->budgetSource->name }}</td>
                                            <td>{{ $project->budget_subtitle }}</td>
                                            <td class="text-right">{{ $project->budget }}</td>
                                            <td>{{ $project->expenditureType->name }}</td>
                                            <td>{{ $project->expenditure_subtitle }}</td>
                                            <td class="text-right">{{ $project->population_to_be_benefited }}</td>
                                            <td>{{ $project->agreement_date }}</td>
                                            <td class="text-right">{{ $project->tender_amount }}</td>
                                            <td>{{ $project->project_start_date }}</td>
                                            <td class="text-right">{{ $project->physical_progress }}</td>
                                            <td>{{ $project->status == true ? 'सम्पन्न भइसकेको छ' : 'काम भइरहेको छ' }}</td>
                                            <td>{{ $project->project_completion_date }}</td>

                                            <td class="text-center">
                                                <div class="">
                                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                        <li><a class="dropdown-item text-center btn"
                                                                href="{{ route('projects.show', [$office, $project]) }}">Show</a>
                                                        </li>
                                                        <li><a class="dropdown-item text-center btn"
                                                                href="{{ route('projects.edit', [$office, $project]) }}">Edit</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('projects.destroy', [$office, $project]) }}"
                                                                method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="dropdown-item text-center btn form-control"
                                                                    type="submit"
                                                                    onclick="return confirm('Are you sure to delete?')">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="20">
                                                <div class="text-red text-center">
                                                    कुनै पनि डाटा उपलब्ध छैन
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection