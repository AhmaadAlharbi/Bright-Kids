<!-- resources/views/attendance/edit.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Edit Attendance for {{ $classroom->name }}</h2>
    <form action="{{ route('attendance.update', ['classroom' => $classroom->id, 'date' => $currentDate]) }}"
        method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $currentDate }}" readonly>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Status</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classroom->students as $student)
                <tr>
                    <td>{{ $student->first_name }}</td>
                    <td>
                        <select name="attendances[{{ $student->id }}][status]" class="form-control" required>
                            @php
                            $status = isset($existingAttendance[$student->id]) ?
                            $existingAttendance[$student->id]->status : 'present';
                            @endphp
                            <option value="present" {{ $status=='present' ? 'selected' : '' }}>Present</option>
                            <option value="absent" {{ $status=='absent' ? 'selected' : '' }}>Absent</option>
                            <option value="late" {{ $status=='late' ? 'selected' : '' }}>Late</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="attendances[{{ $student->id }}][notes]" class="form-control"
                            value="{{ isset($existingAttendance[$student->id]) ? $existingAttendance[$student->id]->notes : '' }}">
                        <input type="hidden" name="attendances[{{ $student->id }}][student_id]"
                            value="{{ $student->id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Update Attendance</button>
    </form>
</div>
@endsection