@extends('layout')
@section('content')


<div class="card">
    <div class="card-header">Enrollment info</div>
    <div class="card-body">


        <div class="card-body">
            <h5 class="card-title">Mã đăng ký : {{ $enrollments->enroll_no }}</h5>
            <p class="card-text">Tên khoá học : {{ $enrollments->batch->name }}</p>
            <p class="card-text">Tên sinh viên : {{ $enrollments->student->name }}</p>
            <p class="card-text">Ngày đăng ký : {{ $enrollments->join_date }}</p>
            <p class="card-text">Học phí : {{ $enrollments->fee() }}</p>
        </div>

        </hr>

    </div>
</div>
@endsection