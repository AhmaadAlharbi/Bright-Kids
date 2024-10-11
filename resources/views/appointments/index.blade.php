@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="mb-4">Appointments</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">Book New Appointment</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Child Name</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Date of Birth</th>
                <th>Visit Date & Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $appointment->child_name }}</td>
                <td>{{ $appointment->father_name }}</td>
                <td>{{ $appointment->mother_name }}</td>
                <td>{{ \Carbon\Carbon::parse($appointment->date_of_birth)->format('Y-m-d') }}</td>
                <td>{{ \Carbon\Carbon::parse($appointment->visit_date_time)->format('Y-m-d H:i') }}</td>
                <td>
                    <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                            <option value="uncompleted" {{ $appointment->status === 'uncompleted' ? 'selected' : ''
                                }}>Uncompleted</option>
                            <option value="completed" {{ $appointment->status === 'completed' ? 'selected' : ''
                                }}>Completed</option>
                        </select>
                    </form>

                </td>
                <td>
                    <a href="{{ route('appointments.show', $appointment) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('appointments.destroy', $appointment) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection