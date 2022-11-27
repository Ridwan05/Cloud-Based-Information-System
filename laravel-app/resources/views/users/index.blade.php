@extends('layouts.default')

@section('content')
    <div class="d-flex align-items-center">
        <h2 class="flex-grow-1">Users</h2>
        <a href="{{ route('users.create') }}" class="btn button">
            Add User
        </a>
    </div>
    <div class="card">
        @if ($users->total() == 0)
            <div class="card-body p-2">
                <div class="alert alert-warning">
                    No user found!
                </div>
            </div>
        @else
            <table class="table table-bordered table-hover m-0 p-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                                @if (isAuthUser($user))
                                    <span class="badge bg-secondary ms-2">ME</span>
                                @endif
                            </td>
                            <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-end">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($users->lastPage() > 1)
                <div class="card-footer text-end">
                    {!! $users->links() !!}
                </div>
            @endif
        @endif
    </div>
@endsection
