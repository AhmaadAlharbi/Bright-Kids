@extends('layouts.master')
<!-- Adjust based on your layout file -->
@section('styles')
<style>
    .card {
        border: none;
        border-radius: 15px;
    }

    .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>
@endsection
@section('content')
<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Create Appointment</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="child_name" class="form-label">Child Name</label>
                        <input type="text" class="form-control" id="child_name" name="child_name" required>
                        @error('child_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="father_name" class="form-label">Father Name</label>
                        <input type="text" class="form-control" id="father_name" name="father_name" required>
                        @error('father_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="mother_name" class="form-label">Mother Name</label>
                        <input type="text" class="form-control" id="mother_name" name="mother_name" required>
                        @error('mother_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="dob" required>
                        @error('dob')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="visit_date_time" class="form-label">Visit Date & Time</label>
                        <input type="datetime-local" class="form-control" id="visit_date_time" name="visit_date_time"
                            required>
                        @error('visit_date_time')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="father_phone" class="form-label">Father's Phone</label>
                        <input type="tel" class="form-control" id="father_phone" name="father_phone" required>
                        @error('father_phone')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="mother_phone" class="form-label">Mother's Phone</label>
                        <input type="tel" class="form-control" id="mother_phone" name="mother_phone" required>
                        @error('mother_phone')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="father_work" class="form-label">Father's Work</label>
                        <input type="text" class="form-control" id="father_workplace" name="father_workplace">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="mother_work" class="form-label">Mother's Work</label>
                        <input type="text" class="form-control" id="mother_workplace" name="mother_workplace">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="branch" class="form-label">Branch</label>
                    <input type="text" class="form-control" id="branch" name="branch" required>
                    @error('branch')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('appointments.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Appointment</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection