@extends('layouts.app')
@section('title', 'Admin Dashboard')

@push('styles')
<style>
    .dashboard-header {
        background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
        color: white;
        padding: 2rem;
        border-radius: 1rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(79, 70, 229, 0.2);
    }

    .dashboard-header h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .dashboard-header p {
        opacity: 0.9;
        margin: 0;
    }

    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
        transition: all 0.3s ease;
        border: none;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .stat-card .icon-box {
        width: 70px;
        height: 70px;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .stat-card.users .icon-box {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .stat-card.categories .icon-box {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }

    .stat-card.admins .icon-box {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
    }

    .stat-card.activity .icon-box {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white;
    }

    .stat-card h3 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        color: #1e293b;
    }

    .stat-card p {
        color: #64748b;
        margin: 0;
        font-weight: 500;
    }

    .quick-actions {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
    }

    .quick-actions h5 {
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
    }

    .action-btn {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 0.75rem;
        text-decoration: none;
        color: #1e293b;
        transition: all 0.3s ease;
        margin-bottom: 1rem;
        border: 2px solid transparent;
    }

    .action-btn:hover {
        background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
        color: white;
        transform: translateX(5px);
        border-color: transparent;
    }

    .action-btn .icon {
        width: 45px;
        height: 45px;
        background: white;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        transition: all 0.3s ease;
    }

    .action-btn:hover .icon {
        background: rgba(255, 255, 255, 0.2);
        color: white;
    }

    .category-tree-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
        max-height: 500px;
        overflow-y: auto;
    }

    .category-tree-card h5 {
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .tree-view {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .tree-view ul {
        list-style: none;
        padding-left: 1.5rem;
        margin-top: 0.5rem;
    }

    .tree-item {
        padding: 0.75rem;
        margin: 0.5rem 0;
        background: #f8f9fa;
        border-radius: 0.5rem;
        border-left: 3px solid #4f46e5;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .tree-item:hover {
        background: #e7e5ff;
        transform: translateX(3px);
    }

    .tree-item i {
        margin-right: 0.5rem;
        color: #4f46e5;
    }

    .recent-users {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
    }

    .recent-users h5 {
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
    }

    .user-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 0.75rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .user-item:hover {
        background: #e7e5ff;
        transform: scale(1.02);
    }

    .user-avatar {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1.2rem;
    }

    .user-info {
        flex: 1;
    }

    .user-info .name {
        font-weight: 600;
        color: #1e293b;
        margin: 0;
    }

    .user-info .email {
        color: #64748b;
        font-size: 0.875rem;
        margin: 0;
    }

    .badge-role {
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-admin {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }

    .badge-user {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white;
    }

    @media (max-width: 768px) {
        .dashboard-header h1 {
            font-size: 1.5rem;
        }

        .stat-card h3 {
            font-size: 2rem;
        }

        .stat-card .icon-box {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="container">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h1><i class="fas fa-chart-line me-2"></i>Admin Dashboard</h1>
                <p>Welcome back, {{ Auth::user()->name }}! Here's what's happening with your platform today.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <span class="badge bg-light text-dark px-3 py-2">
                    <i class="far fa-calendar me-2"></i>{{ date('F d, Y') }}
                </span>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="stat-card users">
                <div class="icon-box">
                    <i class="fas fa-users"></i>
                </div>
                <h3>{{ $userCount ?? 0 }}</h3>
                <p>Total Users</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stat-card categories">
                <div class="icon-box">
                    <i class="fas fa-folder-tree"></i>
                </div>
                <h3>{{ $categoryCount ?? 0 }}</h3>
                <p>Total Categories</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stat-card admins">
                <div class="icon-box">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h3>{{ $adminCount ?? 0 }}</h3>
                <p>Admin Users</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stat-card activity">
                <div class="icon-box">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h3>{{ $recentActivityCount ?? 0 }}</h3>
                <p>Recent Activities</p>
            </div>
        </div>
    </div>

    <!-- Main Content Row -->
    <div class="row g-4">
        <!-- Quick Actions -->
        <div class="col-lg-4">
            <div class="quick-actions">
                <h5><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
                
                <a href="{{ route('admin.categories.create') }}" class="action-btn">
                    <div class="icon">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div>
                        <strong>Add New Category</strong>
                        <small class="d-block text-muted">Create a new category</small>
                    </div>
                </a>

                <a href="{{ route('admin.users.index') }}" class="action-btn">
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <strong>Manage Users</strong>
                        <small class="d-block text-muted">View and edit users</small>
                    </div>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="action-btn">
                    <div class="icon">
                        <i class="fas fa-sitemap"></i>
                    </div>
                    <div>
                        <strong>View Category Tree</strong>
                        <small class="d-block text-muted">Browse all categories</small>
                    </div>
                </a>

                <a href="{{ route('dashboard') }}" class="action-btn">
                    <div class="icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div>
                        <strong>View as User</strong>
                        <small class="d-block text-muted">See user dashboard</small>
                    </div>
                </a>
            </div>

            <!-- Recent Users -->
            <div class="recent-users mt-4">
                <h5><i class="fas fa-user-clock me-2"></i>Recent Users</h5>
                @forelse($recentUsers ?? [] as $user)
                <div class="user-item">
                    <div class="user-avatar">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div class="user-info">
                        <p class="name">{{ $user->name }}</p>
                        <p class="email">{{ $user->email }}</p>
                    </div>
                    <span class="badge-role {{ $user->role === 'admin' ? 'badge-admin' : 'badge-user' }}">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>
                @empty
                <div class="text-center text-muted py-4">
                    <i class="fas fa-user-slash fa-3x mb-3 opacity-25"></i>
                    <p>No recent users</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Category Tree -->
        <div class="col-lg-8">
            <div class="category-tree-card">
                <h5>
                    <span><i class="fas fa-project-diagram me-2"></i>Category Tree View</span>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-expand me-1"></i>View Full Tree
                    </a>
                </h5>
                
                @if(isset($categories) && $categories->count() > 0)
                    <ul class="tree-view">
                        @foreach($categories as $category)
                            @include('admin.categories.partials.node', ['category' => $category])
                        @endforeach
                    </ul>
                @else
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-folder-open fa-4x mb-3 opacity-25"></i>
                        <h5>No Categories Yet</h5>
                        <p>Start by creating your first category</p>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-plus me-2"></i>Create Category
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    // Add animation on page load
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.stat-card, .quick-actions, .category-tree-card, .recent-users');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.5s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 50);
            }, index * 100);
        });
    });
</script>