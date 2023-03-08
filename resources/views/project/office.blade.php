@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center mb-3">
            <h4 class="">आयोजना</h4>
            <div class="ml-auto">
                @if ($office->id)
                    <a href="{{ route('projects.offices') }}" class="btn btn-success z-depth-0">Back</a>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $title = 'कार्यालयहरु' }}</div>

                    <div class="card-body">
                        <ol class="list-group">
                            @if ($office->id)
                                <a href="{{ route('projects.index', $office) }}">
                                    <li class="list-group-item list-group-item-action">
                                        <h4 class=" text-center">{{ $office->name }}</h4>
                                    </li>
                                </a>
                            @endif
                            @foreach ($offices as $firstLevelOffice)
                                <a href="{{ route('projects.index', $firstLevelOffice) }}">
                                    <li class="list-group-item list-group-item-action">
                                        <h5 class="text-center">{{ $firstLevelOffice->name }}</h5>
                                    </li>
                                </a>
                                <ul class=" list-group">
                                    @foreach ($firstLevelOffice->childOffices as $SecondLevelOffice)
                                        <a href="{{ route('projects.secondlevel', $SecondLevelOffice) }}">
                                            <li class="list-group-item list-group-item-action">
                                                <h5 class=" text-center">{{ $SecondLevelOffice->name }} </h5>
                                            </li>
                                        </a>
                                    @endforeach
                                </ul>
                            @endforeach
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
