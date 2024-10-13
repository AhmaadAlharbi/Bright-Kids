@extends('layouts.master')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h2 class="mb-0">Classroom Details</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><strong>Name:</strong> {{ $classroom->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Level:</strong> {{ $classroom->level->name }}</p>
                        </div>
                    </div>

                    <!-- Teachers Section -->
                    <h4 class="mb-3">Assigned Teachers</h4>
                    @if($classroom->teachers->count() > 0)
                    <div class="table-responsive mb-4">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classroom->teachers as $teacher)
                                <tr>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>
                                        {{-- {{ route('teachers.show', $teacher->id) }} --}}
                                        <a href="" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye mr-1"></i>View
                                        </a>
                                        <form
                                            action="{{ route('teachers.detach-classroom', [$teacher->id, $classroom->id]) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to remove this classroom?')">
                                                <i class="bi bi-x-circle me-1"></i>Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-muted mb-4">No teachers assigned to this classroom yet.</p>
                    @endif

                    <!-- Students Section -->
                    <h4 class="mb-3">Enrolled Students</h4>
                    @if($classroom->students->count() > 0)
                    <div class="table-responsive mb-4">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Enrollment Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classroom->students as $student)
                                <tr>
                                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->date_of_birth }}</td>
                                    <td>{{ $student->enrollment_date }}</td>
                                    <td>
                                        <a href="{{ route('students.show', $student->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-eye mr-1"></i>View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-muted mb-4">No students enrolled in this classroom yet.</p>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('classrooms.edit', $classroom->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit mr-2"></i>Edit Classroom
                        </a>
                        <a href="{{ route('classrooms.index') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-arrow-left mr-2"></i>Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection