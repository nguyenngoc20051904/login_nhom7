@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Thêm giảng viên</div>
  <div class="card-body">
      
      <form action="{{ url('teachers') }}" method="post">
        {!! csrf_field() !!}
        <label>Tên giảng viên</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Địa chỉ</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        <label>Số điện thoại</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop