<li class="mb-1">

    <!-- Category Line -->
    <div class="d-flex align-items-center mb-1">
        <span class="fw-bold me-2">{{ $category->name }}</span>
        <small class="text-muted me-3">#{{ $category->id }}</small>

        <!-- Buttons -->
        <a href="{{ route('admin.categories.edit', $category->id) }}"
           class="btn btn-sm btn-outline-primary me-1 badge text-dark">
            Edit
        </a>

        <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}"
              class="d-inline-block"
              onsubmit="return confirm('Delete this Category?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger badge">Delete</button>
        </form>
    </div>

    <!-- Child Categories -->
    @if ($category->childrenRecursive->count())
        <ul class="ps-4 border-start ms-2">
            @foreach ($category->childrenRecursive as $child)
                @include('admin.categories.partials.node', ['category' => $child])
            @endforeach
        </ul>
    @endif

</li>
