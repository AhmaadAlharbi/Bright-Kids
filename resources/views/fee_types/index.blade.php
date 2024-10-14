@extends('layouts.master')

@section('content')
<h1>Fee Types</h1>
<a href="{{ route('fee-types.create') }}" class="btn btn-primary mb-3">Create New Fee Type</a>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Recurring</th>
            <th>Amount</th>
            <th>Billing Period</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($feeTypes as $feeType)
        <tr>
            <td>{{ $feeType->name }}</td>
            <td>{{ $feeType->description }}</td>
            <td>{{ $feeType->is_recurring ? 'Yes' : 'No' }}</td>
            <td>{{ $feeType->amount }}</td>
            <td>{{ ucfirst($feeType->billing_period) }}</td>
            <td>
                <a href="{{ route('fee-types.edit', $feeType) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('fee-types.destroy', $feeType) }}" method="POST" class="d-inline">
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