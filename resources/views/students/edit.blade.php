@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Cập nhật thông tin sinh viên</div>
    <div class="card-body">

        <form action="{{ url('students/' . $students->id) }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$students->id}}" />

            <label>Tên sinh viên</label></br>
            <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control"></br>

            <label>Địa chỉ</label></br>
            <input type="text" name="address" id="address" value="{{$students->address}}" class="form-control"></br>

            <label>Số điện thoại</label></br>
            <input type="text" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control"></br>

            <label>Ảnh đại diện</label></br>
            <input type="file" name="avatar" id="avatar" class="form-control"></br>

            {{-- Hiển thị ảnh hiện tại nếu có --}}
            @if ($students->avatar)
                <div class="mb-3">
                    <img src="{{ asset($students->avatar) }}" alt="Ảnh đại diện"
                        style="max-width: 200px; border-radius: 8px;">
                </div>
            @endif

            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>


    </div>
</div>

@stop