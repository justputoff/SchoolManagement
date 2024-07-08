@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Add Transaction</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('transactions.store', $billing->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="student_id" class="form-label">Student</label>
                        <select class="form-control" id="student_id" name="student_id" required>
                            <option value="{{ $billing->user->student->id }}">{{ $billing->user->student->name }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="transaction_date" class="form-label">Transaction Date</label>
                    <input type="date" class="form-control" id="transaction_date" name="transaction_date" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Transaction</button>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
