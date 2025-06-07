@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Thông tin sinh viên</div>
    <div class="card-body">

        @if ($students->avatar)
            <div class="mb-3 text-center">
                <img src="{{ asset($students->avatar) }}" alt="Ảnh đại diện" style="max-width: 200px; border-radius: 8px;">
                <p class="card-text">Ảnh của {{ $students->name }}</p>
            </div>
        @endif

        <div class="card-body">
            <h5 class="card-title">Tên sinh viên : {{ $students->name }}</h5>
            <p class="card-text">Địa chỉ : {{ $students->address }}</p>
            <p class="card-text">Số điện thoại : {{ $students->mobile }}</p>
        </div>

    </div>
</div>
@endsection
