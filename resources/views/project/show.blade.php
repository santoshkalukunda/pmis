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
                    <div> <span class="text-bold">स्वीकृति लागत अनुमान : </span>रु. {{ $project->budget }}/-</div>
                    <div> <span class="text-bold">सम्झौता मिति : </span><span id="agreement_date_bs"></span> </div>
                    <div> <span class="text-bold">सम्झौता रकम: </span><span> {{ $project->tender_amount }}</span> </div>
                    <div> <span class="text-bold">आयोजना सुरु मिति: </span><span id="project_start_date_bs"></span> </div>
                    <div> <span class="text-bold">लाभाम्वित हुने जनसंख्या: </span><span>{{$project->population_to_be_benefited}}</span> </div>
                    <div> <span class="text-bold">आयोजनाको स्थिति:
                        </span><span>{{ $project->status == 1 ? 'सम्पन्न भइसकेको छ' : 'काम भइरहेको छ' }}</span> </div>
                    <div> <span class="text-bold">आयोजना समाप्त मिति: </span><span id="project_completion_date_bs"></span>
                    </div>
                    <div class="my-2">
                        <div class="text-center">हालसम्मको भौतिक प्रगति {{$project->physical_progress == null ? "0%" : $project->physical_progress ."%"}}</div>
                        <div class="progress" style="height: 30px;">
                            <div class="progress-bar" role="progressbar" style="width: {{ $project->physical_progress }}%;"
                                aria-valuenow="{{ $project->physical_progress }}" aria-valuemin="0" aria-valuemax="100">
                                {{$project->physical_progress == null ? "" : $project->physical_progress ."%"}}</div>
                        </div>
                    </div>
                    <div>
                        <span class="text-bold">कैफियत</span>
                        <div>{!! $project->description !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#description').summernote();
            document.getElementById('agreement_date_bs').innerHTML = NepaliFunctions.AD2BS(
                "{{ $project->agreement_date }}");
            document.getElementById('project_start_date_bs').innerHTML = NepaliFunctions.AD2BS(
                "{{ $project->project_start_date }}");
            document.getElementById('project_completion_date_bs').innerHTML = NepaliFunctions.AD2BS(
                "{{ $project->project_completion_date }}");

        });
    </script>
@endpush
