@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Parents List</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Father's Phone</th>
                    <th>Mother's Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parents as $parent)
                <tr>
                    <td>{{ $parent->id }}</td>
                    <td>{{ $parent->father_first_name }} {{ $parent->father_last_name }}</td>
                    <td>{{ $parent->mother_first_name }} {{ $parent->mother_last_name }}</td>
                    <td>{{ $parent->father_phone }}</td>
                    <td>{{ $parent->mother_phone }}</td>
                    <td>
                        <a href="{{ route('parents.show', $parent->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('parents.edit', $parent->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('parents.destroy', $parent->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this parent?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection