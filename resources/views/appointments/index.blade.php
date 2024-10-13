@extends('layouts.master')
@section('styles')

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<style>
    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    .card-header {
        background-color: #4a6cf7;
    }

    .table th {
        font-weight: 600;
    }

    .btn-group .btn {
        padding: .25rem .5rem;
    }
</style>

@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Appointments</h5>
        </div>
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('appointments.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i>Book New Appointment
                </a>
            </div>

            <div class="table-responsive">
                <table id="responsiveDataTable" class="table table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Child Name</th>
                            <th>Father Name</th>
                            <th>Mother Name</th>
                            <th>Date of Birth</th>
                            <th>Visit Date & Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $appointment->child_name }}</td>
                            <td>{{ $appointment->father_name }}</td>
                            <td>{{ $appointment->mother_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($appointment->date_of_birth)->format('M d, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($appointment->visit_date_time)->format('M d, Y H:i') }}</td>
                            <td>
                                <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select form-select-sm"
                                        onchange="this.form.submit()">
                                        <option value="uncompleted" {{ $appointment->status === 'uncompleted' ?
                                            'selected' : '' }}>Uncompleted</option>
                                        <option value="completed" {{ $appointment->status === 'completed' ? 'selected' :
                                            '' }}>Completed</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('appointments.show', $appointment) }}"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('appointments.edit', $appointment) }}"
                                        class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('appointments.destroy', $appointment) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this appointment?')">
                                            <i class="fas fa-trash"></i>
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
<script>
    $(document).ready(function() {
        $('.status-checkbox').on('change', function() {
            const $checkbox = $(this);
            const appointmentId = $checkbox.closest('.status-toggle').data('appointment-id');
            const newStatus = this.checked ? 'completed' : 'uncompleted';
    
            $.ajax({
                url: `/appointments/${appointmentId}/update-status`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: newStatus
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Status updated successfully');
                        // Optionally update UI here
                    } else {
                        console.error('Server returned an error');
                        $checkbox.prop('checked', !$checkbox.prop('checked'));
                        alert('Failed to update status. Please try again.');
                    }
                },
                error: function(xhr) {
                    console.error('Error updating status');
                    $checkbox.prop('checked', !$checkbox.prop('checked'));
                    alert('Failed to update status. Please try again.');
                }
            });
        });
    });
</script>
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