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
                                <div class="col-md-8">
                                    <livewire:project-municipality :project="$project" />
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="ward_no" class="form-label required">वडा नम्बर</label>
                                        <input type="number" min="1" name="ward_no"
                                            class="form-control font-kalimati @error('ward_no') is-invalid @enderror"
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
                                                    {{old('project_type_id',$project->project_type_id) == $projectType->id ? 'selected' : '' }}>
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
                                    <label for="budget_subtitle" class="form-label required">बजेट उपशीर्षक
                                        न.</label>
                                    <div class="input-group mb-3">
                                       <input type="text" name="budget_subtitle"
                                            class="form-control font-kalimati @error('budget_subtitle') is-invalid @enderror"
                                            value="{{ old('budget_subtitle', $project->budget_subtitle) }}"
                                            id="budget_subtitle" aria-describedby="budget_subtitle">
                                        <div class="invalid-feedback">
                                            @error('budget_subtitle')
                                                {{ $message }}
                                            @enderror
        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="approval_budget" class="form-label required">स्वीकृति बजेट</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="approval_budget">रु.</span>
                                        <input type="number" min="1" name="approval_budget"
                                            class="form-control font-kalimati @error('approval_budget') is-invalid @enderror"
                                            value="{{ old('approval_budget', $project->approval_budget) }}" id="approval_budget"
                                            aria-describedby="approval_budget">
                                        <div class="invalid-feedback">
                                            @error('approval_budget')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="expenditure_subtitle" class="form-label required">खर्च शीर्षक
                                        न.</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="expenditure_subtitle"
                                            class="form-control font-kalimati @error('expenditure_subtitle') is-invalid @enderror"
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
                                    <div class="mb-3">
                                        <label for="project_time_type" class="form-label required">आयोजनाको प्रकार</label>
                                        <select name="project_time_type"
                                            class="form-control @error('project_time_type') is-invalid @enderror"
                                            id="project_time_type">
                                            <option value="">छानुहोस</option>
                                            <option value="0" {{old('project_time_type', $project->project_time_type) == 0 ? 'selected' : ""}}>एकवर्षीय</option>
                                            <option value="1" {{old('project_time_type', $project->project_time_type) == 1 ? 'selected' : ""}}>बहुबर्षीय</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('project_time_type')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="time_period" class="form-label required">प्रोजेक्ट समाप्ति समय (महिनामा) </label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="time_period">महिना</span>
                                        <input type="number" min="1" name="time_period"
                                            class="form-control font-kalimati @error('time_period') is-invalid @enderror"
                                            value="{{ old('time_period', $project->time_period) }}" id="time_period"
                                            aria-describedby="time_period">
                                        <div class="invalid-feedback">
                                            @error('time_period')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="col-md-4">
                                    <label for="tender_amount" class="form-label required">सम्झौता रकम</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="tender_amount">रु.</span>
                                        <input type="number" min="1" name="tender_amount"
                                            class="form-control @error('tender_amount') is-invalid @enderror"
                                            value="{{ old('tender_amount', $project->tender_amount) }}" id="tender_amount"
                                            aria-describedby="tender_amount">
                                        <div class="invalid-feedback">
                                            @error('tender_amount')
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
                                    <label for="project_start_date" class="form-label required">आयोजना सुरु मिति</label>
                                    <div class="input-group mb-3">
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
                                </div> --}}
                                <div class="col-md-4">
                                    <label for="population_to_be_benefited" class="form-label">लाभाम्वित हुने
                                        जनसंख्या</label>
                                    <div class="input-group mb-3">
                                        {{-- <span class="input-group-text" id="population_to_be_benefited">रु.</span> --}}
                                        <input type="text" name="population_to_be_benefited"
                                            class="form-control font-kalimati @error('population_to_be_benefited') is-invalid @enderror"
                                            value="{{ old('population_to_be_benefited', $project->population_to_be_benefited) }}"
                                            id="population_to_be_benefited" aria-describedby="population_to_be_benefited">
                                        <div class="invalid-feedback">
                                            @error('population_to_be_benefited')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
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
                                </div> --}}
                                {{-- <div class="col-md-8">
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
                                </div> --}}
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
        });
    </script>
@endpush
