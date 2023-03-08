@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $title = 'Project Type' }}</div>
                    <div class="card-body">
                        <form action="{{ $projectType->id ? route('project-types.update', $projectType) : route('project-types.store') }}"
                            method="post">
                            @csrf
                            @if ($projectType->id)
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label required">Project Type</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $projectType->name) }}" id="name" aria-describedby="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ $projectType->id ? 'Update' : 'Save' }}</button>
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
                                    @forelse($projectTypes as $projectType)
                                    <tr>
                                        <td>{{$projectType->name}}</td>
                                        <td class="text-right">
                                            <div class="">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                 
                                                    <li><a class="dropdown-item text-center btn"
                                                            href="{{ route('project-types.edit', $projectType) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('project-types.destroy', $projectType) }}" method="post">
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
