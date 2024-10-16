@extends('layouts.master')

@section('content')
<div class="container py-5">
    <h1 class="display-4 mb-5 text-primary">School Payments Overview</h1>

    <div class="row mb-5">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="card bg-primary text-white shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">Total Payments Received</h5>
                    <p class="display-5 mb-0">${{ number_format($totalPayments, 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-warning text-dark shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">Total Outstanding Fees</h5>
                    <p class="display-5 mb-0">${{ number_format($totalOutstanding, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-header bg-light">
            <h2 class="h4 mb-0">Payment History</h2>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Payment ID</th>
                            <th>Student Name</th>
                            <th>Invoice ID</th>
                            <th>Payment Amount</th>
                            <th>Invoice Total</th>
                            <th>Remaining Balance</th>
                            <th>Payment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        @php
                        $invoice = $payment->feeInvoice;
                        $invoiceName = $invoice->fee->title;
                        $totalPaid = $invoice->payments->sum('credit');
                        $remainingBalance = $invoice->amount - $totalPaid;
                        @endphp
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->student->name }}</td>
                            <td>{{ $invoiceName }}</td>
                            <td>${{ number_format($payment->credit, 2) }}</td>
                            <td>${{ number_format($invoice->amount, 2) }}</td>
                            <td>
                                <span class="badge bg-{{ $remainingBalance > 0 ? 'warning' : 'success' }}">
                                    ${{ number_format($remainingBalance, 2) }}
                                </span>
                            </td>
                            <td>{{ $payment->date->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h2 class="h4 mb-0">Receipts</h2>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Receipt ID</th>
                            <th>Student Name</th>
                            <th>Description</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($receipts as $receipt)
                        <tr>
                            <td>{{ $receipt->id }}</td>
                            <td>{{ $receipt->student->first_name }} {{ $receipt->student->lastname }}</td>
                            <td>{{ $receipt->description }}</td>
                            <td>{{ $receipt->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        border: none;
        border-radius: 10px;
    }

    .card-header {
        border-bottom: none;
        padding: 1.5rem;
    }

    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
    }

    .table td {
        vertical-align: middle;
    }

    .badge {
        font-weight: 500;
        padding: 0.5em 1em;
    }
</style>
@endpush