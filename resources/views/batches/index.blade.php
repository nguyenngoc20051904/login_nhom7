@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Danh sách khoá học</h2>
        </div>
        <div class="card-body">

            {{-- Chỉ admin mới thấy nút thêm --}}
            @if (Auth::user()->role === 'admin')
                <a href="{{ url('/batches/create') }}" class="btn btn-success btn-sm" title="Add New Course">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm khoá học
                </a>
                <br /><br />
            @endif

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên khoá học</th>
                            <th>Tên môn học</th>
                            <th>Ngày bắt đầu</th>
                            <th>Học phí</th> <!-- Thêm cột học phí -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($batches as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->course->name }}</td>
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->fee() }}</td> <!-- Hiển thị học phí -->
                                <td>
                                    {{-- Mọi user đều có thể xem --}}
                                    <a href="{{ url('/batches/' . $item->id) }}" title="Xem khoá học">
                                        <button class="btn btn-info btn-sm">
                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                        </button>
                                    </a>

                                    {{-- Chỉ admin mới có thể sửa/xoá --}}
                                    @if (Auth::user()->role === 'admin')
                                        <a href="{{ url('/batches/' . $item->id . '/edit') }}" title="Sửa khoá học">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                            </button>
                                        </a>

                                        <form method="POST" action="{{ url('/batches/' . $item->id) }}" accept-charset="UTF-8"
                                              style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Xoá khoá học"
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
