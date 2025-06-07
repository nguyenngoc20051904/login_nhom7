@extends('layout')
@section('content')


<div class="card">
    <div class="card-header">Thông tin môn học</div>
    <div class="card-body">


        <div class="card-body">
            <h5 class="card-title">Tên môn học : {{ $courses->name }}</h5>
            <p class="card-text">Số tín chỉ : {{ $courses->syllabus }}</p>
            <p class="card-text">Thời gian : {{ $courses->duration() }}</p>
        </div>

        </hr>

    </div>
</div>
@endsection