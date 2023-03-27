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
                    action="{{ $indicator->id ? route('indicators.update', $indicator) : route('indicators.store', $project) }}"
                    method="post">
                    @if ($indicator->id)
                        @method('put')
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <livewire:project-active-fiscal-year :fiscalYear="$indicator->fiscal_year_id" />
                        </div>
                        <div class="col-md-3">
                            <label for="name" class="form-label required">सूचक</label>
                            <div class="input-group mb-3">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $indicator->name) }}" id="name" aria-describedby="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label required">सूचकको स्थिति</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status"
                                aria-describedby="status">
                                <option value="0">सम्पन्न भयको छैन</option>
                                <option value="1" {{ $indicator->status == 1 ? 'selected' : '' }}>सम्पन्न भयको छ
                                </option>
                            </select>
                            <div class="invalid-feedback">
                                @error('status')
                                    {{ $message }}
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-1 mt-4 py-2 md-mt-0 md-py-0">
                            <button type="submit" class="btn btn-primary"
                                onclick="ADConvert()">{{ $indicator->id ? 'Update' : 'Save' }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 bg-white">
                <div>
                    <table class="table table-striped text-sm">
                        <thead style="white-space: nowrap;">
                            <th>आ.ब.</th>
                            <th>सूचक</th>
                            <th>सूचकको स्थिति</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($indicators as $indicator)
                                <tr>
                                    <td>{{ $indicator->fiscalYear->fiscal_year }}</td>
                                    <td>{{ $indicator->name }}</td>
                                    <td>
                                        <livewire:project-indicator-status :indicator="$indicator">
                                    </td>
                                    <td>
                                        <div class="">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item text-center btn"
                                                        href="{{ route('projects.indicator.edit', [$office, $project, $indicator]) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('indicators.destroy', $indicator) }}"
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

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
