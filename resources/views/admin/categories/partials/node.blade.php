<div class="mb-2">
    <!-- Category Line -->
    <div class="d-flex align-items-center p-2 bg-light border rounded">
        <!-- Indent Spacer (for nested items) -->
        <span class="me-2">
            @if ($category->childrenRecursive->count())
                <span class="badge bg-primary">+</span>
            @else
                <span class="text-muted">-</span>
            @endif
        </span>

        <!-- Category Info -->
        <span class="fw-bold me-2">{{ $category->name }}</span>
        <span class="badge bg-secondary">#{{ $category->id }}</span>

        <!-- Actions -->
        <div class="ms-auto">
            <a href="{{ route('admin.categories.edit', $category->id) }}"
               class="btn btn-sm btn-outline-primary me-1">
                Edit
            </a>

            <form method="POST" 
                  action="{{ route('admin.categories.destroy', $category->id) }}"
                  class="d-inline"
                  onsubmit="return confirm('Delete?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
        </div>
    </div>

    <!-- Children -->
    @if ($category->childrenRecursive->count())
        <div class="ms-4 mt-2 ps-3 border-start border-3">
            @foreach ($category->childrenRecursive as $child)
                @include('admin.categories.partials.node', ['category' => $child])
            @endforeach
        </div>
    @endif
</div>