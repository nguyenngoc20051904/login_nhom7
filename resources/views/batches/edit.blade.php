@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Cập nhật thông tin khoá học</div>
    <div class="card-body">

        <form action="{{ url('batches/' . $batches->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{ $batches->id }}" />

            <label>Tên khoá học</label><br>
            <input type="text" name="name" id="name" value="{{ $batches->name }}" class="form-control"><br>

            <label>Tên môn học</label><br>
            <select name="course_id" id="course_id" class="form-control">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $batches->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select><br>

            <label>Ngày bắt đầu</label><br>
            <input type="text" name="start_date" id="start_date" value="{{ $batches->start_date }}" class="form-control"><br>

            <label>Học phí</label><br>
            <input type="text" name="fee" id="fee" value="{{ $batches->fee }}" class="form-control"><br>

            <input type="submit" value="Update" class="btn btn-success"><br>
        </form>

    </div>
</div>

@stop