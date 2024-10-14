@extends('layouts.master')

@section('content')
<h1>{{ isset($feeType) ? 'Edit' : 'Create' }} Fee Type</h1>

<form action="{{ isset($feeType) ? route('fee-types.update', $feeType) : route('fee-types.store') }}" method="POST">
    @csrf
    @if(isset($feeType))
    @method('PUT')
    @endif

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $feeType->name ?? '') }}"
            required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description"
            name="description">{{ old('description', $feeType->description ?? '') }}</textarea>
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="is_recurring" name="is_recurring" value="1" {{
            old('is_recurring', $feeType->is_recurring ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_recurring">Is Recurring</label>
    </div>

    <div class="form-group">
        <label for="billing_period">Billing Period</label>
        <select class="form-control" id="billing_period" name="billing_period" required>
            <option value="one-time" {{ old('billing_period', $feeType->billing_period ?? '') == 'one-time' ? 'selected'
                : '' }}>One-time</option>
            <option value="monthly" {{ old('billing_period', $feeType->billing_period ?? '') == 'monthly' ? 'selected' :
                '' }}>Monthly</option>
            <option value="quarterly" {{ old('billing_period', $feeType->billing_period ?? '') == 'quarterly' ?
                'selected' : '' }}>Quarterly</option>
            <option value="annually" {{ old('billing_period', $feeType->billing_period ?? '') == 'annually' ? 'selected'
                : '' }}>Annually</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">{{ isset($feeType) ? 'Update' : 'Create' }} Fee Type</button>
</form>
@endsection