@extends('layouts.master')
<!-- Adjust based on your layout file -->

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Create Appointment
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="child_name">Child Name</label>
                    <input type="text" class="form-control" id="child_name" name="child_name" required>
                    @error('child_name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="father_name">Father Name</label>
                    <input type="text" class="form-control" id="father_name" name="father_name" required>
                    @error('father_name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mother_name">Mother Name</label>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" required>
                    @error('mother_name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="dob" required>
                    @error('dob')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="visit_date_time">Visit Date & Time</label>
                    <input type="datetime-local" class="form-control" id="visit_date_time" name="visit_date_time"
                        required>
                    @error('visit_date_time')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="father_phone">Father's Phone</label>
                    <input type="text" class="form-control" id="father_phone" name="father_phone" required>
                    @error('father_phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mother_phone">Mother's Phone</label>
                    <input type="text" class="form-control" id="mother_phone" name="mother_phone" required>
                    @error('mother_phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="father_work">Father's Work</label>
                    <input type="text" class="form-control" id="father_workplace" name="father_workplace">
                </div>

                <div class="form-group">
                    <label for="mother_work">Mother's Work</label>
                    <input type="text" class="form-control" id="mother_workplace" name="mother_workplace">
                </div>
                <div class="form-group">
                    <label for="branch">Branch</label>
                    <input type="text" class="form-control" id="branch" name="branch" required>
                    @error('branch')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create Appointment</button>
                <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection