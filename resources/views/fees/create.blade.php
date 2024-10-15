@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Create New Fee</h1>
    <form action="{{ route('fees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" name="year" id="year" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Fee</button>
    </form>
</div>
@endsection