@extends('layouts.master')
@section('styles')
<style>
    .edit-parent-title {
        color: #007bff;
        font-weight: bold;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }

    .custom-form {
        background-color: #f8f9fa;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .info-section-title {
        color: #007bff;
        font-size: 1.4rem;
        margin-bottom: 1rem;
    }

    .info-block {
        background-color: #ffffff;
        padding: 1.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .custom-input,
    .custom-textarea {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 0.5rem 0.75rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .custom-input:focus,
    .custom-textarea:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .custom-btn {
        background-color: #007bff;
        border-color: #007bff;
        color: #ffffff;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .custom-btn:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        transform: translateY(-2px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .custom-form {
            padding: 1.5rem;
        }

        .info-block {
            margin-bottom: 1rem;
        }
    }
</style>
@endsection
@section('content')
<div class="container mt-4">
    <h1 class="mb-4 edit-parent-title">Edit Parent</h1>
    <form action="{{ route('parents.update', $parent) }}" method="POST" class="custom-form">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <h3 class="info-section-title">Father's Information</h3>
                <div class="info-block">
                    <div class="mb-3">
                        <label for="father_first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control custom-input" id="father_first_name"
                            name="father_first_name" value="{{ old('father_first_name', $parent->father_first_name) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="father_last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control custom-input" id="father_last_name"
                            name="father_last_name" value="{{ old('father_last_name', $parent->father_last_name) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="father_occupation" class="form-label">Occupation</label>
                        <input type="text" class="form-control custom-input" id="father_occupation"
                            name="father_occupation" value="{{ old('father_occupation', $parent->father_occupation) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="father_phone" class="form-label">Phone</label>
                        <input type="text" class="form-control custom-input" id="father_phone" name="father_phone"
                            value="{{ old('father_phone', $parent->father_phone) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="father_email" class="form-label">Email</label>
                        <input type="email" class="form-control custom-input" id="father_email" name="father_email"
                            value="{{ old('father_email', $parent->father_email) }}" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="info-section-title">Mother's Information</h3>
                <div class="info-block">
                    <div class="mb-3">
                        <label for="mother_first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control custom-input" id="mother_first_name"
                            name="mother_first_name" value="{{ old('mother_first_name', $parent->mother_first_name) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="mother_last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control custom-input" id="mother_last_name"
                            name="mother_last_name" value="{{ old('mother_last_name', $parent->mother_last_name) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="mother_occupation" class="form-label">Occupation</label>
                        <input type="text" class="form-control custom-input" id="mother_occupation"
                            name="mother_occupation" value="{{ old('mother_occupation', $parent->mother_occupation) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="mother_phone" class="form-label">Phone</label>
                        <input type="text" class="form-control custom-input" id="mother_phone" name="mother_phone"
                            value="{{ old('mother_phone', $parent->mother_phone) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="mother_email" class="form-label">Email</label>
                        <input type="email" class="form-control custom-input" id="mother_email" name="mother_email"
                            value="{{ old('mother_email', $parent->mother_email) }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="home_address" class="form-label">Home Address</label>
            <textarea class="form-control custom-textarea" id="home_address" name="home_address" rows="3"
                required>{{ old('home_address', $parent->home_address) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary custom-btn">Update Parent</button>
    </form>
</div>


@endsection