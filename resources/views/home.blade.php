@extends('layout') <!-- hoặc tên file layout của bạn -->

@section('content')
<div class="container mt-4">
    <div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Chào mừng đến với hệ thống quản lý sinh viên</h3>
            <p class="card-text">
                Hệ thống <strong>Student Management</strong> giúp nhà trường dễ dàng quản lý thông tin sinh viên, giảng viên, môn học, khóa học và quá trình đăng ký học tập. 
            </p>
            <ul>
                <li>Quản lý sinh viên: thêm, sửa, xóa, tìm kiếm.</li>
                <li>Quản lý giảng viên.</li>
                <li>Quản lý các môn học giảng dạy.</li>
                <li>Quản lý các khóa học và lịch sử đăng ký của sinh viên.</li>
                <li>Quản lý thanh toán.</li>

            </ul>
        </div>
    </div>
</div>
    <h3 class="mb-4">Tổng quan hệ thống</h3>
    <div class="row g-4">
        <!-- Card Sinh viên -->
        <div class="col-md-4">
            <div class="card border-success shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Sinh viên</h5>
                    <p class="card-text">Quản lý thông tin sinh viên</p>
                    <a href="{{ url('/students') }}" class="btn btn-success">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <!-- Card Giảng viên -->
        <div class="col-md-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Giảng viên</h5>
                    <p class="card-text">Quản lý thông tin giảng viên</p>
                    <a href="{{ url('/teachers') }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <!-- Card Môn học -->
        <div class="col-md-4">
            <div class="card border-warning shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Môn học</h5>
                    <p class="card-text">Danh sách các môn học</p>
                    <a href="{{ url('/courses') }}" class="btn btn-warning text-white">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <!-- Card Khoá học -->
        <div class="col-md-4">
            <div class="card border-info shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Khoá học</h5>
                    <p class="card-text">Thông tin các khoá học</p>
                    <a href="{{ url('/batches') }}" class="btn btn-info text-white">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <!-- Card Đăng ký -->
        <div class="col-md-4">
            <div class="card border-secondary shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Đăng ký khoá học</h5>
                    <p class="card-text">Quản lý đăng ký của sinh viên</p>
                    <a href="{{ url('/enrollments') }}" class="btn btn-secondary">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <!-- Card Thanh toán -->
        <div class="col-md-4">
            <div class="card border-danger shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Thanh toán</h5>
                    <p class="card-text">Theo dõi và quản lý thanh toán</p>
                    <a href="{{ url('/payments') }}" class="btn btn-danger">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
