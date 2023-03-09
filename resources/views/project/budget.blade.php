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
                    action="{{ $budget->id ? route('budgets.update', $budget) : route('budgets.store', $project) }}"
                    method="post">
                    @if ($budget->id)
                        @method('put')
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <livewire:project-active-fiscal-year :fiscalYear="$budget->fiscal_year_id" />
                        </div>
                        <div class="col-md-2">
                            <label for="date" class="form-label required">मिति</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('date_bs') is-invalid @enderror"
                                    value="{{ old('date_bs') }}" id="date_bs" aria-describedby="date_bs"
                                    placeholder="YYYY-MM-DD">

                                <input type="text" name="date"
                                    class="form-control @error('date') is-invalid @enderror"
                                    value="{{ old('date', $budget->date) }}" id="date" aria-describedby="date"
                                    hidden>
                                <div class="invalid-feedback">
                                    @error('date_bs')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="budget_source_id" class="form-label required">बजेट स्रोत </label>
                                <select name="budget_source_id"
                                    class="form-control @error('budget_source_id') is-invalid @enderror"
                                    id="budget_source_id" aria-describedby="budget_source_id">
                                    <option value="">बजेट स्रोत छान्नुहोस्</option>
                                    @foreach ($budgetSources as $budgetSource)
                                        <option value="{{ $budgetSource->id }}"
                                            {{ $budgetSource->id == $budget->budget_source_id ? 'selected' : '' }}>
                                            {{ $budgetSource->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('budget_source_id')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="budget_subtitle" class="form-label required">बजेट उपशीर्षक
                                न.</label>
                            <div class="input-group mb-3">
                               <input type="text" name="budget_subtitle"
                                    class="form-control @error('budget_subtitle') is-invalid @enderror"
                                    value="{{ old('budget_subtitle', $budget->budget_subtitle) }}"
                                    id="budget_subtitle" aria-describedby="budget_subtitle">
                                <div class="invalid-feedback">
                                    @error('budget_subtitle')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="budget" class="form-label required">बजेट</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="budget">रु.</span>
                                <input type="number" min="1" name="budget"
                                    class="form-control @error('budget') is-invalid @enderror"
                                    value="{{ old('budget', $budget->budget) }}" id="budget"
                                    aria-describedby="budget">
                                <div class="invalid-feedback">
                                    @error('budget')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 mt-4 py-2 md-mt-0 md-py-0">
                            <button type="submit" class="btn btn-primary"
                                onclick="ADConvert()">{{ $budget->id ? 'Update' : 'Save' }}</button>
                        </div>
                    </div>
                </form>
            </div>
            @push('scripts')
                <script>
                    $(document).ready(function() {
                        if ("{{ $budget->id }}") {
                            document.getElementById('date_bs').value = NepaliFunctions.AD2BS("{{ $budget->date }}");
                        } else {
                            document.getElementById('date_bs').value = NepaliFunctions.AD2BS("{{ date('Y-m-d') }}");

                        }

                    });
                </script>
            @endpush
            <div class="col-md-12 bg-white">
                <div>
                    <table class="table table-striped text-sm">
                        <thead style="white-space: nowrap;">
                            <th>आ.ब.</th>
                            <th>मिति</th>
                            <th>बजेट स्रोत</th>
                            <th>बजेट उपशीर्षक न.</th>
                            <th class="text-right">विनियोजित बजेट</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $totalAllocatedbudget = 0;
                            @endphp
                            @forelse ($budgets as $budget)
                                @php
                                        $totalAllocatedbudget = $totalAllocatedbudget + $budget->budget;
                                @endphp
                                <tr>
                                    <td>{{ $budget->fiscalYear->fiscal_year }}</td>
                                    <td><span id="date-{{ $budget->id }}"></span></td>
                                    <td>{{ $budget->budgetSource->name }}</td>
                                    <td>{{ $budget->budget_subtitle }}</td>
                                    <td class="text-right">{{ $budget->budget }}</td>
                                    <td>
                                        <div class="">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item text-center btn"
                                                        href="{{ route('projects.budgets.edit', [$office, $project, $budget]) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('budgets.destroy', $budget) }}"
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
                                            date1 = NepaliFunctions.AD2BS("{{ $budget->date }}");
                                            document.getElementById("date-{{ $budget->id }}").innerHTML = date1;
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
                            <tr>
                                <td class="text-right" colspan="4">
                                    जम्मा
                                </td>
                                <td class="text-right">
                                    {{$totalAllocatedbudget}}
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#date_bs').nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                ndpYearCount: 100
            });


        });

        function ADConvert() {
            //project agreement date bs to ad
            var date_bs = document.getElementById('date_bs').value;
            document.getElementById('date').value = NepaliFunctions.BS2AD(date_bs);
        }
    </script>
@endpush
