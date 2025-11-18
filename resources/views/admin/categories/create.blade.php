@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Create Category</h3>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label>Name</label>
                <input placeholder="Enter name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="col-md-6">
                <label>Parent</label>
                <select name="parent_id" class="form-control">
                    <option value="">— None —</option>
                    @foreach($allCategories as $cat)
                    <option value="{{ $cat->id }}" {{ old('parent_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <label>Description</label>
                <textarea placeholder="Enter description" name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
        </div>
        <button class="btn btn-primary mt-3">Save</button>
    </form>
</div>
@endsection