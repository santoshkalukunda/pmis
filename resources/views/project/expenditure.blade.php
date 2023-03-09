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
                    action="{{ $expenditure->id ? route('expenditures.update', $expenditure) : route('expenditures.store', $project) }}"
                    method="post">
                    @if ($expenditure->id)
                        @method('put')
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <livewire:project-active-fiscal-year :fiscalYear="$expenditure->fiscal_year_id" />
                        </div>
                        <div class="col-md-2">
                            <label for="date" class="form-label required">मिति</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('date_bs') is-invalid @enderror"
                                    value="{{ old('date_bs') }}" id="date_bs" aria-describedby="date_bs"
                                    placeholder="YYYY-MM-DD">

                                <input type="text" name="date"
                                    class="form-control @error('date') is-invalid @enderror"
                                    value="{{ old('date', $expenditure->date) }}" id="date" aria-describedby="date"
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
                                <label for="expenditure_type_id" class="form-label required">खर्चको किसिम</label>
                                <select name="expenditure_type_id"
                                    class="form-control @error('expenditure_type_id') is-invalid @enderror"
                                    id="expenditure_type_id" aria-describedby="expenditure_type_id">
                                    <option value="">खर्चको किसिम छान्नुहोस्</option>
                                    @foreach ($expenditureTypes as $expenditureType)
                                        <option value="{{ $expenditureType->id }}"
                                            {{ $expenditureType->id == $expenditure->expenditure_type_id ? 'Selected' : '' }}>
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
                        <div class="col-md-2">
                            <label for="expenditure_subtitle" class="form-label required">खर्च उपशीर्षक
                                न.</label>
                            <div class="input-group mb-3">
                                <input type="text" name="expenditure_subtitle"
                                    class="form-control @error('expenditure_subtitle') is-invalid @enderror"
                                    value="{{ old('expenditure_subtitle', $expenditure->expenditure_subtitle) }}"
                                    id="expenditure_subtitle" aria-describedby="expenditure_subtitle">
                                <div class="invalid-feedback">
                                    @error('expenditure_subtitle')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="expenditure" class="form-label required">रकम</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="expenditure">रु.</span>
                                <input type="number" min="1" name="expenditure"
                                    class="form-control @error('expenditure') is-invalid @enderror"
                                    value="{{ old('expenditure', $expenditure->expenditure) }}" id="expenditure"
                                    aria-describedby="expenditure">
                                <div class="invalid-feedback">
                                    @error('expenditure')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="remarks" class="form-label required">विवरण</label>
                            <div class="input-group mb-3">

                                <input type="text" name="remarks"
                                    class="form-control @error('remarks') is-invalid @enderror"
                                    value="{{ old('remarks', $expenditure->remarks) }}" id="remarks"
                                    aria-describedby="remarks">
                                <div class="invalid-feedback">
                                    @error('remarks')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 mt-4 py-2 md-mt-0 md-py-0">
                            <button type="submit" class="btn btn-primary"
                                onclick="ADConvert()">{{ $expenditure->id ? 'Update' : 'Save' }}</button>
                        </div>
                    </div>
                </form>
            </div>
            @push('scripts')
                <script>
                    $(document).ready(function() {
                        if ("{{ $expenditure->id }}") {
                            document.getElementById('date_bs').value = NepaliFunctions.AD2BS("{{ $expenditure->date }}");
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
                            <th>खर्चको किसिम</th>
                            <th>खर्च उपशीर्षक न.</th>
                            <th>विवरण</th>
                            <th class="text-right">रकम</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $totalExpenditure = 0;
                            @endphp
                            @forelse ($expenditures as $expenditure)
                                @php
                                        $totalExpenditure = $totalExpenditure + $expenditure->expenditure;
                                @endphp
                                <tr>
                                    <td>{{ $expenditure->fiscalYear->fiscal_year }}</td>
                                    <td><span id="date-{{ $expenditure->id }}"></span></td>
                                    <td>{{ $expenditure->expenditureType->name }}</td>
                                    <td>{{ $expenditure->expenditure_subtitle }}</td>
                                    <td>{{ $expenditure->remarks }}</td>
                                    <td class="text-right">{{ $expenditure->expenditure }}</td>
                                    <td>
                                        <div class="">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item text-center btn"
                                                        href="{{ route('projects.expenditures.edit', [$office, $project, $expenditure]) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('expenditures.destroy', $expenditure) }}"
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
                                            date1 = NepaliFunctions.AD2BS("{{ $expenditure->date }}");
                                            document.getElementById("date-{{ $expenditure->id }}").innerHTML = date1;
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
                                <td class="text-right" colspan="5">
                                    जम्मा
                                </td>
                                <td class="text-right">
                                    {{$totalExpenditure}}
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
