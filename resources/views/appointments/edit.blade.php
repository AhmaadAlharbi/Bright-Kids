@extends('layouts.master')
@section('styles')
<style>
    .custom-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .custom-card-header {
        border-bottom: none;
    }

    .custom-card-footer {
        border-top: none;
    }

    .custom-btn {
        border-radius: 25px;
        padding: 10px 20px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .custom-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .custom-btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .custom-btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        color: #fff;
    }

    .custom-btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
    }

    .custom-btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
        color: #fff;
    }

    .form-label {
        font-weight: bold;
    }
</style>
@endsection
@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-primary"><i class="fas fa-edit me-3"></i>Edit Appointment</h1>

    <form action="{{ route('appointments.update', $appointment) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card custom-card">
            <div class="card-header custom-card-header bg-primary text-white py-3">
                <h2 class="mb-0"><i class="fas fa-user-edit me-2"></i>Editing Appointment for {{
                    $appointment->child_name }}</h2>
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

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="child_name" class="form-label">Child Name</label>
                        <input type="text" class="form-control @error('child_name') is-invalid @enderror"
                            id="child_name" name="child_name" value="{{ old('child_name', $appointment->child_name) }}"
                            required>
                        @error('child_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob"
                            value="{{ old('date_of_birth', $appointment->dob) }}" required>
                        @error('dob')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="father_name" class="form-label">Father Name</label>
                        <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                            id="father_name" name="father_name"
                            value="{{ old('father_name', $appointment->father_name) }}" required>
                        @error('father_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="mother_name" class="form-label">Mother Name</label>
                        <input type="text" class="form-control @error('mother_name') is-invalid @enderror"
                            id="mother_name" name="mother_name"
                            value="{{ old('mother_name', $appointment->mother_name) }}" required>
                        @error('mother_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="father_phone" class="form-label">Father's Phone</label>
                        <input type="text" class="form-control @error('father_phone') is-invalid @enderror"
                            id="father_phone" name="father_phone"
                            value="{{ old('father_phone', $appointment->father_phone) }}" required>
                        @error('father_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="mother_phone" class="form-label">Mother's Phone</label>
                        <input type="text" class="form-control @error('mother_phone') is-invalid @enderror"
                            id="mother_phone" name="mother_phone"
                            value="{{ old('mother_phone', $appointment->mother_phone) }}" required>
                        @error('mother_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="father_work" class="form-label">Father's Work</label>
                        <input type="text" class="form-control @error('father_work') is-invalid @enderror"
                            id="father_work" name="father_workplace"
                            value="{{ old('father_work', $appointment->father_workplace) }}">
                        @error('father_work')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="mother_work" class="form-label">Mother's Work</label>
                        <input type="text" class="form-control @error('mother_work') is-invalid @enderror"
                            id="mother_work" name="mother_workplace"
                            value="{{ old('mother_work', $appointment->mother_workplace) }}">
                        @error('mother_work')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="visit_date_time" class="form-label">Visit Date & Time</label>
                        <input type="datetime-local" class="form-control @error('visit_date_time') is-invalid @enderror"
                            id="visit_date_time" name="visit_date_time"
                            value="{{ old('visit_date_time', \Carbon\Carbon::parse($appointment->visit_date_time)->format('Y-m-d\TH:i')) }}"
                            required>
                        @error('visit_date_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                            <option value="uncompleted" {{ $appointment->status == 'uncompleted' ? 'selected' : ''
                                }}>Uncompleted</option>
                            <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : ''
                                }}>Completed</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer custom-card-footer bg-light d-flex justify-content-end py-3">
                <a href="{{ route('appointments.index') }}" class="btn custom-btn custom-btn-secondary me-2">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
                <button type="submit" class="btn custom-btn custom-btn-primary">
                    <i class="fas fa-save me-2"></i>Update Appointment
                </button>
            </div>
        </div>
    </form>
</div>
@endsection