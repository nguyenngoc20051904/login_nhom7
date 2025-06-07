@extends('layout')
@section('content')


<div class="card">
    <div class="card-header">Thông tin khoá học</div>
    <div class="card-body">


        <div class="card-body">
            <h5 class="card-title">Tên khoá học : {{ $batches->name }}</h5>
            <p class="card-text">Tên môn học : {{ $batches->course->name }}</p>
            <p class="card-text">Ngày bắt đầu : {{ $batches->start_date }}</p>
            <p class="card-text">Học phí : {{ $batches->fee() }}</p>
        </div>

        </hr>

    </div>
</div>
@endsection