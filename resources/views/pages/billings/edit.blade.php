@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Edit Billing</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('billings.update', $billing->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $billing->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="package_id" class="form-label">Package</label>
                    <select class="form-control" id="package_id" name="package_id" required>
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}" {{ $billing->package_id == $package->id ? 'selected' : '' }}>{{ $package->name }} - {{ $package->type }} {{ $package->level == $package->name ? '' : ' -' . $package->level }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="payment_date" class="form-label">Payment Date</label>
                    <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ $billing->payment_date }}" required>
                </div>
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $billing->due_date }}" required>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Total Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="{{ $billing->amount }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Pending" {{ $billing->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Paid" {{ $billing->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                        <option value="Overdue" {{ $billing->status == 'Overdue' ? 'selected' : '' }}>Overdue</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
