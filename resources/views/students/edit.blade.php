@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="parents_id" class="form-label">Parents</label>
            <select class="form-select" id="parents_id" name="parents_id" required>
                @foreach($parents as $parent)
                <option value="{{ $parent->id }}" {{ $student->parents_id == $parent->id ? 'selected' : '' }}>
                    {{ $parent->father_first_name }} {{ $parent->father_last_name }} &
                    {{ $parent->mother_first_name }} {{ $parent->mother_last_name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name"
                value="{{ old('first_name', $student->first_name) }}" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name"
                value="{{ old('last_name', $student->last_name) }}" required>
        </div>
        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                value="{{ old('date_of_birth', $student->date_of_birth) }}" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female
                </option>
            </select>
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input type="text" class="form-control" id="grade" name="grade" value="{{ old('grade', $student->grade) }}"
                required>
        </div>
        <div class="mb-3">
            <label for="enrollment_date" class="form-label">Enrollment Date</label>
            <input type="date" class="form-control" id="enrollment_date" name="enrollment_date"
                value="{{ old('enrollment_date', $student->enrollment_date) }}">
        </div>
        <div class="mb-3">
            <label for="profile_picture" class="form-label">Profile Picture URL</label>
            <input type="text" class="form-control" id="profile_picture" name="profile_picture"
                value="{{ old('profile_picture', $student->profile_picture) }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address"
                rows="3">{{ old('address', $student->address) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="medical_info" class="form-label">Medical Information</label>
            <textarea class="form-control" id="medical_info" name="medical_info"
                rows="3">{{ old('medical_info', $student->medical_info) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes"
                rows="3">{{ old('notes', $student->notes) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection