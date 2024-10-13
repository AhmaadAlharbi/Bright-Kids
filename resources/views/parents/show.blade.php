@extends('layouts.master')
@section('styles')
<style>
    .parent-details-title {
        color: #007bff;
        font-weight: bold;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }

    .custom-card {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
    }

    .custom-card-title {
        color: #343a40;
        font-size: 1.8rem;
        font-weight: bold;
    }

    .custom-hr {
        border-top: 2px solid #007bff;
        margin: 1.5rem 0;
    }

    .info-section-title {
        color: #007bff;
        font-size: 1.4rem;
        margin-bottom: 1rem;
    }

    .info-block {
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1rem;
    }

    .info-block p {
        margin-bottom: 0.5rem;
    }

    .home-address {
        font-style: italic;
        color: #6c757d;
    }

    .custom-list-group {
        border-radius: 10px;
        overflow: hidden;
    }

    .custom-list-item {
        background-color: #f8f9fa;
        border-left: 4px solid #007bff;
        transition: all 0.3s ease;
    }

    .custom-list-item:hover {
        background-color: #e9ecef;
        transform: translateX(5px);
    }

    .no-children {
        font-style: italic;
        color: #6c757d;
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
            margin-bottom: 2rem;
        }

        .info-block {
            margin-bottom: 2rem;
        }
    }
</style>
@endsection
@section('content')
<div class="container mt-4">
    <h1 class="mb-4 parent-details-title">Parent Details</h1>
    <div class="card custom-card">
        <div class="card-body">
            <h2 class="card-title custom-card-title">{{ $parent->father_first_name }} {{ $parent->father_last_name }} &
                {{ $parent->mother_first_name }} {{ $parent->mother_last_name }}</h2>
            <hr class="custom-hr">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="info-section-title">Father's Information</h3>
                    <div class="info-block">
                        <p><strong>Name:</strong> {{ $parent->father_first_name }} {{ $parent->father_last_name }}</p>
                        <p><strong>Occupation:</strong> {{ $parent->father_occupation }}</p>
                        <p><strong>Phone:</strong> {{ $parent->father_phone }}</p>
                        <p><strong>Email:</strong> {{ $parent->father_email }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="info-section-title">Mother's Information</h3>
                    <div class="info-block">
                        <p><strong>Name:</strong> {{ $parent->mother_first_name }} {{ $parent->mother_last_name }}</p>
                        <p><strong>Occupation:</strong> {{ $parent->mother_occupation }}</p>
                        <p><strong>Phone:</strong> {{ $parent->mother_phone }}</p>
                        <p><strong>Email:</strong> {{ $parent->mother_email }}</p>
                    </div>
                </div>
            </div>
            <hr class="custom-hr">
            <h3 class="info-section-title">Home Address</h3>
            <p class="home-address">{{ $parent->home_address }}</p>
            <hr class="custom-hr">
            <h3 class="info-section-title">Children</h3>
            @if($parent->students->count() > 0)
            <ul class="list-group custom-list-group">
                @foreach($parent->students as $student)
                <li class="list-group-item custom-list-item">{{ $student->first_name }} {{ $student->last_name }}</li>
                @endforeach
            </ul>
            @else
            <p class="no-children">No children registered.</p>
            @endif
        </div>
    </div>
    <a href="{{ route('parents.index') }}" class="btn btn-primary mt-3 custom-btn">Back to Parents List</a>
</div>


@endsection