@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Categories (Paginated)</h3>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">View Tree View</a>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create Category</a>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paginated as $index => $cat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->parent ? $cat->parent->name : '-' }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                    <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete category?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $paginated->links() }}
    </div>
</div>
@endsection