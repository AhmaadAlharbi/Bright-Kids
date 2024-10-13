@extends('layouts.master')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-primary mb-4">Level: {{ $level->name }}</h2>

            <h3 class="text-secondary mb-3">Classrooms</h3>

            @if($classrooms->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classrooms as $classroom)
                        <tr>
                            <th scope="row">{{ $classroom->id }}</th>
                            <td>{{ $classroom->name }}</td>
                            <td>
                                <a href="{{route('classrooms.show',$classroom)}}"
                                    class="btn btn-sm btn-outline-info mr-2">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle mr-2"></i> No classrooms found for this level.
            </div>
            @endif

            <a href="{{ route('levels.index') }}" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left mr-2"></i> Back to Levels
            </a>
        </div>
    </div>
</div>
@endsection