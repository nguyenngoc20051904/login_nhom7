@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Thêm môn học</div>
  <div class="card-body">
      
      <form action="{{ url('courses') }}" method="post">
        {!! csrf_field() !!}
        <label>Tên môn học</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>

        <label>Số tín chỉ</label></br>
        <input type="text" name="syllabus" id="syllabus" class="form-control"></br>

        <label>Thời gian</label></br>
        <input type="text" name="duration" id="duration" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop