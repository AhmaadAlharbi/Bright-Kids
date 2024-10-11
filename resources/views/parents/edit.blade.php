@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Parent</h1>
    <form action="{{ route('parents.update', $parent) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <h3>Father's Information</h3>
                <div class="mb-3">
                    <label for="father_first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="father_first_name" name="father_first_name"
                        value="{{ old('father_first_name', $parent->father_first_name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="father_last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="father_last_name" name="father_last_name"
                        value="{{ old('father_last_name', $parent->father_last_name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="father_occupation" class="form-label">Occupation</label>
                    <input type="text" class="form-control" id="father_occupation" name="father_occupation"
                        value="{{ old('father_occupation', $parent->father_occupation) }}" required>
                </div>
                <div class="mb-3">
                    <label for="father_phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="father_phone" name="father_phone"
                        value="{{ old('father_phone', $parent->father_phone) }}" required>
                </div>
                <div class="mb-3">
                    <label for="father_email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="father_email" name="father_email"
                        value="{{ old('father_email', $parent->father_email) }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Mother's Information</h3>
                <div class="mb-3">
                    <label for="mother_first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="mother_first_name" name="mother_first_name"
                        value="{{ old('mother_first_name', $parent->mother_first_name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="mother_last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="mother_last_name" name="mother_last_name"
                        value="{{ old('mother_last_name', $parent->mother_last_name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="mother_occupation" class="form-label">Occupation</label>
                    <input type="text" class="form-control" id="mother_occupation" name="mother_occupation"
                        value="{{ old('mother_occupation', $parent->mother_occupation) }}" required>
                </div>
                <div class="mb-3">
                    <label for="mother_phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="mother_phone" name="mother_phone"
                        value="{{ old('mother_phone', $parent->mother_phone) }}" required>
                </div>
                <div class="mb-3">
                    <label for="mother_email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="mother_email" name="mother_email"
                        value="{{ old('mother_email', $parent->mother_email) }}" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="home_address" class="form-label">Home Address</label>
            <textarea class="form-control" id="home_address" name="home_address" rows="3"
                required>{{ old('home_address', $parent->home_address) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Parent</button>
    </form>
</div>
@endsection