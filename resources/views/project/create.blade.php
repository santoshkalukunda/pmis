@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="d-flex align-items-center mb-3">
            <div class="ml-auto">
                <a href="{{ route('projects.offices') }}" class="btn btn-success z-depth-0">Back</a>
            </div>
        </div> --}}
        <h4 class="text-center py-3">{{ $office->name }}मा नयाँ आयोजना दर्ता</h4>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $title = 'नयाँ आयोजना' }}</div>
                    <div class="card-body">
                        <form
                            action="{{ $project->id ? route('projects.update', [$office, $project]) : route('projects.store', $office) }}"
                            method="post">
                            @csrf
                            @if ($project->id)
                                @method('put')
                            @endif
                            <div class="row">
                                <livewire:project-municipality :project="$project" />
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="ward_no" class="form-label required">वडा नम्बर</label>
                                        <input type="number" min="1" name="ward_no"
                                            class="form-control @error('ward_no') is-invalid @enderror"
                                            value="{{ old('ward_no', $project->ward_no) }}" id="ward_no"
                                            aria-describedby="ward_no">
                                        <div class="invalid-feedback">
                                            @error('ward_no')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <livewire:project-active-fiscal-year :fiscalYear="$project->fiscal_year_id" />
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label required">आयोजनाको नाम</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $project->name) }}" id="name"
                                            aria-describedby="name">
                                        <div class="invalid-feedback">
                                            @error('name')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="project_type_id" class="form-label required">आयोजनाको किसिम</label>
                                        <select name="project_type_id"
                                            class="form-control @error('project_type_id') is-invalid @enderror"
                                            id="project_type_id" aria-describedby="project_type_id">
                                            <option value="">आयोजनाको किसिम छान्नुहोस्</option>
                                            @foreach ($projectTypes as $projectType)
                                                <option value="{{ $projectType->id }}"
                                                    {{ $projectType->id == $project->project_type_id ? 'selected' : '' }}>
                                                    {{ $projectType->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('project_type_id')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="budget" class="form-label required">स्वीकृति लागत अनुमान</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="budget">रु.</span>
                                        <input type="number" min="1" name="budget"
                                            class="form-control @error('budget') is-invalid @enderror"
                                            value="{{ old('budget', $project->budget) }}" id="budget"
                                            aria-describedby="budget">
                                        <div class="invalid-feedback">
                                            @error('budget')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="expenditure_type_id" class="form-label required">खर्चको किसिम</label>
                                        <select name="expenditure_type_id"
                                            class="form-control @error('expenditure_type_id') is-invalid @enderror"
                                            id="expenditure_type_id" aria-describedby="expenditure_type_id">
                                            <option value="">खर्चको किसिम छान्नुहोस्</option>
                                            @foreach ($expenditureTypes as $expenditureType)
                                                <option value="{{ $expenditureType->id }}"
                                                    {{ $expenditureType->id == $project->expenditure_type_id ? 'Selected' : '' }}>
                                                    {{ $expenditureType->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('expenditure_type_id')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="expenditure_subtitle" class="form-label required">खर्च उपशीर्षक
                                        न.(ख.उ.शी.न.)</label>
                                    <div class="input-group mb-3">
                                        {{-- <span class="input-group-text" id="expenditure_subtitle">रु.</span> --}}
                                        <input type="text" name="expenditure_subtitle"
                                            class="form-control @error('expenditure_subtitle') is-invalid @enderror"
                                            value="{{ old('expenditure_subtitle', $project->expenditure_subtitle) }}"
                                            id="expenditure_subtitle" aria-describedby="expenditure_subtitle">
                                        <div class="invalid-feedback">
                                            @error('expenditure_subtitle')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="population_to_be_benefited" class="form-label required">लाभाम्वित हुने
                                        जनसंख्या</label>
                                    <div class="input-group mb-3">
                                        {{-- <span class="input-group-text" id="population_to_be_benefited">रु.</span> --}}
                                        <input type="number" min="1" name="population_to_be_benefited"
                                            class="form-control @error('population_to_be_benefited') is-invalid @enderror"
                                            value="{{ old('population_to_be_benefited', $project->population_to_be_benefited) }}"
                                            id="population_to_be_benefited" aria-describedby="population_to_be_benefited">
                                        <div class="invalid-feedback">
                                            @error('population_to_be_benefited')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="agreement_date" class="form-label required">सम्झौता मिति</label>
                                    <div class="input-group mb-3">
                                        <input type="text"
                                            class="form-control @error('agreement_date_bs') is-invalid @enderror"
                                            value="{{ old('agreement_date_bs', $project->agreement_date_bs) }}"
                                            id="agreement_date_bs" aria-describedby="agreement_date_bs"
                                            placeholder="YYYY-MM-DD">
                                        <input type="text" name="agreement_date"
                                            class="form-control @error('agreement_date') is-invalid @enderror"
                                            value="{{ old('agreement_date', $project->agreement_date) }}"
                                            id="agreement_date" aria-describedby="agreement_date" hidden>
                                        <div class="invalid-feedback">
                                            @error('agreement_date_bs')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="tender_amount" class="form-label required">सम्झौता रकम</label>
                                    <div class="input-group mb-3">
                                        {{-- <span class="input-group-text" id="tender_amount">रु.</span> --}}
                                        <input type="number" min="1" name="tender_amount"
                                            class="form-control @error('tender_amount') is-invalid @enderror"
                                            value="{{ old('tender_amount', $project->tender_amount) }}"
                                            id="tender_amount" aria-describedby="tender_amount">
                                        <div class="invalid-feedback">
                                            @error('tender_amount')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="project_start_date" class="form-label required">आयोजना सुरु मिति</label>
                                    <div class="input-group mb-3">
                                        {{-- <span class="input-group-text" id="project_start_date">रु.</span> --}}
                                        <input type="text"
                                            class="form-control @error('project_start_date_bs') is-invalid @enderror"
                                            value="{{ old('project_start_date_bs', $project->project_start_date_bs) }}"
                                            id="project_start_date_bs" aria-describedby="project_start_date_bs"
                                            placeholder="YYYY-MM-DD">

                                        <input type="text" name="project_start_date"
                                            class="form-control @error('project_start_date') is-invalid @enderror"
                                            value="{{ old('project_start_date', $project->project_start_date) }}"
                                            id="project_start_date" aria-describedby="project_start_date" hidden>
                                        <div class="invalid-feedback">
                                            @error('project_start_date_bs')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="physical_progress" class="form-label">हालसम्मको भौतिक प्रगति (%)</label>
                                    <div class="input-group mb-3">
                                        <input type="number" min="1" name="physical_progress"
                                            class="form-control @error('physical_progress') is-invalid @enderror"
                                            value="{{ old('physical_progress', $project->physical_progress) }}"
                                            id="physical_progress" aria-describedby="physical_progress">
                                        <span class="input-group-text" id="physical_progress">%</span>
                                        <div class="invalid-feedback">
                                            @error('physical_progress')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label required">आयोजनाको
                                                    स्थिति</label>
                                                <select name="status"
                                                    class="form-control @error('status') is-invalid @enderror"
                                                    id="status" aria-describedby="status"
                                                    onchange="handleOptionChange(event)">
                                                    <option value="0">काम भइरहेको छ</option>
                                                    <option value="1" {{ $project->status == 1 ? 'selected' : '' }}>
                                                        सम्पन्न भइसकेको छ</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    @error('status')
                                                        {{ $message }}
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" id="project_complete">
                                            <label for="project_completion_date" class="form-label required">आयोजना समाप्त
                                                मिति</label>
                                            <div class="input-group mb-3">
                                                <input type="text"
                                                    class="form-control @error('project_completion_date_bs') is-invalid @enderror"
                                                    value="{{ old('project_completion_date_bs') }}"
                                                    id="project_completion_date_bs"
                                                    aria-describedby="project_completion_date_bs"
                                                    placeholder="YYYY-MM-DD">
                                                <input type="text" name="project_completion_date"
                                                    class="form-control @error('project_completion_date') is-invalid @enderror"
                                                    value="{{ old('project_completion_date') }}"
                                                    id="project_completion_date"
                                                    aria-describedby="project_completion_date" placeholder="YYYY-MM-DD"
                                                    hidden>
                                                <div class="invalid-feedback">
                                                    @error('project_completion_date_bs')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label">कैफियत</label>
                                    <div class="input-group mb-3">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                            aria-describedby="description">{{ old('description', $project->description) }}</textarea>
                                        <div class="invalid-feedback">
                                            @error('description')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"
                                onclick="ADConvert()">{{ $project->id ? 'Update' : 'Save' }}</button>
                        </form>
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
            $('#agreement_date_bs').nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                ndpYearCount: 100
            });
            $('#project_start_date_bs').nepaliDatePicker({

                ndpYear: true,
                ndpMonth: true,
                ndpYearCount: 100

            });

            document.getElementById('agreement_date_bs').value = NepaliFunctions.AD2BS(
                "{{ $project->agreement_date }}");
            document.getElementById('project_start_date_bs').value = NepaliFunctions.AD2BS(
                "{{ $project->project_start_date }}");
            document.getElementById('project_completion_date_bs').value = NepaliFunctions.AD2BS(
                "{{ $project->project_completion_date }}");


            var x = document.getElementById("project_complete");
            x.style.display = "none";
            var status = "{{ $project->status }}";

            if (status == 1) {
                x.style.display = "block";
            }

        });

        function ADConvert() {
            //project agreement date bs to ad
            var agreement_date_bs = document.getElementById('agreement_date_bs').value;
            document.getElementById('agreement_date').value = NepaliFunctions.BS2AD(agreement_date_bs);

            //project start date bs to ad
            var project_start_date_bs = document.getElementById('project_start_date_bs').value;
            document.getElementById('project_start_date').value = NepaliFunctions.BS2AD(project_start_date_bs);

            //project compeletion date bs to ad
            var project_completion_date_bs = document.getElementById('project_completion_date_bs').value;
            document.getElementById('project_completion_date').value = NepaliFunctions.BS2AD(project_completion_date_bs);
          
            var status = document.getElementById("status").value;
            if (status == 0) {
                document.getElementById('project_completion_date_bs').value = "";
                document.getElementById('project_completion_date').value ="";
            }
        }

        function handleOptionChange(event) {
            var x = document.getElementById("project_complete");
            const selectedOption = event.target.value;
            if (selectedOption === '1') {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            $('#project_completion_date_bs').nepaliDatePicker({

                ndpYear: true,
                ndpMonth: true,
                ndpYearCount: 100
            });
        }
    </script>
@endpush
