<!-- resources/views/attendance/create.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Take Attendance for {{ $classroom->name }}</h2>
    <form action="{{ route('attendance.store', $classroom) }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $currentDate }}" required>
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
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                            <option value="late">Late</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="attendances[{{ $student->id }}][notes]" class="form-control">
                        <input type="hidden" name="attendances[{{ $student->id }}][student_id]"
                            value="{{ $student->id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Submit Attendance</button>
    </form>
</div>
@endsection