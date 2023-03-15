@extends('layouts.app')

@section('content')
    @php
        $title = $project->name;
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            @include('project.nav')
            <div class="col-md-12 py-2 bg-white">

                <form
                    action="{{ $project->id ? route('projects.physicalProgress.update', [$office, $project]) : route('projects.store', $office) }}"
                    method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="agreement_date" class="form-label required">सम्झौता मिति</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('agreement_date_bs') is-invalid @enderror"
                                    value="{{ old('agreement_date_bs', $project->agreement_date_bs) }}"
                                    id="agreement_date_bs" aria-describedby="agreement_date_bs" placeholder="YYYY-MM-DD">
                                <input type="text" name="agreement_date"
                                    class="form-control @error('agreement_date') is-invalid @enderror"
                                    value="{{ old('agreement_date', $project->agreement_date) }}" id="agreement_date"
                                    aria-describedby="agreement_date" hidden>
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
                                        <select name="status" class="form-control @error('status') is-invalid @enderror"
                                            id="status" aria-describedby="status" onchange="handleOptionChange(event)">
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
                                            value="{{ old('project_completion_date_bs') }}" id="project_completion_date_bs"
                                            aria-describedby="project_completion_date_bs" placeholder="YYYY-MM-DD">
                                        <input type="text" name="project_completion_date"
                                            class="form-control @error('project_completion_date') is-invalid @enderror"
                                            value="{{ old('project_completion_date') }}" id="project_completion_date"
                                            aria-describedby="project_completion_date" placeholder="YYYY-MM-DD" hidden>
                                        <div class="invalid-feedback">
                                            @error('project_completion_date_bs')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
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
                document.getElementById('project_completion_date').value = "";
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
