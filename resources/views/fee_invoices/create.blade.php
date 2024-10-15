@extends('layouts.master')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h1>Assign Fee to {{ $student->first_name }} {{ $student->last_name }}</h1>
    <form action="{{ route('fee_invoices.store') }}" method="POST">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">

        <div class="form-group">
            <label for="fee_id">Fee Type</label>
            <select name="fee_id" id="fee_id" class="form-control" required>
                @foreach($fees as $fee)
                <option value="{{ $fee->id }}">{{ $fee->title }} - ${{ $fee->amount }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
        </div>

        {{-- <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control" required>
        </div> --}}

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Assign Fee</button>
    </form>
</div>
@endsection