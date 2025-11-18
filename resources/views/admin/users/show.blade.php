@extends('layouts.app')

@section('content')
<div class="container">
    <h3>User Details</h3>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ $user->role }}</p>
            <p><strong>Created:</strong> {{ $user->created_at->format('d M Y H:i') }}</p>
        </div>
    </div>

    <div class="d-flex">
        <a href="{{ route('admin.users.dashboard', $user->id) }}" class="btn btn-secondary mr-2">View User Dashboard</a>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary">Back to Users</a>
    </div>
</div>
@endsection
