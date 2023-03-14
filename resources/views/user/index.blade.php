@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center mb-3">
            {{-- <x-project-filter :office="$office" /> --}}
            <div class="ml-auto d-flex gap-2">
                <a href="{{ route('register') }}" class="btn btn-success z-depth-0"><i class="bi bi-plus-lg"></i> नयाँ
                    दर्ता</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $title = 'Users' }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-md table-bordered">
                                <thead>
                                    <th>Office</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $user->office->name }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ implode(' ', $user->getRoleNames()->toArray()) }}</td>
                                            <td class="text-right">
                                                <div class="">
                                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                                        <li><a class="dropdown-item text-center btn"
                                                                href="{{ route('users.edit', $user) }}">Edit</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('users.destroy', $user) }}"
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
