@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Khoá học mới</div>
  <div class="card-body">

    <form action="{{ url('batches/') }}" method="post">
      {!! csrf_field() !!}

      <label>Tên khoá học</label></br>
      <input type="text" name="name" id="name" class="form-control"></br>

      <label>Tên môn học</label></br>
      <select name="course_id" id="course_id" class="form-control">
      @foreach ($courses as $id =>  $name)
        <option value="{{ $id }}">{{ $name }}</option>
      @endforeach
      </select>

      <label>Ngày bắt đầu</label></br>
      <input type="text" name="start_date" id="start_date" class="form-control"></br>

      <label>Học phí</label></br>
      <input type="text" name="fee" id="fee" class="form-control"></br>

      <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
