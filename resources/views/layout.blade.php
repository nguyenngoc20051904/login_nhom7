<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <title>Student Management</title>
    <style>
        /* Navbar padding fix */
        body {
            padding-top: 70px;
            /* Điều chỉnh nếu navbar cao hơn hoặc thấp hơn */
        }

        /* The side navigation menu */
        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        /* Sidebar links */
        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        /* Active/current link */
        .sidebar a.active {
            background-color: #04AA6D;
            color: white;
        }

        /* Links on mouse-over */
        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        /* Page content */
        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        /* Responsive: sidebar to topbar */
        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        /* Responsive: vertical menu on very small screens */
        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- ✅ Navbar fixed-top -->
                <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">
                            <h2>Student Management</h2>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                @guest
                                    <!-- Khi chưa đăng nhập -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                                    </li>
                                @else
                                    <!-- Khi đã đăng nhập -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Thông tin cá
                                                    nhân</a></li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button class="dropdown-item" type="submit">Đăng xuất</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <!-- Sidebar -->
                <div class="sidebar">
                    <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>

                    @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'user']))
                        <a class="{{ request()->is('students*') ? 'active' : '' }}" href="{{ url('/students') }}">Sinh
                            viên</a>
                    @endif

                    @if (Auth::check() && Auth::user()->role === 'admin')

                        <a class="{{ request()->is('teachers*') ? 'active' : '' }}" href="{{ url('/teachers') }}">Giảng
                            viên</a>
                        <a class="{{ request()->is('courses*') ? 'active' : '' }}" href="{{ url('/courses') }}">Môn học</a>
                    @endif

                    @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'user']))
                        <a class="{{ request()->is('batches*') ? 'active' : '' }}" href="{{ url('/batches') }}">Khoá học</a>
                        <a class="{{ request()->is('enrollments*') ? 'active' : '' }}" href="{{ url('/enrollments') }}">Đăng
                            ký khoá học</a>
                        <a class="{{ request()->is('payments*') ? 'active' : '' }}" href="{{ url('/payments') }}">Thanh
                            toán</a>
                    @endif
                </div>


            </div>
            <div class="col-md-10">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>