@extends('layouts.master')
@section('styles')

<style>
    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .btn-sm {
        border-radius: 20px;
    }

    .list-unstyled li {
        position: relative;
        padding-left: 1.5rem;
    }

    .list-unstyled li:before {
        content: "\F26A";
        font-family: "Bootstrap-icons";
        position: absolute;
        left: 0;
        color: #6c757d;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    #replyContent {
        resize: vertical;
    }
</style>
@endsection
@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h1 class="mb-0 fs-4">Contact Message Details</h1>
            <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-4">
                                <i class="bi bi-person-circle me-2"></i>Sender Information
                            </h5>
                            <ul class="list-unstyled">
                                <li class="mb-3"><strong>Name:</strong> <span class="text-muted">{{ $message->name
                                        }}</span></li>
                                <li class="mb-3"><strong>Email:</strong> <span class="text-muted">{{ $message->email
                                        }}</span></li>
                                <li class="mb-3"><strong>Mobile:</strong> <span class="text-muted">{{ $message->mobile
                                        }}</span></li>
                                <li><strong>Sent on:</strong> <span class="text-muted">{{
                                        $message->created_at->format('F d, Y H:i:s') }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-4">
                                <i class="bi bi-envelope me-2"></i>Message Details
                            </h5>
                            <ul class="list-unstyled">
                                <li class="mb-3"><strong>Subject:</strong> <span class="text-muted">{{ $message->subject
                                        }}</span></li>
                                <li class="mb-3">
                                    <strong>Status:</strong>
                                    @if($message->read)
                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Read</span>
                                    @else
                                    <span class="badge bg-warning text-dark"><i
                                            class="bi bi-exclamation-circle me-1"></i>Unread</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-4">
                                <i class="bi bi-chat-left-text me-2"></i>Message Content
                            </h5>
                            <div class="p-3 bg-light rounded">
                                {{ $message->message }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-4">
                                <i class="bi bi-reply me-2"></i>Reply to Message
                            </h5>
                            <form id="replyForm" action="#" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="replyContent" class="form-label">Your Reply</label>
                                    <textarea class="form-control" id="replyContent" name="replyContent" rows="5"
                                        required></textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-send me-2"></i>Send Reply
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    @if(!$message->read)
                    <form action="{{ route('admin.contact-messages.mark-as-read', $message->id) }}" method="POST"
                        class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-check2-all me-1"></i>Mark as Read
                        </button>
                    </form>
                    @endif
                </div>
                <a href="mailto:{{ $message->email }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-envelope me-1"></i>Open in Email Client
                </a>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
    const replyForm = document.getElementById('replyForm');
    replyForm.addEventListener('submit', function(e) {
        e.preventDefault();
        // You can add client-side validation here if needed
        alert('Reply functionality will be implemented later.');
    });
});
</script>
@endsection