@extends('layouts.app')

@section('content')
    @php
        $title = $project->name;
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            @include('project.nav')
            <div class="col-md-12 bg-white px-3 py-4">
                <div class="text-right">
                    <a href="{{ route('projects.edit', [$office, $project]) }}">
                        Edit
                    </a>

                </div>
                <div class="d-grid gap-3">
                    <div> <span class="text-bold">आयोजना सुरु भयको आ.ब. : </span>{{ $project->fiscalYear->fiscal_year }}
                    </div>
                    @if ($project->project_time_type)
                        <div> <span class="text-bold">आयोजनाको प्रकार : </span> <span
                                class="font-kalimati">{{ $project->project_time_type == 1 ? "बहुबर्षीय" : "एकवर्षीय" }}</span>
                        </div>
                    @endif
                    @if ($project->time_period)
                        <div> <span class="text-bold">प्रोजेक्ट समाप्ति समय : </span> <span
                                class="font-kalimati">{{ $project->time_period }} महिना</span>
                        </div>
                    @endif
                    @if ($project->approval_budget)
                        <div> <span class="text-bold">स्वीकृति बजेट : </span> <span
                                class="font-kalimati">रु.{{ $project->approval_budget }}/-</span>
                        </div>
                    @endif
                    @if ($project->agreement_date)
                        <div> <span class="text-bold">सम्झौता मिति : </span><span class="font-kalimati"
                                id="agreement_date_bs"></span>
                        </div>

                        <div> <span class="text-bold">सम्झौता रकम: </span><span class="font-kalimati">
                                {{ $project->tender_amount }}</span>
                        </div>
                    @else
                        <div>
                            <span class="text-bold">
                                सम्झौता भयको छैन
                            </span>
                        </div>
                    @endif
                    @if ($project->project_start_date)
                        <div> <span class="text-bold">आयोजना सुरु मिति: </span><span class="font-kalimati"
                                id="project_start_date_bs"></span>
                        </div>
                    @else
                        <div>
                            <span class="text-bold">आयोजना सुरु भयको छैन </span>
                        </div>
                    @endif
                    @if ($project->budget()->sum('budget') > 0)
                        <div> <span class="text-bold">विनियोजित बजेट : </span> <span
                                class="font-kalimati">रु.{{ $project->budget()->sum('budget') }}/-</span>
                        </div>
                    @endif
                    @if ($project->expenditure()->sum('expenditure') > 0)
                        <div> <span class="text-bold">हाल सम्मको कुल खर्च : </span> <span
                                class="font-kalimati">रु.{{ $project->expenditure()->sum('expenditure') }}/-</span>
                        </div>
                    @endif
                    @if ($project->population_to_be_benefited)
                        <div> <span class="text-bold">लाभाम्वित हुने जनसंख्या: </span><span
                                class="font-kalimati">{{ $project->population_to_be_benefited }}</span>
                        </div>
                    @endif
                    @if ($project->status)
                        <div> <span class="text-bold">आयोजनाको स्थिति:
                            </span><span>{{ $project->status == 1 ? 'सम्पन्न भइसकेको छ' : 'काम भइरहेको छ' }}</span>
                        </div>
                    @endif

                    @if ($project->status == 1)
                        <div> <span class="text-bold">आयोजना समाप्त मिति: </span><span class="font-kalimati"
                                id="project_completion_date_bs"></span>
                    @endif
                </div>
                {{-- @if ($project->physical_progress)
                    <div class="my-2">
                        <div class="text-center font-kalimati">हालसम्मको भौतिक प्रगति
                            {{ $project->physical_progress == null ? '0%' : $project->physical_progress . '%' }}</div>
                        <div class="progress" style="height: 30px;">
                            <div class="progress-bar font-kalimati" role="progressbar"
                                style="width: {{ $project->physical_progress }}%;"
                                aria-valuenow="{{ $project->physical_progress }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $project->physical_progress == null ? '' : $project->physical_progress . '%' }}</div>
                        </div>
                    </div>
                @endif --}}
                {{-- @if ($project->budget()->sum('budget') > 0)
                    <div class="my-2">
                        <div class="text-center font-kalimati">हालसम्मको आर्थिक प्रगति
                            रु.{{ $project->budget()->sum('budget') }}/- को
                            रु.{{ $project->expenditure()->sum('expenditure') }}/- को
                            {{ $expenditurePercentage = $project->budget()->sum('budget') ? round(($project->expenditure()->sum('expenditure') * 100) / $project->budget()->sum('budget'), 2) : '0' }}%
                        </div>
                        <div class="progress" style="height: 30px;">
                            <div class="progress-bar font-kalimati" role="progressbar"
                                style="width: {{ $expenditurePercentage }}%;" aria-valuenow="{{ $expenditurePercentage }}"
                                aria-valuemin="0" aria-valuemax="100">
                                {{ $expenditurePercentage == null ? '' : $expenditurePercentage . '%' }}</div>
                        </div>
                    </div>
                @endif --}}
                @if ($project->description)
                    <div>
                        <span class="text-bold">कैफियत</span>
                        <div>{!! $project->description !!}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
        document.getElementById('agreement_date_bs').innerHTML = NepaliFunctions.AD2BS(
            "{{ $project->agreement_date }}");
        document.getElementById('project_start_date_bs').innerHTML = NepaliFunctions.AD2BS(
            "{{ $project->project_start_date }}");
        document.getElementById('project_completion_date_bs').innerHTML = NepaliFunctions.AD2BS(
            "{{ $project->project_completion_date }}");
    </script>
@endpush
