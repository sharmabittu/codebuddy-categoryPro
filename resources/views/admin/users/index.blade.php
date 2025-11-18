@extends('layouts.app')

@section('content')
<div class="container">
    <h3>All Users</h3>
    <table class="table table-bordered">
        <thead>
            <tr><th>#</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.users.show', $user->id) }}">Open</a>
                    <a class="btn btn-sm btn-secondary" href="{{ route('admin.users.dashboard', $user->id) }}">View Dashboard</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- pagination links --}}
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection
