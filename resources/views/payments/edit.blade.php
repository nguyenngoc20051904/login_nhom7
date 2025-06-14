@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Cập nhật</div>
    <div class="card-body">

        <form action="{{ url('payments/' . $payments->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$payments->id}}" id="id" />

            <label>Mã đăng ký</label></br>
            <select name="enrollment_id" id="enrollment_id" class="form-control">
                @foreach ($enrollments as $id => $enrollno)
                    <option value="{{ $id }}">{{ $enrollno }}</option>
                @endforeach
            </select>

            <label>Ngày thanh toán</label></br>
            <input type="text" name="paid_date" id="paid_date" value="{{$payments->paid_date}}"
                class="form-control"></br>

            <label>Amount</label></br>
            <input type="text" name="amount" id="amount" value="{{$payments->amount}}" class="form-control"></br>

            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>

    </div>
</div>

@stop