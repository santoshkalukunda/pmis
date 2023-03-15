@extends('layouts.app')

@section('content')
@php
    $title = "Dashboard";
@endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center font-weight-bold py-2" style="margin-top: 5%">
                    <img src="{{ asset('img/logo.png') }}" alt="{{ env('APP_NAME') }}" class="my-1" height="100">
                    <h6>नेपाल सरकार</h6>
                    <h3>सुदूरपश्चिम प्रदेश</h3>
                    <h4>{{Auth::user()->office->name}}</h4>
                    <h5>आयोजना व्यवस्थापन सूचना प्रणाली</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
