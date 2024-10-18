<!-- resources/views/attendance/index.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Attendance Management</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">
        @foreach($classrooms as $classroom)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $classroom->name }}</h5>
                    <p class="card-text">Students: {{ $classroom->students_count }}</p>
                    <a href="{{ route('attendance.create', $classroom) }}" class="btn btn-primary">Take Attendance</a>
                    <a href="{{ route('attendance.show', $classroom) }}" class="btn btn-secondary">View Attendance</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection