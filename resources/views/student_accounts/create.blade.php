@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Record Payment for {{ $student->first_name }} {{ $student->last_name }}</h1>
    <form action="{{ route('student_accounts.store') }}" method="POST">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">

        <div class="form-group">
            <label for="fee_invoice_id">Fee Invoice</label>
            <select name="fee_invoice_id" id="fee_invoice_id" class="form-control" required>
                @foreach($feeInvoices as $feeInvoice)
                <option value="{{ $feeInvoice->id }}">
                    {{ $feeInvoice->fee->title }} - Due: ${{ number_format($feeInvoice->amount -
                    $feeInvoice->student_accounts->sum('credit'), 2) }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="credit">Payment Amount</label>
            <input type="number" name="credit" id="credit" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="date">Payment Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Record Payment</button>
    </form>
</div>
@endsection