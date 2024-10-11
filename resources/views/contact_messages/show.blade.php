@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h1 class="mb-0">Contact Message Details</h1>
            <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-light">Back to List</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Sender Information</h5>
                    <p><strong>Name:</strong> {{ $message->name }}</p>
                    <p><strong>Email:</strong> {{ $message->email }}</p>
                    <p><strong>Mobile:</strong> {{ $message->mobile }}</p>
                    <p><strong>Sent on:</strong> {{ $message->created_at->format('F d, Y H:i:s') }}</p>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title">Message Details</h5>
                    <p><strong>Subject:</strong> {{ $message->subject }}</p>
                    <p><strong>Status:</strong>
                        @if($message->read)
                        <span class="badge bg-success">Read</span>
                        @else
                        <span class="badge bg-warning text-dark">Unread</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <h5 class="card-title">Message Content</h5>
                    <div class="card">
                        <div class="card-body">
                            {{ $message->message }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            @if(!$message->read)
            <form action="{{ route('admin.contact-messages.mark-as-read', $message->id) }}" method="POST"
                class="d-inline">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success">Mark as Read</button>
            </form>
            @endif
            <a href="mailto:{{ $message->email }}" class="btn btn-primary">Reply via Email</a>
        </div>
    </div>
</div>
@endsection