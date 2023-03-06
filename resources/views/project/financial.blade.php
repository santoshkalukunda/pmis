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
                    action="{{ $financial->id ? route('financials.update', $financial) : route('financials.store', $project) }}"
                    method="post">
                    @if ($financial->id)
                        @method('put')
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <livewire:project-active-fiscal-year :fiscalYear="$financial->fiscal_year_id" />
                        </div>
                        <div class="col-md-3">
                            <label for="date" class="form-label required">मिति</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('date_bs') is-invalid @enderror"
                                    value="{{ old('date_bs') }}" id="date_bs" aria-describedby="date_bs"
                                    placeholder="YYYY-MM-DD">

                                <input type="text" name="date"
                                    class="form-control @error('date') is-invalid @enderror"
                                    value="{{ old('date', $financial->date) }}" id="date" aria-describedby="date"
                                    hidden>
                                <div class="invalid-feedback">
                                    @error('date_bs')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="amount" class="form-label required">रकम</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="amount">रु.</span>
                                <input type="number" min="1" name="amount"
                                    class="form-control @error('amount') is-invalid @enderror"
                                    value="{{ old('amount', $financial->amount) }}" id="amount"
                                    aria-describedby="amount">
                                <div class="invalid-feedback">
                                    @error('amount')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="remarks" class="form-label required">विवरण</label>
                            <div class="input-group mb-3">

                                <input type="text" name="remarks"
                                    class="form-control @error('remarks') is-invalid @enderror"
                                    value="{{ old('remarks', $financial->remarks) }}" id="remarks"
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
                                onclick="ADConvert()">{{ $financial->id ? 'Update' : 'Save' }}</button>
                        </div>
                    </div>
                </form>
            </div>
            @push('scripts')
                <script>
                    $(document).ready(function() {
                        if ("{{ $financial->id }}") {
                            document.getElementById('date_bs').value = NepaliFunctions.AD2BS("{{ $financial->date }}");
                        }else{
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
                            <th>रकम</th>
                            <th>विवरण</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($financials as $financial)
                                <tr>
                                    <td>{{ $financial->fiscalYear->fiscal_year }}</td>
                                    <td><span id="date-{{ $financial->id }}"></span></td>
                                    <td>{{ $financial->amount }}</td>
                                    <td>{{ $financial->remarks }}</td>
                                    <td>
                                        <div class="">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item text-center btn"
                                                        href="{{ route('projects.financial.edit', [$office, $project, $financial]) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('financials.destroy', $financial) }}"
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
                                            date1 = NepaliFunctions.AD2BS("{{ $financial->date }}");
                                            document.getElementById("date-{{ $financial->id }}").innerHTML = date1;
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
