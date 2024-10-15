@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Pay Invoice for {{ $student->name }}</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if($outstandingInvoices->isEmpty())
    <p>No outstanding invoices to pay.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Invoice ID</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Payment Amount</th>
                <th>Remaining Balance</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outstandingInvoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>${{ number_format($invoice->amount, 2) }}</td>
                <td>{{ $invoice->description }}</td>
                <td>{{ $invoice->due_date }}</td>
                <td>
                    <form action="{{ route('student.pay_invoice', ['student' => $student->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                        <input type="number" name="payment_amount" min="0" max="{{ $invoice->amount }}" value="400"
                            class="form-control" required>
                        <button type="submit" class="btn btn-success">Pay Now</button>
                    </form>
                </td>
                <td>
                    <?php
                                // Calculate the remaining balance
                                $remainingBalance = $invoice->amount - ($invoice->payments()->sum('credit') ?? 0);
                                ?>
                    ${{ number_format($remainingBalance, 2) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection