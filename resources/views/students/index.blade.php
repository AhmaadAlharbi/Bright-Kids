@extends('layouts.master')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<style>
    .custom-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }

    .custom-card-header {
        background-color: #007bff;
        padding: 1rem 1.5rem;
    }

    .custom-card-header h5 {
        font-weight: 600;
        font-size: 1.25rem;
    }

    .custom-card-body {
        padding: 2rem;
    }

    .custom-alert {
        border-radius: 10px;
        font-weight: 500;
    }

    .custom-btn {
        border-radius: 5px;
        font-weight: 500;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }

    .custom-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .custom-table {
        border-collapse: separate;
        border-spacing: 0 0.5rem;
    }

    .custom-table thead th {
        background-color: #343a40;
        color: white;
        border: none;
        padding: 1rem;
        font-weight: 600;
    }

    .custom-table tbody tr {
        background-color: #f8f9fa;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .custom-table tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .custom-table tbody td {
        padding: 1rem;
        vertical-align: middle;
    }

    .custom-action-btn {
        margin-right: 0.25rem;
        border-radius: 5px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .custom-action-btn:hover {
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .custom-card-body {
            padding: 1.5rem;
        }

        .custom-table thead {
            display: none;
        }

        .custom-table tbody tr {
            display: block;
            margin-bottom: 1rem;
        }

        .custom-table tbody td {
            display: block;
            text-align: right;
            padding: 0.5rem 1rem;
        }

        .custom-table tbody td::before {
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
        }

        .custom-action-btn {
            margin-right: 0;
            margin-bottom: 0.5rem;
        }
    }
</style>
@endsection
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm custom-card">
        <div class="card-header bg-primary text-white custom-card-header">
            <h5 class="card-title mb-0">Students List</h5>
        </div>
        <div class="card-body custom-card-body">
            @if(session('success'))
            <div class="alert alert-success custom-alert" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <a href="{{ route('students.create') }}" class="btn btn-primary mb-3 custom-btn">
                <i class="fas fa-plus-circle mr-2"></i>Add New Student
            </a>
            <div class="table-responsive">
                <table id="responsiveDataTable" class="table table-striped table-hover custom-table">
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
                                {{ $student->parents->mother_first_name }} {{ $student->parents->mother_last_name }}
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('students.show', $student->id) }}"
                                        class="btn btn-sm btn-info custom-action-btn">
                                        <i class="fas fa-eye mr-1"></i>View
                                    </a>
                                    <a href="{{ route('students.edit', $student->id) }}"
                                        class="btn btn-sm btn-primary custom-action-btn">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger custom-action-btn"
                                            onclick="return confirm('Are you sure you want to delete this student?')">
                                            <i class="fas fa-trash-alt mr-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
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
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Datatables Cdn -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- Internal Datatables JS -->
@vite('resources/assets/js/datatables.js')
@endsection