@extends('layouts.master')

@section('styles')
<style>
    .invoice-header {
        margin-bottom: 20px;
    }

    .invoice-title {
        font-size: 24px;
        font-weight: bold;
    }

    .billed-from,
    .billed-to {
        margin-bottom: 20px;
    }

    .invoice-info-row {
        display: flex;
        justify-content: space-between;
    }

    .table-invoice th,
    .table-invoice td {
        padding: 10px;
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div class="my-auto">
        <h5 class="page-title fs-21 mb-1">Invoice</h5>
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Payments</a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoice</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start::row-1 -->
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="main-content-body-invoice">
            <div class="card card-invoice">
                <div class="card-body">
                    <div class="invoice-header">
                        <h2 class="invoice-title">School Fee Invoice</h2>
                        <div class="billed-from">
                            <h6>{{ config('app.name') }}</h6>
                            <p>School Address<br>
                                Tel No: School Phone Number<br>
                                Email: school@email.com</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md">
                            <label class="text-gray-6">Billed To</label>
                            <div class="billed-to">
                                <h6 class="fs-14 fw-semibold">{{ $student->name }}</h6>
                                <p>Student ID: {{ $student->id }}<br>
                                    Class: {{ $student->classroom->name }}<br>
                                    Level: {{ $student->classroom->level->name }}</p>
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="text-gray-6">Invoice Information</label>
                            <p class="invoice-info-row"><span>Receipt No</span> <span>{{ $receipt->id }}</span></p>
                            <p class="invoice-info-row"><span>Date:</span> <span>{{ $receipt->date }}</span></p>
                            <p class="invoice-info-row"><span>Amount Paid:</span> <span>${{
                                    number_format($receipt->Debit, 2) }}</span></p>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-invoice border text-md-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="w-20">Fee Title</th>
                                    <th class="w-40">Description</th>
                                    <th>Year</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($feeInvoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->fee->title }}</td>
                                    <td class="fs-12">{{ $invoice->fee->description }}</td>
                                    <td>{{ $invoice->fee->year }}</td>
                                    <td>${{ number_format($invoice->amount, 2) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>${{ number_format($feeInvoices->sum('amount'), 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Amount Paid:</strong></td>
                                    <td><strong>${{ number_format($receipt->Debit, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Balance:</strong></td>
                                    <td><strong>${{ number_format($feeInvoices->sum('amount') - $receipt->Debit, 2)
                                            }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="float-end mt-4">
                        <button class="btn btn-danger ms-2" onclick="window.print();">
                            <i class="mdi mdi-printer me-1"></i>Print
                        </button>
                        <button class="btn btn-success">
                            <i class="mdi mdi-telegram me-1"></i>Send Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- COL-END -->
</div>
<!--End::row-1 -->
@endsection

@section('scripts')
<!-- Add any necessary scripts here -->
@endsection