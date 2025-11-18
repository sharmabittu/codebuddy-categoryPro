<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Category Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #06b6d4;
            --dark-color: #1e293b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><rect width="100" height="100" fill="none"/><circle cx="50" cy="50" r="40" stroke="rgba(255,255,255,0.1)" stroke-width="2" fill="none"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .btn-custom {
            padding: 12px 30px;
            font-size: 1.1rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0 10px;
        }

        .btn-light-custom {
            background: white;
            color: var(--primary-color);
            border: none;
        }

        .btn-light-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            background: #f8f9fa;
            color: var(--primary-color);
        }

        .btn-outline-custom {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline-custom:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .features-section {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: white;
            font-size: 2rem;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark-color);
        }

        .feature-description {
            color: #64748b;
            line-height: 1.6;
        }

        .navbar-custom {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }

        .nav-link {
            color: var(--dark-color) !important;
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .cta-section {
            background: var(--dark-color);
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .cta-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        footer {
            background: #0f172a;
            color: white;
            padding: 30px 0;
            text-align: center;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }

            .btn-custom {
                margin: 10px 0;
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-sitemap"></i> CategoryPro
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary ms-2 px-4" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-2 px-4 text-white" href="{{ route('register') }}">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->isAdmin())
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                            @else
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">User Dashboard</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center hero-content">
                    <h1 class="hero-title">Organize Your Categories Effortlessly</h1>
                    <p class="hero-subtitle">
                        Powerful category management system with unlimited nested levels. 
                        Perfect for e-commerce, blogs, and content management.
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('register') }}" class="btn btn-light-custom btn-custom">
                            <i class="fas fa-rocket"></i> Get Started Free
                        </a>
                        <a href="#features" class="btn btn-outline-custom btn-custom">
                            <i class="fas fa-info-circle"></i> Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold mb-3">Powerful Features</h2>
                <p class="lead text-muted">Everything you need to manage categories efficiently</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <h3 class="feature-title">Unlimited Nested Categories</h3>
                        <p class="feature-description">
                            Create unlimited levels of categories and subcategories. 
                            Organize your content exactly the way you want.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <h3 class="feature-title">Role-Based Access</h3>
                        <p class="feature-description">
                            Separate admin and user dashboards with proper access control. 
                            Admins have full control over categories and users.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <h3 class="feature-title">Tree View Visualization</h3>
                        <p class="feature-description">
                            Beautiful tree view display of all categories. 
                            See your entire category structure at a glance.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <h3 class="feature-title">Full CRUD Operations</h3>
                        <p class="feature-description">
                            Create, read, update, and delete categories with ease. 
                            Intuitive interface for all operations.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="feature-title">Secure Authentication</h3>
                        <p class="feature-description">
                            Built-in Laravel authentication with role management. 
                            Your data is safe and secure.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <h3 class="feature-title">Intuitive Dashboard</h3>
                        <p class="feature-description">
                            Clean and modern dashboard interface. 
                            Manage everything from one central location.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="about">
        <div class="container">
            <h2 class="cta-title">Ready to Get Started?</h2>
            <p class="lead mb-4">Join thousands of users managing their categories efficiently</p>
            <a href="{{ route('register') }}" class="btn btn-light-custom btn-custom btn-lg">
                <i class="fas fa-user-plus"></i> Create Your Account
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p class="mb-0">&copy; 2024 CategoryPro. All rights reserved.</p>
            <p class="mb-0 mt-2">
                <small>Built with <i class="fas fa-heart text-danger"></i> using Laravel 8 & Bootstrap 5</small>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>