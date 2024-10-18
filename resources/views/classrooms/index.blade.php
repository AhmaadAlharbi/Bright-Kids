@extends('layouts.master')

@section('content')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Classrooms</h2>
            <a href="{{ route('classrooms.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle mr-2"></i>Create New Classroom
            </a>
        </div>
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Attendace</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classrooms as $classroom)
                        <tr>
                            <td>{{ $classroom->id }}</td>
                            <td>{{ $classroom->name }}</td>
                            <td>{{ $classroom->level->name }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('attendance.create', $classroom) }}">
                                    {{ $classroom->name }} - Take Attendance
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('classrooms.show', $classroom->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye mr-1"></i>View
                                </a>
                                <a href="{{ route('classrooms.edit', $classroom->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </a>
                                <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this classroom?')">
                                        <i class="fas fa-trash mr-1"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection