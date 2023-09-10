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
                            <label for="quantity" class="form-label required">परिमाण</label>
                            <div class="input-group mb-3">
                                <input type="number" name="quantity" step="0.01"
                                    class="form-control text-right @error('quantity') is-invalid @enderror"
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
                            <label for="rate" class="form-label required">दर</label>
                            <div class="input-group mb-3">
                                <input type="number" name="rate" step="0.01"
                                    class="form-control text-right @error('rate') is-invalid @enderror"
                                    value="{{ old('rate', $estimate->rate) }}" id="rate" aria-describedby="rate">
                                <div class="invalid-feedback">
                                    @error('rate')
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
                <div>
                    <table class="table table-striped text-sm">
                        <thead style="white-space: nowrap;">
                            <th>आ.ब.</th>
                            <th>विवरण</th>
                            <th>एकाई</th>
                            <th class="text-right">परिमाण</th>
                            <th class="text-right">दर</th>
                            <th class="text-right">लागत</th>
                            <th class="text-right">भार</th>

                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                                $bhar = 0;
                                $totalBhar = 0;
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
                                @endphp
                                <tr>
                                    <td>{{ $estimate->fiscalYear->fiscal_year }}</td>
                                    <td>{{ $estimate->name }}</td>
                                    <td>{{ $estimate->unit }}</td>
                                    <td class="text-right">{{ $estimate->quantity }}</td>
                                    <td class="text-right">{{ $estimate->rate }}</td>
                                    <td class="text-right">{{ round($cost, 3)  }}</td>
                                    <td class="text-right">{{ round($bhar, 3) }}</td>
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
                        </tbody>
                        <tr>
                            <th class="text-right" colspan="5">जम्मा</th>
                            <td class="text-right">{{ round($total , 3) }}</td>
                            <td class="text-right">{{ round($totalBhar, 3) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
