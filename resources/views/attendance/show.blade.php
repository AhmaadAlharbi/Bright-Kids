<!-- resources/views/attendance/show.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1>Attendance for {{ $classroom->name }}</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if($attendanceRecords->isEmpty())
    <p>No attendance records found for this classroom.</p>
    @else
    @foreach($attendanceRecords as $date => $records)
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Date: {{ $date }}</h5>
            <div>
                <a href="{{ route('attendance.edit', ['classroom' => $classroom->id, 'date' => $date]) }}"
                    class="btn btn-sm btn-primary me-2">
                    Edit
                </a>
                <form action="{{ route('attendance.destroy', ['classroom' => $classroom->id, 'date' => $date]) }}"
                    method="POST" style="display:inline-block;"
                    onsubmit="return confirm('Are you sure you want to delete this attendance record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Status</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                    <tr>
                        <td>{{ $record->student->first_name }}</td>
                        <td>
                            @if($record->status == 'present')
                            <span class="badge bg-success">Present</span>
                            @elseif($record->status == 'absent')
                            <span class="badge bg-danger">Absent</span>
                            @else
                            <span class="badge bg-warning text-dark">Late</span>
                            @endif
                        </td>
                        <td>{{ $record->notes }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
    @endif

    <a href="{{ route('attendance.create', $classroom) }}" class="btn btn-success">Take New Attendance</a>
</div>
@endsection