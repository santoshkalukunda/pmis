@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="text-center py-3">{{ $title = $office->name . 'को आयोजनाहरु आयोजनाहरु' }}</h4>
        <div class="d-flex align-items-center mb-3">
            <x-project-filter :office="$office" />
            <div class="ml-auto d-flex gap-2">
                <a href="{{ route('projects.create', $office) }}" class="btn btn-success z-depth-0"><i
                        class="bi bi-plus-lg"></i> नयाँ दर्ता</a>
                <div>
                    <form action="{{ route('projects.excel', $office) }}" method="get">
                        @include('project.filter-input')
                        <button class="btn btn-secondary " type="submit">
                            <i class="bi bi-file-spreadsheet"></i> Export to Excel
                        </button>
                    </form>
                </div>
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
                                    <th>स्वीकृत लागत अनुमान</th>
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
                                            <td><a class=""
                                                    href="{{ route('projects.show', [$office, $project]) }}">{{ $project->name }}
                                                </a>
                                            </td>
                                            <td>{{ $project->projectType->name }}</td>
                                            <td>{{ $project->district }}</td>
                                            <td>{{ $project->municipality }}</td>
                                            <td>{{ $project->ward_no }}</td>
                                            <td>{{ $project->fiscalYear->fiscal_year }}</td>
                                            <td class="text-right">{{ $project->budget }}</td>
                                            <td class="text-right">{{ $project->population_to_be_benefited }}</td>
                                            <td>
                                                <div id="agreement_date-{{ $project->id }}"></div>
                                            </td>
                                            <td class="text-right">{{ $project->tender_amount }}</td>
                                            <td>
                                                <div id="project_start_date-{{ $project->id }}"></div>
                                            </td>
                                            <td class="text-right">{{ $project->physical_progress }}</td>
                                            <td>{{ $project->status == true ? 'सम्पन्न भइसकेको छ' : 'काम भइरहेको छ' }}</td>
                                            <td>
                                                <div id="project_completion_date-{{ $project->id }}"></div>
                                            </td>

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
                                                            <form
                                                                action="{{ route('projects.destroy', [$office, $project]) }}"
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
                                        @push('scripts')
                                            <script>
                                                $(document).ready(function() {
                                                    agreement_date = NepaliFunctions.AD2BS("{{ $project->agreement_date }}");
                                                    document.getElementById("agreement_date-{{ $project->id }}").innerHTML = agreement_date;

                                                    project_start_date = NepaliFunctions.AD2BS("{{ $project->project_start_date }}");
                                                    document.getElementById("project_start_date-{{ $project->id }}").innerHTML = project_start_date;

                                                    project_completion_date = NepaliFunctions.AD2BS("{{ $project->project_completion_date }}");
                                                    document.getElementById("project_completion_date-{{ $project->id }}").innerHTML =
                                                        project_completion_date;
                                                });
                                            </script>
                                        @endpush
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
