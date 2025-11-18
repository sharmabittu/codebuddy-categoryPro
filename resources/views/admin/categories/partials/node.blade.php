<li class="tree-item">
    <!-- Category Line with Tree Connectors -->
    <div class="tree-node">
        <!-- Tree Branch Lines -->
        <div class="tree-branch">
            @if ($category->childrenRecursive->count())
            <span class="tree-toggle">▼</span>
            @else
            <span class="tree-bullet">●</span>
            @endif
        </div>

        <!-- Category Content -->
        <div class="tree-content">
            <span class="fw-bold">{{ $category->name }}</span>
            <small class="text-muted ms-2">#{{ $category->id }}</small>

            <!-- Action Buttons -->
            <div class="tree-actions">
                <a href="{{ route('admin.categories.edit', $category->id) }}"
                    class="btn btn-sm btn-outline-primary">
                    Edit
                </a>

                <form method="POST"
                    action="{{ route('admin.categories.destroy', $category->id) }}"
                    class="d-inline-block"
                    onsubmit="return confirm('Delete this Category?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Child Categories -->
    @if ($category->childrenRecursive->count())
    <ul class="tree-children">
        @foreach ($category->childrenRecursive as $child)
        @include('admin.categories.partials.node', ['category' => $child])
        @endforeach
    </ul>
    @endif
</li>
<style>
    /* Tree Structure Styles */
    .tree-children {
        list-style: none;
        padding-left: 0;
        margin-left: 30px;
        position: relative;
    }

    .tree-item {
        position: relative;
        margin: 8px 0;
    }

    .tree-node {
        display: flex;
        align-items: center;
        padding: 8px;
        border-radius: 4px;
        transition: background-color 0.2s;
    }

    .tree-node:hover {
        background-color: #f8f9fa;
    }

    .tree-branch {
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 8px;
        flex-shrink: 0;
    }

    .tree-toggle {
        font-size: 12px;
        color: #6c757d;
        cursor: pointer;
        user-select: none;
    }

    .tree-bullet {
        font-size: 8px;
        color: #adb5bd;
    }

    .tree-content {
        display: flex;
        align-items: center;
        flex-grow: 1;
        gap: 12px;
    }

    .tree-actions {
        margin-left: auto;
        display: flex;
        gap: 8px;
    }

    /* Vertical connecting lines */
    .tree-children::before {
        content: '';
        position: absolute;
        left: -18px;
        top: 0;
        bottom: 0;
        width: 1px;
        background-color: #dee2e6;
    }

    /* Horizontal connecting lines */
    .tree-item::before {
        content: '';
        position: absolute;
        left: -18px;
        top: 20px;
        width: 18px;
        height: 1px;
        background-color: #dee2e6;
    }

    /* Remove line from last child */
    .tree-item:last-child::after {
        content: '';
        position: absolute;
        left: -18px;
        top: 20px;
        bottom: 0;
        width: 1px;
        background-color: #fff;
    }
</style>