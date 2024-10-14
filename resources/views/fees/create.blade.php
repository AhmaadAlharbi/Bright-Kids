@extends('layouts.master')

@section('content')
<h1>{{ isset($fee) ? 'Edit' : 'Create' }} Fee</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ isset($fee) ? route('fees.update', $fee) : route('fees.store') }}" method="POST">
    @csrf
    @if(isset($fee))
    @method('PUT')
    @endif

    <div class="form-group">
        <label for="student_id">Student</label>
        <select class="form-control" id="student_id" name="student_id" required>
            @foreach($students as $student)
            <option value="{{ $student->id }}" {{ old('student_id', $fee->student_id ?? '') == $student->id ? 'selected'
                : '' }}>
                {{ $student->first_name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="fee_type_id">Fee Type</label>
        <select class="form-control" id="fee_type_id" name="fee_type_id" required>
            @foreach($feeTypes as $feeType)
            <option value="{{ $feeType->id }}" {{ old('fee_type_id', $fee->fee_type_id ?? '') == $feeType->id ?
                'selected' : '' }}>
                {{ $feeType->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" class="form-control" id="start_date" name="start_date"
            value="{{ old('start_date', isset($fee) ? $fee->start_date->format('Y-m-d') : '') }}">
    </div>

    <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" class="form-control" id="end_date" name="end_date"
            value="{{ old('end_date', isset($fee) ? $fee->end_date->format('Y-m-d') : '') }}">
    </div>

    <div class="form-group">
        <label for="total_amount">Total Amount</label>
        <input type="number" step="0.01" class="form-control" id="total_amount" name="total_amount"
            value="{{ old('total_amount', $fee->total_amount ?? '') }}" required>

    </div>

    <div class="form-group">
        <label for="paid_amount">Paid Amount</label>
        <input type="number" step="0.01" class="form-control" id="paid_amount" name="paid_amount"
            value="{{ old('paid_amount', $fee->paid_amount ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" class="form-control" id="due_date" name="due_date"
            value="{{ old('due_date', isset($fee) ? $fee->due_date->format('Y-m-d') : '') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">{{ isset($fee) ? 'Update' : 'Create' }} Fee</button>
</form>

@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () 
    {
       
        // Get the fee_type_id dropdown and total_amount input
        const feeTypeSelect = document.getElementById('fee_type_id');
        const totalAmountInput = document.getElementById('total_amount');

        // Listen for changes on the fee_type_id select element
        feeTypeSelect.addEventListener('change', function () {
            const feeTypeId = this.value;

            if (feeTypeId) {
                // Make an AJAX request using fetch to get the fee type data
                fetch('/fee-types/' + feeTypeId)
                    .then(response => response.json())
                    .then(data => {
                        // Set the total_amount field with the fetched total_amount
                        totalAmountInput.value = data.amount;
                    })
                    .catch(error => {
                        console.error('Error fetching fee type details:', error);
                    });
            }
        });
    });
</script>

@endsection