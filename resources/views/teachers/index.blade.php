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
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Teachers</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add New Teacher</a>

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif




            <div class="table-responsive custom-table-container">
                <table id="responsiveDataTable" class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>
                                <form id="deleteForm-{{ $teacher->id }}"
                                    action="{{ route('teachers.destroy',$teacher->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('teachers.show',$teacher->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('teachers.edit',$teacher->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-danger"
                                        onclick="confirmDelete({{ $teacher->id }})">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this item?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                        </div>
                    </div>
                </div>
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
<script>
    function confirmDelete(teacherId) {
        // Store the form id for later use in the modal
        var formId = 'deleteForm-' + teacherId;

        // Show the modal
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();

        // When the delete button in the modal is clicked
        document.getElementById('confirmDeleteBtn').onclick = function() {
            // Submit the form
            document.getElementById(formId).submit();
        }
    }
</script>
@endsection