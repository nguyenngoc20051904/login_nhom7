@extends('layout')
@section('content')


<div class="card">
    <div class="card-header">Thông tin thanh toán</div>
    <div class="card-body">


        <div class="card-body">
            <h5 class="card-title">Mã đăng ký : {{ $payments->enrollment->enroll_no }}</h5>
            <p class="card-text">Ngày thanh toán : {{ $payments->paid_date }}</p>
            <p class="card-text">Số tiền thanh toán : {{ $payments->amount() }}</p>
        </div>

        </hr>

    </div>
</div>
@endsection