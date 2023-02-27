@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $title = 'Fiscal Year' }}</div>
                    <div class="card-body">
                        <form action="{{ $fiscalYear->id ? route('fiscal-years.update', $fiscalYear) : route('fiscal-years.store') }}"
                            method="post">
                            @csrf
                            @if ($fiscalYear->id)
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label required">Fiscal Year</label>
                                <input type="text" name="fiscal_year"
                                    class="form-control @error('fiscal_year') is-invalid @enderror"
                                    value="{{ old('fiscal_year', $fiscalYear->fiscal_year) }}" id="name" aria-describedby="name">
                                <div class="invalid-feedback">
                                    @error('fiscal_year')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ $fiscalYear->id ? 'Update' : 'Save' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title}}</div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered">
                                <thead>
                                    <th>Fiscal Year</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse($fiscalYears as $fiscalYear)
                                    <tr>
                                        <td>{{$fiscalYear->fiscal_year}}</td>
                                        <td class="text-right">
                                            <div class="">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                 
                                                    <li><a class="dropdown-item text-center btn"
                                                            href="{{ route('fiscal-years.edit', $fiscalYear) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('fiscal-years.destroy', $fiscalYear) }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="dropdown-item text-center btn form-control" type="submit"
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
                                            <td colspan="42" class="font-italic text-center">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>


                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
