@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Students List</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Parents</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->grade }}</td>
                    <td>{{ $student->parents->father_first_name }} {{ $student->parents->father_last_name }} &
                        {{ $student->parents->mother_first_name }} {{ $student->parents->mother_last_name }}</td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection