@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Add Transaction</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="student_id" class="form-label">Student</label>
                    <select class="form-control" id="student_id" name="student_id" required>
                        @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->user->name }}</option>
                        @endforeach
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
                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method</label>
                    <select class="form-control" id="payment_method" name="payment_method" required>
                        <option value="cash">Cash</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="payment_proof" class="form-label">Payment Proof</label>
                    <input type="file" class="form-control" id="payment_proof" name="payment_proof">
                </div>
                <!-- Transaction Details -->
                <div id="transaction-details">
                    <div class="mb-3">
                        <label for="detail_type" class="form-label">Type</label>
                        <select class="form-control" name="details[0][type]" required>
                            <option value="book">Book</option>
                            <option value="registration">Registration</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="detail_status" class="form-label">Status</label>
                        <select class="form-control" name="details[0][status]" required>
                            <option value="pending">Pending</option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="detail_description" class="form-label">Detail Description</label>
                        <input type="text" class="form-control" name="details[0][description]" required>
                    </div>
                    <div class="mb-3">
                        <label for="detail_amount" class="form-label">Detail Amount</label>
                        <input type="number" class="form-control" name="details[0][amount]" required>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" id="add-detail">Add Detail</button>
                <!-- /Transaction Details -->
                <button type="submit" class="btn btn-primary">Add Transaction</button>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->

<script>
    document.getElementById('add-detail').addEventListener('click', function() {
        var detailIndex = document.querySelectorAll('#transaction-details .mb-3').length / 3;
        var detailHtml = `
            <div class="mb-3">
                <label for="detail_type" class="form-label">Type</label>
                <select class="form-control" name="details[${detailIndex}][type]" required>
                    <option value="book">Book</option>
                    <option value="registration">Registration</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="detail_status" class="form-label">Status</label>
                <select class="form-control" name="details[${detailIndex}][status]" required>
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="detail_description" class="form-label">Detail Description</label>
                <input type="text" class="form-control" name="details[${detailIndex}][description]" required>
            </div>
            <div class="mb-3">
                <label for="detail_amount" class="form-label">Detail Amount</label>
                <input type="number" class="form-control" name="details[${detailIndex}][amount]" required>
            </div>
        `;
        document.getElementById('transaction-details').insertAdjacentHTML('beforeend', detailHtml);
    });
</script>
@endsection