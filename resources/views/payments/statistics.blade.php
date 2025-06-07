@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Thống kê thanh toán</h2>
        </div>
        <div class="card-body">
            <p><strong>Tổng số thanh toán:</strong> {{ $totalPayments }}</p>
            <p><strong>Tổng số tiền đã thu:</strong> {{ number_format($totalAmount, 0, ',', '.') }} VNĐ</p>

            <h5>Thống kê theo tháng:</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tháng</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monthlyStats as $stat)
                        <tr>
                            <td>{{ $stat->month }}</td>
                            <td>{{ number_format($stat->total, 0, ',', '.') }} VNĐ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
