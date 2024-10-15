@extends('layouts.master')
@section('styles')
<style>
    .student-details-title {
        color: #007bff;
        font-weight: bold;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }

    .custom-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }

    .student-name {
        color: #343a40;
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .section-title {
        color: #007bff;
        font-size: 1.4rem;
        margin-bottom: 1rem;
    }

    .custom-btn {
        border-radius: 5px;
        font-weight: 500;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }

    .custom-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .custom-form label {
        font-weight: 500;
    }

    .custom-select,
    .custom-file-input {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 0.5rem 0.75rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .custom-select:focus,
    .custom-file-input:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .custom-list-group {
        border-radius: 10px;
        overflow: hidden;
    }

    .custom-list-item {
        background-color: #f8f9fa;
        border-left: 4px solid #007bff;
        transition: all 0.3s ease;
    }

    .custom-list-item:hover {
        background-color: #e9ecef;
        transform: translateX(5px);
    }

    .custom-action-btn {
        margin-right: 0.25rem;
        border-radius: 5px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .custom-action-btn:hover {
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .custom-card {
            margin-bottom: 1.5rem;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
        }

        .custom-action-btn {
            margin-right: 0;
            margin-bottom: 0.5rem;
        }
    }
</style>
@endsection
@section('content')
<div class="container mt-4">
    <h1 class="mb-4 student-details-title">Student Details</h1>
    <div class="card custom-card mb-4">
        <div class="card-body">
            <h2 class="card-title student-name">{{ $student->first_name }} {{ $student->last_name }}</h2>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Grade:</strong> {{ $student->grade }}</p>
                    <p><strong>Date of Birth:</strong> {{ $student->date_of_birth }}</p>
                    <p><strong>Gender:</strong> {{ $student->gender }}</p>
                    <p><strong>Enrollment Date:</strong> {{ $student->enrollment_date ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Address:</strong> {{ $student->address ?? 'N/A' }}</p>
                    <p><strong>Medical Info:</strong> {{ $student->medical_info ?? 'N/A' }}</p>
                    <p><strong>Notes:</strong> {{ $student->notes ?? 'N/A' }}</p>
                </div>
            </div>
            <h3 class="mt-4 section-title">Parents Information</h3>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Father:</strong> {{ $student->parents->father_first_name }} {{
                        $student->parents->father_last_name }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Mother:</strong> {{ $student->parents->mother_first_name }} {{
                        $student->parents->mother_last_name }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <a href="{{ route('students.index') }}" class="btn btn-primary custom-btn mr-2"><i
                class="fas fa-arrow-left mr-2"></i>Back to Students List</a>
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning custom-btn"><i
                class="fas fa-edit mr-2"></i>Edit Student</a>
    </div>
    <h2 class="mb-3 section-title">Student Documents</h2>
    <div class="card custom-card mb-4">
        <div class="card-body">
            <h3 class="mb-3">Upload New Document</h3>
            <form action="{{ route('students.upload-document', $student) }}" method="POST" enctype="multipart/form-data"
                class="custom-form">
                @csrf
                <div class="mb-3">
                    <label for="document_type" class="form-label">Document Type</label>
                    <select class="form-select custom-select" id="document_type" name="document_type" required>
                        <option value="student_id">Student ID</option>
                        <option value="birth_certificate">Birth Certificate</option>
                        <option value="father_id">Father's ID</option>
                        <option value="mother_id">Mother's ID</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="document" class="form-label">Document File</label>
                    <input type="file" class="form-control custom-file-input" id="document" name="document" required>
                </div>
                <button type="submit" class="btn btn-primary custom-btn"><i class="fas fa-upload mr-2"></i>Upload
                    Document</button>
            </form>
        </div>
    </div>

    <div class="card custom-card">
        <div class="card-body">
            <h3 class="mb-3">Uploaded Documents</h3>
            @if($student->documents->count() > 0)
            <ul class="list-group custom-list-group">
                @foreach($student->documents as $document)
                <li class="list-group-item d-flex justify-content-between align-items-center custom-list-item">
                    <span>{{ ucfirst(str_replace('_', ' ', $document->document_type)) }}</span>
                    <div class="btn-group" role="group">
                        <a href="{{ asset('storage/' . $document->file_path) }}"
                            class="btn btn-sm btn-info custom-action-btn" target="_blank"><i
                                class="fas fa-eye mr-1"></i>View</a>
                        <form action="{{ route('students.delete-document', $document) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger custom-action-btn"
                                onclick="return confirm('Are you sure you want to delete this document?')"><i
                                    class="fas fa-trash-alt mr-1"></i>Delete</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <p class="text-muted">No documents uploaded yet.</p>
            @endif
        </div>
    </div>
    <!-- Payment History Section -->
    <div class="container">
        <h1>{{ $student->first_name }} {{ $student->last_name }}</h1>

        <!-- Student details here -->

        <h2>Fee and Payment Summary</h2>
        <p>Total Fees: ${{ number_format($totalFees, 2) }}</p>
        <p>Total Paid: ${{ number_format($totalPaid, 2) }}</p>
        <p>Balance: ${{ number_format($balance, 2) }}</p>

        <h2>Fee Invoices</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Fee</th>
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th>Paid Amount</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feeInvoices as $invoice)
                <tr>
                    <td>{{ $invoice->fee->title }}</td>
                    <td>${{ number_format($invoice->amount, 2) }}</td>
                    <td>{{ $invoice->invoice_date->format('Y-m-d') }}</td>
                    <td>${{ number_format($invoice->student_accounts->where('type', 'payment')->sum('credit'), 2) }}
                    </td>
                    <td>${{ number_format($invoice->amount - $invoice->student_accounts->where('type',
                        'payment')->sum('credit'), 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Payment History</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>For Fee</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->date->format('Y-m-d') }}</td>
                    <td>${{ number_format($payment->credit, 2) }}</td>
                    <td>{{ $payment->feeInvoice->fee->title }}</td>
                    <td>{{ $payment->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('fee_invoices.create', $student->id) }}" class="btn btn-primary">Assign New Fee</a>
        <a href="{{ route('student_accounts.create', $student->id) }}" class="btn btn-success">Record Payment</a>
    </div>


    @endsection