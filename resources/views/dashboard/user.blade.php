@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Your Dashboard</h3>

    <div class="card mb-3">
        <div class="card-body">
            <p>Welcome, {{ auth()->user()->name }}.</p>
            <p>Your role: <strong>{{ auth()->user()->role }}</strong></p>
        </div>
    </div>
</div>
@endsection
