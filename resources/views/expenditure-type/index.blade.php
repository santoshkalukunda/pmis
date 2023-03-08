@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $title = 'Expenditure Type' }}</div>
                    <div class="card-body">
                        <form action="{{ $expenditureType->id ? route('expenditure-types.update', $expenditureType) : route('expenditure-types.store') }}"
                            method="post">
                            @csrf
                            @if ($expenditureType->id)
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label required">Expenditure Type</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $expenditureType->name) }}" id="name" aria-describedby="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ $expenditureType->id ? 'Update' : 'Save' }}</button>
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
                                    <th>Project Type</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse($expenditureTypes as $expenditureType)
                                    <tr>
                                        <td>{{$expenditureType->name}}</td>
                                        <td class="text-right">
                                            <div class="">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                 
                                                    <li><a class="dropdown-item text-center btn"
                                                            href="{{ route('expenditure-types.edit', $expenditureType) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('expenditure-types.destroy', $expenditureType) }}" method="post">
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
