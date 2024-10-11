@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Student Details</h1>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $student->first_name }} {{ $student->last_name }}</h2>
            <p><strong>Grade:</strong> {{ $student->grade }}</p>
            <p><strong>Date of Birth:</strong> {{ $student->date_of_birth }}</p>
            <p><strong>Gender:</strong> {{ $student->gender }}</p>
            <p><strong>Enrollment Date:</strong> {{ $student->enrollment_date ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $student->address ?? 'N/A' }}</p>
            <p><strong>Medical Info:</strong> {{ $student->medical_info ?? 'N/A' }}</p>
            <p><strong>Notes:</strong> {{ $student->notes ?? 'N/A' }}</p>
            <h3>Parents Information</h3>
            <p><strong>Father:</strong> {{ $student->parents->father_first_name }} {{
                $student->parents->father_last_name }}</p>
            <p><strong>Mother:</strong> {{ $student->parents->mother_first_name }} {{
                $student->parents->mother_last_name }}</p>
        </div>
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-primary mt-3">Back to Students List</a>
    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning mt-3">Edit Student</a>
</div>
@endsection