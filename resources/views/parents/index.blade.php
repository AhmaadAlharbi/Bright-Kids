@extends('layouts.master')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<style>
    .parents-list-title {
        color: #007bff;
        font-weight: bold;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }

    .custom-alert {
        border-radius: 10px;
        font-weight: 500;
    }

    .custom-table-container {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    #responsiveDataTable {
        margin-bottom: 0;
    }

    #responsiveDataTable thead th {
        background-color: #343a40;
        color: white;
        border-top: none;
    }

    #responsiveDataTable tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1);
    }

    .custom-btn {
        margin-right: 5px;
        border-radius: 5px;
        font-weight: 500;
    }

    .custom-btn:last-child {
        margin-right: 0;
    }

    @media (max-width: 768px) {
        .custom-btn {
            display: block;
            width: 100%;
            margin-bottom: 5px;
        }
    }
</style>
@endsection
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Parents List</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success custom-alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="table-responsive custom-table-container">
                <table id="responsiveDataTable" class="table table-striped table-hover">
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
                                <a href="{{ route('parents.show', $parent->id) }}"
                                    class="btn btn-sm btn-info custom-btn">View</a>
                                <a href="{{ route('parents.edit', $parent->id) }}"
                                    class="btn btn-sm btn-primary custom-btn">Edit</a>
                                <form action="{{ route('parents.destroy', $parent->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger custom-btn"
                                        onclick="return confirm('Are you sure you want to delete this parent?')">Delete</button>
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