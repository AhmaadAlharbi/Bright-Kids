@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4 shadow-sm" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card shadow-sm mb-5">
                <div class="card-body p-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="display-6 mb-0">Teacher Profile</h1>
                        <a href="{{ route('teachers.index') }}" class="btn btn-outline-primary">
                            <i class="bi bi-arrow-left me-2"></i>Back to List
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <img src="https://via.placeholder.com/150" alt="{{ $teacher->name }}"
                                class="rounded-circle img-thumbnail mb-3" width="150" height="150">
                        </div>
                        <div class="col-md-8">
                            <h2 class="h3 mb-3">{{ $teacher->name }}</h2>
                            <p class="lead text-muted mb-4"><i class="bi bi-envelope me-2"></i>{{ $teacher->email }}</p>
                            <div class="d-flex">
                                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary me-2">
                                    <i class="bi bi-pencil me-2"></i>Edit Profile
                                </a>
                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this teacher?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="bi bi-trash me-2"></i>Delete Teacher
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <h2 class="h4 mb-4">Assigned Classrooms</h2>
                    @if($teacher->classrooms->count() > 0)
                    <div class="list-group">
                        @foreach($teacher->classrooms as $classroom)
                        <div
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">{{ $classroom->name }}</h6>
                                <small class="text-muted">Class Code: {{ $classroom->code }}</small>
                            </div>
                            <form action="{{ route('teachers.detach-classroom', [$teacher->id, $classroom->id]) }}"
                                method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to remove this classroom?')">
                                    <i class="bi bi-x-circle me-1"></i>Remove
                                </button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="alert alert-info" role="alert">
                        <i class="bi bi-info-circle me-2"></i>No classrooms assigned to this teacher.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection