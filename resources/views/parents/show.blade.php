@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Parent Details</h1>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $parent->father_first_name }} {{ $parent->father_last_name }} & {{
                $parent->mother_first_name }} {{ $parent->mother_last_name }}</h2>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h3>Father's Information</h3>
                    <p><strong>Name:</strong> {{ $parent->father_first_name }} {{ $parent->father_last_name }}</p>
                    <p><strong>Occupation:</strong> {{ $parent->father_occupation }}</p>
                    <p><strong>Phone:</strong> {{ $parent->father_phone }}</p>
                    <p><strong>Email:</strong> {{ $parent->father_email }}</p>
                </div>
                <div class="col-md-6">
                    <h3>Mother's Information</h3>
                    <p><strong>Name:</strong> {{ $parent->mother_first_name }} {{ $parent->mother_last_name }}</p>
                    <p><strong>Occupation:</strong> {{ $parent->mother_occupation }}</p>
                    <p><strong>Phone:</strong> {{ $parent->mother_phone }}</p>
                    <p><strong>Email:</strong> {{ $parent->mother_email }}</p>
                </div>
            </div>
            <hr>
            <h3>Home Address</h3>
            <p>{{ $parent->home_address }}</p>
            <hr>
            <h3>Children</h3>
            @if($parent->students->count() > 0)
            <ul class="list-group">
                @foreach($parent->students as $student)
                <li class="list-group-item">{{ $student->first_name }} {{ $student->last_name }}</li>
                @endforeach
            </ul>
            @else
            <p>No children registered.</p>
            @endif
        </div>
    </div>
    <a href="{{ route('parents.index') }}" class="btn btn-primary mt-3">Back to Parents List</a>
</div>
@endsection