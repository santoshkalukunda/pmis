@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __($title = 'User Update') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user) }}">
                            @csrf
                            @method('put')
                            <div>
                                <label for="office_id" class="col-form-label text-md-end">{{ __('Office Name') }}</label>

                                <select id="office_id" class="form-control @error('office_id') is-invalid @enderror"
                                    name="office_id" required autocomplete="office_id">
                                    <option value="">Selec Office</option>
                                    @foreach ($offices as $office)
                                        <option value="{{ $office->id }}"
                                            {{ $office->id == $user->office_id ? 'selected' : '' }}>{{ $office->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('office_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label for="role" class="col-form-label text-md-right">{{ __('Role') }}</label>
                                <select id="role" type="text"
                                    class="form-control @error('role_id') is-invalid @enderror" name="role"
                                    value="{{ old('role') }}" required>
                                    <option value="">Select role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ $role->name == implode($user->getRoleNames()->toArray()) ? 'selected' : '' }}>
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div>
                                <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div>
                                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>


                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', $user->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="mt-2">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Change Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.changePassword', $user) }}">
                            @csrf

                            <div>
                                <label for="password" class="col-form-label text-md-end">{{ __('New Password') }}</label>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div>
                                <label for="password-confirm"
                                    class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">

                            </div>

                            <div class="mt-2">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Change Password') }}
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
