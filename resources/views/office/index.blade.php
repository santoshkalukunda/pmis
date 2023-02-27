@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $title = 'Offices' }}</div>
                    <div class="card-body">
                        <form action="{{ $office->id ? route('offices.update', $office) : route('offices.store') }}"
                            method="post">
                            @csrf
                            @if ($office->id)
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label required">Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $office->name) }}" id="name" aria-describedby="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="english_name" class="form-label required">English Name</label>
                                <input type="text" name="english_name"
                                    class="form-control @error('english_name') is-invalid @enderror"
                                    value="{{ old('english_name', $office->english_name) }}" id="english_name" aria-describedby="english_name">
                                <div class="invalid-feedback">
                                    @error('english_name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Parent Office</label>
                                <select class="form-select"name="parent_id" aria-label="Default select example">
                                    <option value=""> Select Parent Office</option>
                                    @foreach ($offices as $firstLevelOffice)
                                        <option value="{{ $firstLevelOffice->id }}"
                                            @if ($office->parentOffice && $office->parentOffice->id == $firstLevelOffice->id) selected @endif>{{ $firstLevelOffice->name }}
                                        </option>
                                        @foreach ($firstLevelOffice->childOffices as $SecondLevelOffice)
                                            <option value="{{ $SecondLevelOffice->id }}"
                                                @if ($office->parentOffice && $office->parentOffice->id == $SecondLevelOffice->id) selected @endif 
                                                >
                                                -- {{ $SecondLevelOffice->name }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ $office->id ? 'Update' : 'Save' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title = 'Offices' }}</div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered">
                                <thead>
                                    <th>Name</th>
                                    <th>Parent</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse($offices as $firstLevelOffice)
                                        @include('office.table-row', [
                                            'office' => $firstLevelOffice,
                                            'level' => 1,
                                        ])

                                        {{-- Second level --}}
                                        @foreach ($firstLevelOffice->childoffices as $secondLevelOffice)
                                            @include('office.table-row', [
                                                'office' => $secondLevelOffice,
                                                'level' => 2,
                                                'parentOfficeName' => $firstLevelOffice->name,
                                            ])

                                            {{-- Third level --}}
                                            @foreach ($secondLevelOffice->childoffices as $thirdLevelOffice)
                                                @include('office.table-row', [
                                                    'office' => $thirdLevelOffice,
                                                    'level' => 3,
                                                    'parentOfficeName' => $secondLevelOffice->name,
                                                ])
                                            @endforeach
                                        @endforeach
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
