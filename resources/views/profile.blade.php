@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Thông tin cá nhân</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Họ tên</th>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                    <th>Vai trò</th>
                    <td>{{ Auth::user()->role }}</td>
                </tr>
                <tr>
                    <th>Ngày tạo</th>
                    <td>{{ Auth::user()->created_at->format('d/m/Y') }}</td>
                </tr>
            </table>

            <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Quay lại trang chính</a>
        </div>
    </div>
@endsection
