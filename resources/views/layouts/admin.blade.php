<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم -ageisegy </title>
    
    <!-- Bootstrap RTL -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        .admin-sidebar {
            min-height: 100vh;
            background-color: #2c3e50;
            color: white;
        }

        .admin-sidebar .nav-link {
            color: rgba(255,255,255,.8);
            padding: 0.8rem 1rem;
            margin: 0.2rem 0;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background-color: rgba(255,255,255,.1);
            color: white;
        }

        .admin-sidebar .nav-link i {
            margin-left: 10px;
        }

        .admin-content {
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .top-navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }

        .user-dropdown .dropdown-toggle::after {
            display: none;
        }

        .user-dropdown .dropdown-menu {
            min-width: 200px;
            padding: 0.5rem 0;
        }

        .user-dropdown .dropdown-item {
            padding: 0.5rem 1.5rem;
        }

        .user-dropdown .dropdown-item i {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="admin-sidebar p-3" style="width: 280px;">
            <h3 class="text-center mb-4 py-3">ageisegy</h3>
            <nav class="nav flex-column">
                <a href="{{route('dashboard')}}" class="nav-link">
                    <i class="bi bi-speedometer2"></i>
                    dashboard
                     
                </a>
                <a href="{{ route('products.create') }}" class="nav-link {{ request()->routeIs('products.create') ? 'active' : '' }}">
                    <i class="bi bi-plus-lg"></i>
                     add product
                </a>
                <a href="{{route('products.index')}}" class="nav-link">
                    <i class="bi bi-box"></i>
                    products
                </a>
                <a href="{{route('admin.orders.index')}}" class="nav-link">
                    <i class="bi bi-cart"></i>
                    orders
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="admin-content flex-grow-1">
            <!-- Top Navbar -->
            <nav class="top-navbar navbar navbar-expand-lg navbar-light px-4 py-3">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarContent">
                        <!-- Right Side -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item dropdown user-dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-person-circle fs-5 me-2"></i>
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-person"></i>
                                            الملف الشخصي
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-gear"></i>
                                            الإعدادات
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-box-arrow-right"></i>
                                                تسجيل الخروج
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>