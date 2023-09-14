@extends('layouts.app')

@section('content')
    @php
        $title = $project->name;
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            @include('project.nav')

            @if ($estimates->isNotEmpty())
                <div class="col-md-12 py-2 bg-white">

                </div>
                <div class="col-md-12 bg-white">
                    <form action="{{ route('projects.progress-store', [$office, $project]) }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-striped text-sm">
                                <thead style="white-space: nowrap;">
                                    <th>आ.ब.</th>
                                    <th>विवरण</th>
                                    <th>एकाई</th>
                                    <th class="text-right font-kalimati">दर</th>
                                    <th class="text-right font-kalimati">परिमाण</th>

                                    <th class="text-right font-kalimati">बार्षिक परिमाण</th>

                                    <th class="text-right font-kalimati">प्रथम चौमासिक परिमाण</th>

                                    <th class="text-right font-kalimati">दोस्रो चौमासिक परिमाण</th>

                                    <th class="text-right font-kalimati">तेस्रो चौमासिक परिमाण</th>

                                    <th class="text-right font-kalimati">चौथों चौमासिक परिमाण</th>
                                </thead>
                                <tbody>
                                    @forelse ($estimates as $estimate)
                                        <tr style="white-space: nowrap;">
                                            <td>{{ $estimate->fiscalYear->fiscal_year }}</td>
                                            <td>{{ $estimate->name }}</td>
                                            <td>{{ $estimate->unit }}</td>
                                            <td class="text-right font-kalimati">{{ $estimate->rate }}</td>
                                            <td class="text-right font-kalimati">{{ $estimate->quantity }}</td>
                                            <td> <input type="number" name="yearly_quantity[{{ $estimate->id }}]"
                                                    step="0.01"
                                                    class="form-control text-right font-kalimati @error('yearly_quantity') is-invalid @enderror"
                                                    value="{{ old('yearly_quantity[]', $estimate->yearly_quantity) }}"
                                                    id="yearly_quantity" aria-describedby="yearly_quantity"
                                                    style="width: 150px;">
                                                <div class="invalid-feedback">
                                                    @error('yearly_quantity')
                                                        {{ $message }}
                                                    @enderror

                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" name="first_quarterly_quantity[{{ $estimate->id }}]"
                                                    step="0.01"
                                                    class="form-control text-right font-kalimati @error('first_quarterly_quantity') is-invalid @enderror"
                                                    value="{{ old('first_quarterly_quantity[]', $estimate->first_quarterly_quantity) }}"
                                                    id="first_quarterly_quantity"
                                                    aria-describedby="first_quarterly_quantity">
                                                <div class="invalid-feedback">
                                                    @error('first_quarterly_quantity')
                                                        {{ $message }}
                                                    @enderror

                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" name="second_quarterly_quantity[{{ $estimate->id }}]"
                                                    step="0.01"
                                                    class="form-control text-right font-kalimati @error('second_quarterly_quantity') is-invalid @enderror"
                                                    value="{{ old('second_quarterly_quantity[]', $estimate->second_quarterly_quantity) }}"
                                                    id="second_quarterly_quantity"
                                                    aria-describedby="second_quarterly_quantity">
                                                <div class="invalid-feedback">
                                                    @error('second_quarterly_quantity')
                                                        {{ $message }}
                                                    @enderror

                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" name="third_quarterly_quantity[{{ $estimate->id }}]"
                                                    step="0.01"
                                                    class="form-control text-right font-kalimati @error('third_quarterly_quantity') is-invalid @enderror"
                                                    value="{{ old('third_quarterly_quantity[]', $estimate->third_quarterly_quantity) }}"
                                                    id="third_quarterly_quantity"
                                                    aria-describedby="third_quarterly_quantity">
                                                <div class="invalid-feedback">
                                                    @error('third_quarterly_quantity')
                                                        {{ $message }}
                                                    @enderror

                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" name="fourth_quarterly_quantity[{{ $estimate->id }}]"
                                                    step="0.01"
                                                    class="form-control text-right font-kalimati @error('fourth_quarterly_quantity') is-invalid @enderror"
                                                    value="{{ old('fourth_quarterly_quantity[]', $estimate->fourth_quarterly_quantity) }}"
                                                    id="fourth_quarterly_quantity"
                                                    aria-describedby="fourth_quarterly_quantity">
                                                <div class="invalid-feedback">
                                                    @error('fourth_quarterly_quantity')
                                                        {{ $message }}
                                                    @enderror

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
                        <div class="col-md-12 my-2 text-end">
                            <button type="submit" class="btn btn-primary">
                                Save</button>
                        </div>
                    </form>
                </div>
            @else
            <div class="col-md-12 py-2 bg-white">
                <div class="text-red text-center">
                    सूचकहरु प्रविष्टि गर्नुहोस् <a href="{{route('projects.estimate',[$office, $project])}}">Click</a>
                </div> 
            </div>
            @endif
        </div>
    </div>
@endsection
