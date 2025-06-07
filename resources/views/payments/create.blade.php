@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Thanh toán mới</div>
  <div class="card-body">

    <form action="{{ url('payments/') }}" method="post">
      {!! csrf_field() !!}

      <label>Mã đăng ký</label><br>
      <select name="enrollment_id" id="enrollment_id" class="form-control" onchange="updateAmount()">
        @foreach ($enrollments as $id => $enrollno)
          <option value="{{ $id }}" data-fee="{{ $fees[$id] }}">{{ $enrollno }}</option>
        @endforeach
      </select><br>

      <label>Ngày thanh toán</label><br>
      <input type="text" name="paid_date" id="paid_date" class="form-control"><br>

      <label>Số tiền cần thanh toán</label><br>
      <input type="text" name="amount" id="amount" class="form-control" readonly><br>

      <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

<script>
  // Store fees in a JavaScript object for easy access
  const fees = @json($fees);

  // Function to update the amount field based on selected enrollment
  function updateAmount() {
    const enrollmentId = document.getElementById('enrollment_id').value;
    const amountField = document.getElementById('amount');
    amountField.value = fees[enrollmentId] || 0; // Default to 0 if fee not found
  }

  // Set the initial amount when the page loads
  window.onload = updateAmount;
</script>

@stop