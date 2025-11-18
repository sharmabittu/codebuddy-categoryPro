@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Categories</h3>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.categories.paginated') }}" class="btn btn-secondary">View Paginated</a>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create Category</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if($categories->isEmpty())
                <p>No categories</p>
            @else
                <ul class="list-unstyled">
                    @foreach($categories as $category)
                        @include('admin.categories.partials.node', ['category' => $category])
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
