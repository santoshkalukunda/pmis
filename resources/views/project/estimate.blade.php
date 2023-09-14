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
                    action="{{ $estimate->id ? route('estimates.update', $estimate) : route('estimates.store', $project) }}"
                    method="post">
                    @if ($estimate->id)
                        @method('put')
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <livewire:project-active-fiscal-year :fiscalYear="$estimate->fiscal_year_id" />
                        </div>
                        <div class="col-md-2">
                            <label for="name" class="form-label required">विवरण</label>
                            <div class="input-group mb-3">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $estimate->name) }}" id="name" aria-describedby="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="unit" class="form-label required">एकाई</label>
                            <div class="input-group mb-3">
                                <input type="text" name="unit"
                                    class="form-control @error('unit') is-invalid @enderror"
                                    value="{{ old('unit', $estimate->unit) }}" id="unit" aria-describedby="unit">
                                <div class="invalid-feedback">
                                    @error('unit')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="rate" class="form-label required">दर</label>
                            <div class="input-group mb-3">
                                <input type="number" name="rate" step="0.01"
                                    class="form-control text-right font-kalimati @error('rate') is-invalid @enderror"
                                    value="{{ old('rate', $estimate->rate) }}" id="rate" aria-describedby="rate">
                                <div class="invalid-feedback">
                                    @error('rate')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="quantity" class="form-label required">परिमाण</label>
                            <div class="input-group mb-3">
                                <input type="number" name="quantity" step="0.01"
                                    class="form-control text-right font-kalimati @error('quantity') is-invalid @enderror"
                                    value="{{ old('quantity', $estimate->quantity) }}" id="quantity"
                                    aria-describedby="quantity">
                                <div class="invalid-feedback">
                                    @error('quantity')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="yearly_target_quantity" class="form-label">बार्षिक लक्ष्य</label>
                            <div class="input-group mb-3">
                                <input type="number" name="yearly_target_quantity" step="0.01"
                                    class="form-control text-right font-kalimati @error('yearly_target_quantity') is-invalid @enderror"
                                    value="{{ old('yearly_target_quantity', $estimate->yearly_target_quantity) }}"
                                    id="yearly_target_quantity" aria-describedby="yearly_target_quantity">
                                <div class="invalid-feedback">
                                    @error('yearly_target_quantity')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="first_quarterly_target_quantity" class="form-label">प्रथम चौमासिक लक्ष्य</label>
                            <div class="input-group mb-3">
                                <input type="number" name="first_quarterly_target_quantity" step="0.01"
                                    class="form-control text-right font-kalimati @error('first_quarterly_target_quantity') is-invalid @enderror"
                                    value="{{ old('first_quarterly_target_quantity', $estimate->first_quarterly_target_quantity) }}"
                                    id="first_quarterly_target_quantity" aria-describedby="first_quarterly_target_quantity">
                                <div class="invalid-feedback">
                                    @error('first_quarterly_target_quantity')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="second_quarterly_target_quantity" class="form-label">दोस्रो चौमासिक लक्ष्य</label>
                            <div class="input-group mb-3">
                                <input type="number" name="second_quarterly_target_quantity" step="0.01"
                                    class="form-control text-right font-kalimati @error('second_quarterly_target_quantity') is-invalid @enderror"
                                    value="{{ old('second_quarterly_target_quantity', $estimate->second_quarterly_target_quantity) }}"
                                    id="second_quarterly_target_quantity"
                                    aria-describedby="second_quarterly_target_quantity">
                                <div class="invalid-feedback">
                                    @error('second_quarterly_target_quantity')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="third_quarterly_target_quantity" class="form-label">तेस्रो चौमासिक लक्ष्य</label>
                            <div class="input-group mb-3">
                                <input type="number" name="third_quarterly_target_quantity" step="0.01"
                                    class="form-control text-right font-kalimati @error('third_quarterly_target_quantity') is-invalid @enderror"
                                    value="{{ old('third_quarterly_target_quantity', $estimate->third_quarterly_target_quantity) }}"
                                    id="third_quarterly_target_quantity" aria-describedby="third_quarterly_target_quantity">
                                <div class="invalid-feedback">
                                    @error('third_quarterly_target_quantity')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="fourth_quarterly_target_quantity" class="form-label">चौथों चौमासिक लक्ष्य</label>
                            <div class="input-group mb-3">
                                <input type="number" name="fourth_quarterly_target_quantity" step="0.01"
                                    class="form-control text-right font-kalimati @error('fourth_quarterly_target_quantity') is-invalid @enderror"
                                    value="{{ old('fourth_quarterly_target_quantity', $estimate->fourth_quarterly_target_quantity) }}"
                                    id="fourth_quarterly_target_quantity"
                                    aria-describedby="fourth_quarterly_target_quantity">
                                <div class="invalid-feedback">
                                    @error('fourth_quarterly_target_quantity')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="col-md-1 mt-4 py-2 md-mt-0 md-py-0">
                            <button type="submit" class="btn btn-primary"
                                onclick="ADConvert()">{{ $estimate->id ? 'Update' : 'Save' }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 bg-white">
                <div class="table-responsive">
                    <table class="table table-striped text-sm">
                        <thead style="white-space: nowrap;">
                            <th>आ.ब.</th>
                            <th>विवरण</th>
                            <th>एकाई</th>
                            <th class="text-right font-kalimati">दर</th>
                            <th class="text-right font-kalimati">परिमाण</th>
                            <th class="text-right font-kalimati">लागत</th>
                            <th class="text-right font-kalimati">भार</th>

                            <th class="text-right font-kalimati">बार्षिक परिमाण लक्ष्य</th>
                            <th class="text-right font-kalimati">बार्षिक लागत लक्ष्य</th>
                            <th class="text-right font-kalimati">बार्षिक भार लक्ष्य</th>

                            <th class="text-right font-kalimati">प्रथम चौमासिक परिमाण लक्ष्य</th>
                            <th class="text-right font-kalimati">प्रथम चौमासिक लागत लक्ष्य</th>
                            <th class="text-right font-kalimati">प्रथम चौमासिक भार लक्ष्य</th>

                            <th class="text-right font-kalimati">दोस्रो चौमासिक परिमाण लक्ष्य</th>
                            <th class="text-right font-kalimati">दोस्रो चौमासिक लागत लक्ष्य</th>
                            <th class="text-right font-kalimati">दोस्रो चौमासिक भार लक्ष्य</th>

                            <th class="text-right font-kalimati">तेस्रो चौमासिक परिमाण लक्ष्य</th>
                            <th class="text-right font-kalimati">तेस्रो चौमासिक लागत लक्ष्य</th>
                            <th class="text-right font-kalimati">तेस्रो चौमासिक भार लक्ष्य</th>

                            <th class="text-right font-kalimati">चौथों चौमासिक परिमाण लक्ष्य</th>
                            <th class="text-right font-kalimati">चौथों चौमासिक लागत लक्ष्य</th>
                            <th class="text-right font-kalimati">चौथों चौमासिक भार लक्ष्य</th>

                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                                $bhar = 0;
                                $totalBhar = 0;
                                
                                $yearlyCost = 0;
                                $yearlyTotalCost = 0;
                                $yearlyBhar = 0;
                                $yearlyTotalBhar = 0;
                                
                                $firstQuarterlyCost = 0;
                                $firstQuarterlyTotalCost = 0;
                                $firstQuarterlyBhar = 0;
                                $firstQuarterlyTotalBhar = 0;
                                
                                $secondQuarterlyCost = 0;
                                $secondQuarterlyTotalCost = 0;
                                $secondQuarterlyBhar = 0;
                                $secondQuarterlyTotalBhar = 0;
                                
                                $thirdQuarterlyCost = 0;
                                $thirdQuarterlyTotalCost = 0;
                                $thirdQuarterlyBhar = 0;
                                $thirdQuarterlyTotalBhar = 0;
                                
                                $fourthQuarterlyCost = 0;
                                $fourthQuarterlyTotalCost = 0;
                                $fourthQuarterlyBhar = 0;
                                $fourthQuarterlyTotalBhar = 0;
                                
                            @endphp
                            @foreach ($estimates as $estimate)
                                @php
                                    $cost = $estimate->quantity * $estimate->rate;
                                    $total += $cost;
                                @endphp
                            @endforeach
                            @forelse ($estimates as $estimate)
                                @php
                                    $cost = $estimate->quantity * $estimate->rate;
                                    $bhar = ($cost * 100) / $total;
                                    $totalBhar += $bhar;
                                    
                                    if ($estimate->yearly_target_quantity) {
                                        $yearlyCost = $estimate->yearly_target_quantity * $estimate->rate;
                                        $yearlyTotalCost += $yearlyCost;
                                        $yearlyBhar = ($yearlyCost * 100) / $total;
                                        $yearlyTotalBhar += $yearlyBhar;
                                    }
                                    
                                    if ($estimate->first_quarterly_target_quantity) {
                                        $firstQuarterlyCost = $estimate->first_quarterly_target_quantity * $estimate->rate;
                                        $firstQuarterlyTotalCost += $firstQuarterlyCost;
                                        $firstQuarterlyBhar = ($firstQuarterlyCost * 100) / $total;
                                        $firstQuarterlyTotalBhar += $firstQuarterlyBhar;
                                    }
                                    
                                    if ($estimate->second_quarterly_target_quantity) {
                                        $secondQuarterlyCost = $estimate->second_quarterly_target_quantity * $estimate->rate;
                                        $secondQuarterlyTotalCost += $secondQuarterlyCost;
                                        $secondQuarterlyBhar = ($secondQuarterlyCost * 100) / $total;
                                        $secondQuarterlyTotalBhar += $secondQuarterlyBhar;
                                    }
                                    
                                    if ($estimate->third_quarterly_target_quantity) {
                                        $thirdQuarterlyCost = $estimate->third_quarterly_target_quantity * $estimate->rate;
                                        $thirdQuarterlyTotalCost += $thirdQuarterlyCost;
                                        $thirdQuarterlyBhar = ($thirdQuarterlyCost * 100) / $total;
                                        $thirdQuarterlyTotalBhar += $thirdQuarterlyBhar;
                                    }
                                    
                                    if ($estimate->fourth_quarterly_target_quantity) {
                                        $fourthQuarterlyCost = $estimate->fourth_quarterly_target_quantity * $estimate->rate;
                                        $fourthQuarterlyTotalCost += $fourthQuarterlyCost;
                                        $fourthQuarterlyBhar = ($fourthQuarterlyCost * 100) / $total;
                                        $fourthQuarterlyTotalBhar += $fourthQuarterlyBhar;
                                    }
                                    
                                @endphp
                                <tr style="white-space: nowrap;">
                                    <td>{{ $estimate->fiscalYear->fiscal_year }}</td>
                                    <td>{{ $estimate->name }}</td>
                                    <td>{{ $estimate->unit }}</td>
                                    <td class="text-right font-kalimati">{{ $estimate->rate }}</td>
                                    <td class="text-right font-kalimati">{{ $estimate->quantity }}</td>
                                    <td class="text-right font-kalimati">{{ round($cost, 3) }}</td>
                                    <td class="text-right font-kalimati">{{ round($bhar, 3) }}</td>

                                    @if ($estimate->yearly_target_quantity)
                                        <td class="text-right font-kalimati">{{ $estimate->yearly_target_quantity }}</td>
                                        <td class="text-right font-kalimati">{{ round($yearlyCost, 3) }}</td>
                                        <td class="text-right font-kalimati">{{ round($yearlyBhar, 3) }}</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif
                                    @if ($estimate->first_quarterly_target_quantity)
                                        <td class="text-right font-kalimati">
                                            {{ $estimate->first_quarterly_target_quantity }}
                                        </td>
                                        <td class="text-right font-kalimati">{{ round($firstQuarterlyCost, 3) }}</td>
                                        <td class="text-right font-kalimati">{{ round($firstQuarterlyBhar, 3) }}</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif

                                    @if ($estimate->second_quarterly_target_quantity)
                                        <td class="text-right font-kalimati">
                                            {{ $estimate->second_quarterly_target_quantity }}
                                        </td>
                                        <td class="text-right font-kalimati">{{ round($secondQuarterlyCost, 3) }}</td>
                                        <td class="text-right font-kalimati">{{ round($secondQuarterlyBhar, 3) }}</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif

                                    @if ($estimate->third_quarterly_target_quantity)
                                        <td class="text-right font-kalimati">
                                            {{ $estimate->third_quarterly_target_quantity }}
                                        </td>
                                        <td class="text-right font-kalimati">{{ round($thirdQuarterlyCost, 3) }}</td>
                                        <td class="text-right font-kalimati">{{ round($thirdQuarterlyBhar, 3) }}</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif

                                    @if ($estimate->fourth_quarterly_target_quantity)
                                        <td class="text-right font-kalimati">
                                            {{ $estimate->fourth_quarterly_target_quantity }}
                                        </td>
                                        <td class="text-right font-kalimati">{{ round($fourthQuarterlyCost, 3) }}</td>
                                        <td class="text-right font-kalimati">{{ round($fourthQuarterlyBhar, 3) }}</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif

                                    <td>
                                        <div class="">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item text-center btn"
                                                        href="{{ route('projects.estimate.edit', [$office, $project, $estimate]) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('estimates.destroy', $estimate) }}"
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
                                <th class="text-right font-kalimati" colspan="5">जम्मा</th>
                                <td class="text-right font-kalimati">{{ round($total, 3) }}</td>
                                <td class="text-right font-kalimati">{{ round($totalBhar, 3) }}</td>
                                <td colspan="2" class="text-right font-kalimati">{{ round($yearlyTotalCost, 3) }}</td>
                                <td class="text-right font-kalimati">{{ round($yearlyTotalBhar, 3) }}</td>
                                <td colspan="2" class="text-right font-kalimati">
                                    {{ round($firstQuarterlyTotalCost, 3) }}</td>
                                <td class="text-right font-kalimati">{{ round($firstQuarterlyTotalBhar, 3) }}</td>
                                <td colspan="2" class="text-right font-kalimati">
                                    {{ round($secondQuarterlyTotalCost, 3) }}</td>
                                <td class="text-right font-kalimati">{{ round($secondQuarterlyTotalBhar, 3) }}</td>
                                <td colspan="2" class="text-right font-kalimati">
                                    {{ round($thirdQuarterlyTotalCost, 3) }}</td>
                                <td class="text-right font-kalimati">{{ round($thirdQuarterlyTotalBhar, 3) }}</td>
                                <td colspan="2" class="text-right font-kalimati">
                                    {{ round($fourthQuarterlyTotalCost, 3) }}</td>
                                <td class="text-right font-kalimati">
                                    {{ round($fourthQuarterlyTotalBhar, 3) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
