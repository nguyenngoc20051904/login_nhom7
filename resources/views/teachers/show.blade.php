@extends('layout')
@section('content')


<div class="card">
    <div class="card-header">Thông tin giảng viên</div>
    <div class="card-body">


        <div class="card-body">
            <h5 class="card-title">Tên giảng viên : {{ $teachers->name }}</h5>
            <p class="card-text">Địa chỉ : {{ $teachers->address }}</p>
            <p class="card-text">Số điện thoại : {{ $teachers->mobile }}</p>
        </div>

        </hr>

    </div>
</div>
@endsection