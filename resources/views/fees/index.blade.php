@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Fees</h1>
    <a href="{{ route('fees.create') }}" class="btn btn-primary mb-3">Create New Fee</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Amount</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fees as $fee)
            <tr>
                <td>{{ $fee->title }}</td>
                <td>${{ number_format($fee->amount, 2) }}</td>
                <td>{{ $fee->year }}</td>
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
</div>
@endsection