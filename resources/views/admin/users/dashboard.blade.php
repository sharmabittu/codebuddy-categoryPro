@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Admin view — User Dashboard</h3>
    <p class="text-muted">Viewing as admin: user #{{ $user->id }}</p>

    <div class="card mb-3">
        <div class="card-body">
            <h5>{{ $user->name }}</h5>
            <p><strong>Email:</strong> {{ $user->email }}</p>

            {{-- add more user-related data here (orders, profile, etc.) --}}
        </div>
    </div>

    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-outline-secondary">Back to user</a>
</div>
@endsection
