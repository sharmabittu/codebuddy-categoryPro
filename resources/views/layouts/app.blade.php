<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #06b6d4;
            --dark-color: #1e293b;
            --light-gray: #f8f9fa;
            --border-color: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--light-gray);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar Styles */
        .navbar-custom {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar-brand i {
            font-size: 1.75rem;
        }

        .navbar-toggler {
            border: 2px solid rgba(255, 255, 255, 0.5);
            padding: 0.5rem 0.75rem;
            transition: all 0.3s ease;
        }

        .navbar-toggler:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: white;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            width: 1.5rem;
            height: 1.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25);
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            margin: 0 0.25rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .nav-link i {
            font-size: 1rem;
        }

        .dropdown-toggle::after {
            margin-left: 0.5rem;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-radius: 0.5rem;
            margin-top: 0.5rem;
            min-width: 200px;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-item {
            padding: 0.75rem 1.25rem;
            font-weight: 500;
            color: var(--dark-color);
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .dropdown-item:hover {
            background-color: var(--light-gray);
            color: var(--primary-color);
            padding-left: 1.5rem;
        }

        .dropdown-item i {
            font-size: 1rem;
            width: 20px;
        }

        .dropdown-divider {
            margin: 0.5rem 0;
            border-color: var(--border-color);
        }

        /* Main Content */
        main {
            flex: 1;
            padding: 2rem 0;
        }

        .container {
            max-width: 1200px;
        }

        /* Alert Styles */
        .alert {
            border-radius: 0.5rem;
            border: none;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
        }

        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .alert-warning {
            background-color: #fef3c7;
            color: #92400e;
        }

        .alert-info {
            background-color: #dbeafe;
            color: #1e40af;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 0.75rem 0.75rem 0 0 !important;
            padding: 1rem 1.5rem;
        }

        /* Button Styles */
        .btn {
            padding: 0.625rem 1.25rem;
            font-weight: 500;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(79, 70, 229, 0.3);
        }

        /* Responsive Utilities */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background-color: rgba(0, 0, 0, 0.05);
                padding: 1rem;
                border-radius: 0.5rem;
                margin-top: 1rem;
            }

            .nav-link {
                margin: 0.25rem 0;
            }

            .dropdown-menu {
                border: 1px solid rgba(255, 255, 255, 0.1);
                background-color: rgba(255, 255, 255, 0.95);
            }
        }

        @media (max-width: 767.98px) {
            .navbar-brand {
                font-size: 1.25rem;
            }

            main {
                padding: 1.5rem 0;
            }

            .card {
                margin-bottom: 1rem;
            }

            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        @media (max-width: 575.98px) {
            .navbar-brand {
                font-size: 1.1rem;
            }

            .navbar-brand i {
                font-size: 1.25rem;
            }

            main {
                padding: 1rem 0;
            }

            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }

        /* Loading Spinner */
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
            border-width: 0.15em;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--light-gray);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-color);
        }
    </style>

    @stack('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <i class="fas fa-sitemap"></i>
                    <span>{{ config('app.name', 'CategoryPro') }}</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                        @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.categories.index') }}">
                                <i class="fas fa-folder-tree"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">
                                <i class="fas fa-users"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fas fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i>
                                <span>{{ __('Login') }}</span>
                            </a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i>
                                <span>{{ __('Register') }}</span>
                            </a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                                <span>{{ Auth::user()->name }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span>Dashboard</span>
                                </a>

                                @if(Auth::user()->role === 'admin')
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="fas fa-eye"></i>
                                    <span>View as User</span>
                                </a>
                                @endif

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>{{ __('Logout') }}</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="fas fa-info-circle me-2"></i>
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts -->
    <script>
        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href !== '#navbarSupportedContent') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const navbar = document.querySelector('.navbar-collapse');
            const toggler = document.querySelector('.navbar-toggler');

            if (navbar && toggler) {
                const isClickInside = navbar.contains(event.target) || toggler.contains(event.target);

                if (!isClickInside && navbar.classList.contains('show')) {
                    toggler.click();
                }
            }
        });
    </script>

    @stack('scripts')
</body>

</html>