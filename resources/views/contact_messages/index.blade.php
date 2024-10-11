@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Contact Messages</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->mobile }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>
                        @if($message->read)
                        <span class="badge bg-success">Read</span>
                        @else
                        <span class="badge bg-warning text-dark">Unread</span>
                        @endif
                    </td>
                    <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.contact-messages.show', $message->id) }}"
                            class="btn btn-sm btn-primary">View</a>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $message->id }}">
                            Delete
                        </button>
                    </td>
                </tr>

                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteModal{{ $message->id }}" tabindex="-1"
                    aria-labelledby="deleteModalLabel{{ $message->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $message->id }}">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this message from {{ $message->name }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('admin.contact-messages.destroy', $message->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $messages->links() }}
    </div>
</div>
@endsection