@extends('layouts.master')
@section('styles')
<style>
    .custom-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }

    .custom-card-header {
        border-bottom: none;
    }

    .custom-list-item {
        border-left: none;
        border-right: none;
        border-top: none;
        padding-left: 0;
        padding-right: 0;
    }

    .custom-list-item:last-child {
        border-bottom: none;
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

    .custom-btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
    }

    .custom-btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        color: #212529;
    }

    .custom-btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
    }

    .custom-btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
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

    .custom-badge {
        padding: 8px 12px;
        font-size: 0.9rem;
        border-radius: 15px;
    }

    .custom-badge-success {
        background-color: #28a745;
        color: #fff;
    }

    .custom-badge-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .custom-badge-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .custom-card-subtitle {
        font-size: 1.2rem;
        color: #6c757d;
    }
</style>
@endsection
@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-primary"><i class="fas fa-calendar-check me-3"></i>Appointment Details</h1>

    <div class="card custom-card">
        <div class="card-header custom-card-header bg-primary text-white py-3">
            <h2 class="mb-0"><i class="fas fa-user me-2"></i>Appointment for {{ $appointment->child_name }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="custom-card-subtitle mb-3 text-muted"><i class="fas fa-info-circle me-2"></i>Personal
                        Information</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item custom-list-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><i class="fas fa-child me-2"></i>Child Name:</span>
                            <span>{{ $appointment->child_name }}</span>
                        </li>
                        <li class="list-group-item custom-list-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><i class="fas fa-male me-2"></i>Father Name:</span>
                            <span>{{ $appointment->father_name }}</span>
                        </li>
                        <li class="list-group-item custom-list-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><i class="fas fa-female me-2"></i>Mother Name:</span>
                            <span>{{ $appointment->mother_name }}</span>
                        </li>
                        <li class="list-group-item custom-list-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><i class="fas fa-birthday-cake me-2"></i>Date of Birth:</span>
                            <span>{{ \Carbon\Carbon::parse($appointment->date_of_birth)->format('M d, Y') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 mb-4">
                    <h3 class="custom-card-subtitle mb-3 text-muted"><i
                            class="fas fa-clipboard-list me-2"></i>Appointment Information</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item custom-list-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><i class="fas fa-clock me-2"></i>Visit Date & Time:</span>
                            <span>{{ \Carbon\Carbon::parse($appointment->visit_date_time)->format('M d, Y H:i')
                                }}</span>
                        </li>
                        <li class="list-group-item custom-list-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><i class="fas fa-check-circle me-2"></i>Status:</span>
                            @if($appointment->status == 'completed')
                            <span class="custom-badge custom-badge-success">
                                <i class="fas fa-check-circle me-1"></i> Completed
                            </span>
                            @elseif($appointment->status == 'Scheduled')
                            <span class="custom-badge custom-badge-warning">
                                <i class="fas fa-clock me-1"></i> Scheduled
                            </span>
                            @else
                            <span class="custom-badge custom-badge-danger">
                                <i class="fas fa-exclamation-circle me-1"></i> {{ $appointment->status }}
                            </span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="custom-card-subtitle mb-3 text-muted"><i class="fas fa-phone-alt me-2"></i>Contact
                        Information</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item custom-list-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><i class="fas fa-mobile-alt me-2"></i>Father's Phone:</span>
                            <span>{{ $appointment->father_phone }}</span>
                        </li>
                        <li class="list-group-item custom-list-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><i class="fas fa-mobile-alt me-2"></i>Mother's Phone:</span>
                            <span>{{ $appointment->mother_phone }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 mb-4">
                    <h3 class="custom-card-subtitle mb-3 text-muted"><i class="fas fa-briefcase me-2"></i>Work
                        Information</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item custom-list-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><i class="fas fa-building me-2"></i>Father's Work:</span>
                            <span>{{ $appointment->father_workplace ?: 'N/A' }}</span>
                        </li>
                        <li class="list-group-item custom-list-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><i class="fas fa-building me-2"></i>Mother's Work:</span>
                            <span>{{ $appointment->mother_workplace ?: 'N/A' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-footer custom-card-footer bg-light d-flex justify-content-between align-items-center py-3">
            <a href="{{ route('appointments.edit', $appointment) }}" class="btn custom-btn custom-btn-warning">
                <i class="fas fa-edit me-2"></i>Edit Appointment
            </a>
            <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn custom-btn custom-btn-danger"
                    onclick="return confirm('Are you sure you want to delete this appointment?')">
                    <i class="fas fa-trash-alt me-2"></i>Delete Appointment
                </button>
            </form>
            <a href="{{ route('appointments.index') }}" class="btn custom-btn custom-btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Appointments
            </a>
        </div>
    </div>
</div>
@endsection