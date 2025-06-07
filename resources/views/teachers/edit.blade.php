@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Cập nhật thông tin giảng viên</div>
    <div class="card-body">

        <form action="{{ url('teachers/' . $teachers->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$teachers->id}}" id="id" />

            <label>Tên giảng viên</label></br>
            <input type="text" name="name" id="name" value="{{$teachers->name}}" class="form-control"></br>

            <label>Địa chỉ</label></br>
            <input type="text" name="address" id="address" value="{{$teachers->address}}" class="form-control"></br>

            <label>Số điện thoại</label></br>
            <input type="text" name="mobile" id="mobile" value="{{$teachers->mobile}}" class="form-control"></br>

            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>

    </div>
</div>

@stop