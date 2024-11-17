@extends('layouts.master-front')

@section('content')
<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header text-center">
            <h4>Delete Your Account</h4>
        </div>
        <div class="card-body pb-3">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('delete-account.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter your mobile number" required>
                </div>
                <div class="mb-3">
                    <label for="reason" class="form-label">Reason for Deletion</label>
                    <textarea name="reason" id="reason" rows="4" class="form-control" placeholder="Enter your reason for deletion" required></textarea>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-danger">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
