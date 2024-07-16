@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Add Payment for Billing: {{ $billing->id }}</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('payments.store', $billing->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="student_id" class="form-label">Student</label>
                    <select class="form-control" id="student_id" name="student_id" required>
                            <option value="{{ $billing->user->student->id }}">{{ $billing->user->student->user->name }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="package_name" class="form-label">Package</label>
                    <input type="text" class="form-control" id="package_name" name="package_name" value="{{ $billing->package->name }}" disabled>
                    <input type="hidden" name="package_id" value="{{ $billing->package->id }}">
                </div>
                <div class="mb-3">
                    <label for="payment_date" class="form-label">Payment Date</label>
                    <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="book">Book</option>
                        <option value="registration">Registration</option>
                        <option value="tuition fee">Tuition Fee</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Pending">Pending</option>
                        <option value="Success">Success</option>
                        <option value="Cancel">Cancel</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method</label>
                    <select class="form-control" id="payment_method" name="payment_method" required>
                        <option value="cash">Cash</option>
                        <option value="bank_transfer">Bank Transfer</option>
                        <option value="qris">Qris</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="payment_proof" class="form-label">Payment Proof</label>
                    <input type="file" class="form-control" id="payment_proof" name="payment_proof">
                </div>
                <button type="submit" class="btn btn-primary">Add Payment</button>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
