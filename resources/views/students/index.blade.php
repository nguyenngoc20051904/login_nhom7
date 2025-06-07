@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Danh sách sinh viên</h2>
        </div>
        <div class="card-body">
            <a href="{{ url('/students/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                <i class="fa fa-plus" aria-hidden="true"></i> Thêm sinh viên
            </a>
            <br />
            <br />
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sinh viên</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->mobile }}</td>

                                <td>
                                    <a href="{{ url('/students/' . $item->id) }}" title="View Student">
                                        <button class="btn btn-info btn-sm">
                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                        </button>
                                    </a>

                                    @if(Auth::user()->role === 'admin')
                                        <a href="{{ url('/students/' . $item->id . '/edit') }}" title="Edit Student">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                            </button>
                                        </a>

                                        <form method="POST" action="{{ url('/students/' . $item->id) }}" accept-charset="UTF-8"
                                            style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Student"
                                                onclick="return confirm('Confirm delete?')">
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