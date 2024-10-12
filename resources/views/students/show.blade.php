@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Student Details</h1>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $student->first_name }} {{ $student->last_name }}</h2>
            <p><strong>Grade:</strong> {{ $student->grade }}</p>
            <p><strong>Date of Birth:</strong> {{ $student->date_of_birth }}</p>
            <p><strong>Gender:</strong> {{ $student->gender }}</p>
            <p><strong>Enrollment Date:</strong> {{ $student->enrollment_date ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $student->address ?? 'N/A' }}</p>
            <p><strong>Medical Info:</strong> {{ $student->medical_info ?? 'N/A' }}</p>
            <p><strong>Notes:</strong> {{ $student->notes ?? 'N/A' }}</p>
            <h3>Parents Information</h3>
            <p><strong>Father:</strong> {{ $student->parents->father_first_name }} {{
                $student->parents->father_last_name }}</p>
            <p><strong>Mother:</strong> {{ $student->parents->mother_first_name }} {{
                $student->parents->mother_last_name }}</p>
        </div>
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-primary mt-3">Back to Students List</a>
    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning mt-3">Edit Student</a>
    <h2 class="mb-3">Student Documents</h2>
    <div class="card mb-4">
        <div class="card-body">
            <h3>Upload New Document</h3>
            <form action="{{ route('students.upload-document', $student) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="document_type" class="form-label">Document Type</label>
                    <select class="form-select" id="document_type" name="document_type" required>
                        <option value="student_id">Student ID</option>
                        <option value="birth_certificate">Birth Certificate</option>
                        <option value="father_id">Father's ID</option>
                        <option value="mother_id">Mother's ID</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="document" class="form-label">Document File</label>
                    <input type="file" class="form-control" id="document" name="document" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload Document</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3>Uploaded Documents</h3>
            @if($student->documents->count() > 0)
            <ul class="list-group">
                @foreach($student->documents as $document)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ ucfirst(str_replace('_', ' ', $document->document_type)) }}
                    <div>
                        <a href="{{ asset('storage/' . $document->file_path) }}" class="btn btn-sm btn-info"
                            target="_blank">View</a>
                        <form action="{{ route('students.delete-document', $document) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this document?')">Delete</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <p>No documents uploaded yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection