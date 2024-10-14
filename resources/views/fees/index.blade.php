@extends('layouts.master')

@section('content')
<h1>Fees</h1>
<a href="{{ route('fees.create') }}" class="btn btn-primary mb-3">Create New Fee</a>

<table class="table">
    <thead>
        <tr>
            <th>Student</th>
            <th>Fee Type</th>
            <th>Total Amount</th>
            <th>Paid Amount</th>
            <th>Remaining Amount</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fees as $fee)
        <tr>
            <td>
                @if($fee->student)
                {{ $fee->student->first_name }} {{ $fee->student->last_name }}
                @else
                N/A (Student ID: {{ $fee->student_id }})
                @endif
            </td>
            <td>{{ $fee->feeType->name ?? 'N/A' }}</td>
            <td>${{ number_format($fee->total_amount, 2) }}</td>
            <td>${{ number_format($fee->paid_amount, 2) }}</td>
            <td>${{ number_format($fee->remaining_amount, 2) }}</td>
            <td>{{ $fee->due_date->format('Y-m-d') }}</td>
            <td>
                <span
                    class="badge bg-{{ $fee->status === 'paid' ? 'success' : ($fee->status === 'partial' ? 'warning' : 'danger') }}">
                    {{ ucfirst($fee->status) }}
                </span>
            </td>
            <td>
                <a href="{{ route('fees.edit', $fee->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('fees.destroy', $fee->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection