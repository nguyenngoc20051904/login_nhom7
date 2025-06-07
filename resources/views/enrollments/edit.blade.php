@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Cập nhật</div>
    <div class="card-body">

        <form action="{{ url('enrollments/' . $enrollments->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <label>Mã đăng ký</label><br>
            <input type="text" name="enroll_no" id="enroll_no" class="form-control"
                value="{{ $enrollments->enroll_no }}"><br>
            <label>Mã đăng ký gợi ý: <span id="enroll_no_suggestion">N/A</span></label><br><br>

            <label>Tên khoá học</label><br>
            <select name="batch_id" id="batch_id" class="form-control"
                onchange="updateCourseName(); updateEnrollmentSuggestion()">
                @foreach ($batches as $id => $name)
                    <option value="{{ $id }}" {{ $enrollments->batch_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select><br>
            <label>Selected Course: <span id="selected_course_name">N/A</span></label><br><br>

            <label>Tên sinh viên</label><br>
            <select name="student_id" id="student_id" class="form-control"
                onchange="updateStudentName(); updateEnrollmentSuggestion()">
                @foreach ($students as $id => $name)
                    <option value="{{ $id }}" {{ $enrollments->student_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select><br>
            <label>Selected Student: <span id="selected_student_name">N/A</span></label><br><br>

            <label>Ngày đăng ký</label><br>
            <input type="text" name="join_date" id="join_date" class="form-control"
                value="{{ $enrollments->join_date }}"><br>

            <label>Học phí</label><br>
            <input type="text" name="fee" id="fee" class="form-control" value="{{ $enrollments->fee }}"><br>

            <input type="submit" value="Update" class="btn btn-success"><br>
        </form>

    </div>
</div>

<script>
    function updateCourseName() {
        const batchSelect = document.getElementById('batch_id');
        const selectedCourseName = batchSelect.options[batchSelect.selectedIndex].text;
        document.getElementById('selected_course_name').textContent = selectedCourseName || 'N/A';
    }

    function updateStudentName() {
        const studentSelect = document.getElementById('student_id');
        const selectedStudentName = studentSelect.options[studentSelect.selectedIndex].text;
        document.getElementById('selected_student_name').textContent = selectedStudentName || 'N/A';
    }

    function updateEnrollmentSuggestion() {
        const batchSelect = document.getElementById('batch_id');
        const studentSelect = document.getElementById('student_id');
        const courseName = batchSelect.options[batchSelect.selectedIndex].text;
        const studentName = studentSelect.options[studentSelect.selectedIndex].text;
        const suggestion = courseName && studentName ? `${courseName}-${studentName}` : 'N/A';
        document.getElementById('enroll_no_suggestion').textContent = suggestion;
        document.getElementById('enroll_no').placeholder = suggestion !== 'N/A' ? `Suggested: ${suggestion}` : 'Select course and student to see suggestion';
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateCourseName();
        updateStudentName();
        updateEnrollmentSuggestion();
    });
</script>

@stop