@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Form đăng ký</div>
  <div class="card-body">

    <form action="{{ url('enrollments') }}" method="post">
      {!! csrf_field() !!}
      <label>Mã đăng ký</label><br>
      <input type="text" name="enroll_no" id="enroll_no" class="form-control" placeholder="Select course and student to see suggestion"><br>
      <label>Mã đăng ký gợi ý: <span id="enroll_no_suggestion">N/A</span></label><br><br>

      <label>Tên khoá học</label><br>
      <select name="batch_id" id="batch_id" class="form-control" onchange="updateCourseName(); updateEnrollmentSuggestion()">
        @foreach ($batches as $id => $name)
          <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
      </select><br>
      <label>Selected Course: <span id="selected_course_name">N/A</span></label><br><br>

      <label>Tên sinh viên</label><br>
      <select name="student_id" id="student_id" class="form-control" onchange="updateStudentName(); updateEnrollmentSuggestion()">
        @foreach ($students as $id => $name)
          <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
      </select><br>
      <label>Selected Student: <span id="selected_student_name">N/A</span></label><br><br>

      <label>Ngày đăng ký</label><br>
      <input type="text" name="join_date" id="join_date" class="form-control"><br>

      <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

<script>
  // Update course name label
  function updateCourseName() {
    const batchSelect = document.getElementById('batch_id');
    const selectedCourseName = batchSelect.options[batchSelect.selectedIndex].text;
    document.getElementById('selected_course_name').textContent = selectedCourseName || 'N/A';
  }

  // Update student name label
  function updateStudentName() {
    const studentSelect = document.getElementById('student_id');
    const selectedStudentName = studentSelect.options[studentSelect.selectedIndex].text;
    document.getElementById('selected_student_name').textContent = selectedStudentName || 'N/A';
  }

  // Update enrollment number suggestion
  function updateEnrollmentSuggestion() {
    const batchSelect = document.getElementById('batch_id');
    const studentSelect = document.getElementById('student_id');
    const courseName = batchSelect.options[batchSelect.selectedIndex].text;
    const studentName = studentSelect.options[studentSelect.selectedIndex].text;
    
    // Create suggestion (e.g., "CourseName-StudentName")
    const suggestion = courseName && studentName ? `${courseName}-${studentName}` : 'N/A';
    document.getElementById('enroll_no_suggestion').textContent = suggestion;
    
    // Optionally update the input field's placeholder
    document.getElementById('enroll_no').placeholder = suggestion !== 'N/A' ? `Suggested: ${suggestion}` : 'Select course and student to see suggestion';
  }

  // Initialize labels and suggestion on page load
  document.addEventListener('DOMContentLoaded', () => {
    updateCourseName();
    updateStudentName();
    updateEnrollmentSuggestion();
  });
</script>

@stop