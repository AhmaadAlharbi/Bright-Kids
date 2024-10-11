@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="mb-4">Appointment Details</h1>

    <div class="card">
        <div class="card-header">
            Appointment for {{ $appointment->child_name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Details</h5>
            <p><strong>Child Name:</strong> {{ $appointment->child_name }}</p>
            <p><strong>Father Name:</strong> {{ $appointment->father_name }}</p>
            <p><strong>Mother Name:</strong> {{ $appointment->mother_name }}</p>
            <p><strong>Date of Birth:</strong> {{ \Carbon\Carbon::parse($appointment->date_of_birth)->format('Y-m-d') }}
            </p>
            <p><strong>Visit Date & Time:</strong> {{
                \Carbon\Carbon::parse($appointment->visit_date_time)->format('Y-m-d H:i') }}</p>
            <p><strong>Status:</strong> {{ $appointment->status }}</p>
            <p><strong>Contact Information:</strong></p>
            <p><strong>Father's Phone:</strong> {{ $appointment->father_phone }}</p>
            <p><strong>Mother's Phone:</strong> {{ $appointment->mother_phone }}</p>
            <p><strong>Father's Work:</strong> {{ $appointment->father_workplace }}</p>
            <p><strong>Mother's Work:</strong> {{ $appointment->mother_workplace }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-warning">Edit Appointment</a>
            <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this appointment?')">Delete
                    Appointment</button>
            </form>
            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back to Appointments</a>
        </div>
    </div>
</div>
@endsection