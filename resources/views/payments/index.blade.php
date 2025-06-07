@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Danh sách thanh toán</h2>
        </div>
        <div class="card-body">

            {{-- Chỉ admin mới thấy nút Thanh toán mới --}}
            @if (Auth::user()->role === 'admin')
                <a href="{{ url('/payments/create') }}" class="btn btn-success btn-sm" title="Thêm thanh toán mới">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thanh toán mới
                </a>
                <br /><br />
            @endif

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã đăng ký</th>
                            <th>Ngày thanh toán</th>
                            <th>Số tiền đã thanh toán</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->enrollment->enroll_no }}</td>
                                <td>{{ $item->paid_date }}</td>
                                <td>{{ $item->amount() }}</td>
                                <td>
                                    {{-- Mọi người đều có thể xem và in --}}
                                    <a href="{{ url('/payments/' . $item->id) }}" title="Xem thanh toán">
                                        <button class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</button>
                                    </a>

                                    <a href="{{ url('/report/report1/'.$item->id) }}" title="In hoá đơn">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-print"></i> Print</button>
                                    </a>

                                    {{-- Chỉ admin mới được sửa và xoá --}}
                                    @if (Auth::user()->role === 'admin')
                                       

                                        <form method="POST" action="{{ url('/payments/' . $item->id) }}"
                                              accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Xoá thanh toán"
                                                    onclick="return confirm('Bạn có chắc muốn xoá?')">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
