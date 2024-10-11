@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Appointment</h1>

    <form action="{{ route('appointments.update', $appointment) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                Editing Appointment for {{ $appointment->child_name }}
            </div>
            <div class="card-body">

                {{-- Display Validation Errors --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="child_name">Child Name</label>
                    <input type="text" class="form-control @error('child_name') is-invalid @enderror" id="child_name"
                        name="child_name" value="{{ old('child_name', $appointment->child_name) }}" required>
                    @error('child_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="father_name">Father Name</label>
                    <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name"
                        name="father_name" value="{{ old('father_name', $appointment->father_name) }}" required>
                    @error('father_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mother_name">Mother Name</label>
                    <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name"
                        name="mother_name" value="{{ old('mother_name', $appointment->mother_name) }}" required>
                    @error('mother_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob"
                        value="{{ old('date_of_birth', $appointment->dob) }}" required>
                    @error('dob')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="visit_date_time">Visit Date & Time</label>
                    <input type="datetime-local" class="form-control @error('visit_date_time') is-invalid @enderror"
                        id="visit_date_time" name="visit_date_time"
                        value="{{ old('visit_date_time', \Carbon\Carbon::parse($appointment->visit_date_time)->format('Y-m-d\TH:i')) }}"
                        required>
                    @error('visit_date_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="father_phone">Father's Phone</label>
                    <input type="text" class="form-control @error('father_phone') is-invalid @enderror"
                        id="father_phone" name="father_phone"
                        value="{{ old('father_phone', $appointment->father_phone) }}" required>
                    @error('father_phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mother_phone">Mother's Phone</label>
                    <input type="text" class="form-control @error('mother_phone') is-invalid @enderror"
                        id="mother_phone" name="mother_phone"
                        value="{{ old('mother_phone', $appointment->mother_phone) }}" required>
                    @error('mother_phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="father_work">Father's Work</label>
                    <input type="text" class="form-control @error('father_work') is-invalid @enderror" id="father_work"
                        name="father_workplace" value="{{ old('father_work', $appointment->father_workplace) }}">
                    @error('father_work')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mother_work">Mother's Work</label>
                    <input type="text" class="form-control @error('mother_work') is-invalid @enderror" id="mother_work"
                        name="mother_workplace" value="{{ old('mother_work', $appointment->mother_workplace) }}">
                    @error('mother_work')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                        <option value="uncompleted" {{ $appointment->status == 'uncompleted' ? 'selected' : ''
                            }}>Uncompleted</option>
                        <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed
                        </option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Appointment</button>
                <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection