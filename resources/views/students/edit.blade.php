@extends('layouts.master')
@section('styles')
<style>
    .edit-student-title {
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

    .custom-form label {
        font-weight: 500;
        color: #495057;
    }

    .custom-input,
    .custom-select,
    .custom-textarea {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 0.5rem 0.75rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .custom-input:focus,
    .custom-select:focus,
    .custom-textarea:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
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

    @media (max-width: 768px) {
        .custom-card {
            padding: 1.5rem;
        }

        .col-md-6 {
            margin-bottom: 1rem;
        }
    }
</style>
@endsection
@section('content')
<div class="container mt-4">
    <h1 class="mb-4 edit-student-title">Edit Student</h1>
    <div class="card custom-card">
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST" class="custom-form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="parents_id" class="form-label">Parents</label>
                            <select class="form-select custom-select" id="parents_id" name="parents_id" required>
                                @foreach($parents as $parent)
                                <option value="{{ $parent->id }}" {{ $student->parents_id == $parent->id ? 'selected' :
                                    '' }}>
                                    {{ $parent->father_first_name }} {{ $parent->father_last_name }} &
                                    {{ $parent->mother_first_name }} {{ $parent->mother_last_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control custom-input" id="first_name" name="first_name"
                                value="{{ old('first_name', $student->first_name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control custom-input" id="last_name" name="last_name"
                                value="{{ old('last_name', $student->last_name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control custom-input" id="date_of_birth" name="date_of_birth"
                                value="{{ old('date_of_birth', $student->date_of_birth) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select custom-select" id="gender" name="gender" required>
                                <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : ''
                                    }}>Male</option>
                                <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : ''
                                    }}>Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="grade" class="form-label">Grade</label>
                            <input type="text" class="form-control custom-input" id="grade" name="grade"
                                value="{{ old('grade', $student->grade) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="enrollment_date" class="form-label">Enrollment Date</label>
                            <input type="date" class="form-control custom-input" id="enrollment_date"
                                name="enrollment_date" value="{{ old('enrollment_date', $student->enrollment_date) }}">
                        </div>
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture URL</label>
                            <input type="text" class="form-control custom-input" id="profile_picture"
                                name="profile_picture" value="{{ old('profile_picture', $student->profile_picture) }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control custom-textarea" id="address" name="address"
                                rows="3">{{ old('address', $student->address) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="medical_info" class="form-label">Medical Information</label>
                            <textarea class="form-control custom-textarea" id="medical_info" name="medical_info"
                                rows="3">{{ old('medical_info', $student->medical_info) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea class="form-control custom-textarea" id="notes" name="notes"
                                rows="3">{{ old('notes', $student->notes) }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary custom-btn"><i class="fas fa-save mr-2"></i>Update
                        Student</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary custom-btn ml-2"><i
                            class="fas fa-times mr-2"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection