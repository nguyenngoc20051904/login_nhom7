@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Cập nhật thông tin môn học</div>
    <div class="card-body">

        <form action="{{ url('courses/' . $courses->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$courses->id}}" id="id" />

            <label>Tên môn học</label></br>
            <input type="text" name="name" id="name" value="{{$courses->name}}" class="form-control"></br>

            <label>Số tín chỉ</label></br>
            <input type="text" name="syllabus" id="syllabus" value="{{$courses->syllabus}}" class="form-control"></br>

            <label>Thời gian</label></br>
            <input type="text" name="duration" id="duration" value="{{$courses->duration}}" class="form-control"></br>
            
            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>

    </div>
</div>

@stop