@extends('layouts.master')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Edit Classroom</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> There were some problems with your input.
                        <ul class="mt-2 mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $classroom->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="level_id" class="font-weight-bold">Level:</label>
                            <select class="form-control @error('level_id') is-invalid @enderror" id="level_id"
                                name="level_id" required>
                                <option value="">Select a level</option>
                                @foreach($levels as $level)
                                <option value="{{ $level->id }}" {{ (old('level_id', $classroom->level_id) ==
                                    $level->id) ? 'selected' : '' }}>
                                    {{ $level->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('level_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-4 mb-0">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i>Update Classroom
                            </button>
                            <a href="{{ route('classrooms.index') }}" class="btn btn-secondary ml-2">
                                <i class="fas fa-arrow-left mr-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection