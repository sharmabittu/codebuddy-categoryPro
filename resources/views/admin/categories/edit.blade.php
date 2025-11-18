@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Category</h3>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input id="name" name="name" value="{{ old('name', $category->name) }}" required class="form-control">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group mb-2">
            <label for="parent_id">Parent</label>
            <select id="parent_id" name="parent_id" class="form-control">
                <option value="">— None —</option>
                @foreach($allCategories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ (old('parent_id', $category->parent_id) == $cat->id) ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('parent_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
</div>
@endsection
