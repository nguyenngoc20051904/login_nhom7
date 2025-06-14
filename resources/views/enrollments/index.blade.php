@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Danh sách đăng ký</h2>
        </div>
        <div class="card-body">

            {{-- Chỉ admin mới thấy nút Đăng ký mới --}}
            @if ((Auth::user()->role === 'admin') || Auth::user()->role === 'user')
                <a href="{{ url('/enrollments/create') }}" class="btn btn-success btn-sm" title="Thêm đăng ký mới">
                    <i class="fa fa-plus" aria-hidden="true"></i> Đăng ký mới
                </a>
                <br /><br />
            @endif

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã đăng ký</th>
                            <th>Tên khoá học</th>
                            <th>Tên sinh viên</th>
                            <th>Ngày đăng ký</th>
                            <th>Học phí</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enrollments as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->enroll_no }}</td>
                                <td>{{ $item->batch->name }}</td>
                                <td>{{ $item->student->name }}</td>
                                <td>{{ $item->join_date }}</td>
                                <td>{{ $item->fee() }}</td>
                                <td>
                                    {{-- Ai cũng có thể xem --}}
                                    <a href="{{ url('/enrollments/' . $item->id) }}" title="Xem thông tin đăng ký">
                                        <button class="btn btn-info btn-sm">
                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                        </button>
                                    </a>

                                    {{-- Chỉ admin mới có thể sửa / xoá --}}
                                    @if (Auth::user()->role === 'admin')
                                        <a href="{{ url('/enrollments/' . $item->id . '/edit') }}" title="Chỉnh sửa">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                            </button>
                                        </a>

                                        <form method="POST" action="{{ url('/enrollments/' . $item->id) }}"
                                              accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Xoá"
                                                    onclick="return confirm('Bạn có chắc muốn xoá?')">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
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
