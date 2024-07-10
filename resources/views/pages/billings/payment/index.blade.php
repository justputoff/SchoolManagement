@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Payments for Billing: {{ $billing->id }}</h4>
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('payments.create', $billing->id) }}" class="btn btn-primary btn-sm">Add Payment</a>
            <a href="{{ route('billings.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap p-3">
                <table class="table" id="example">
                    <thead>
                        <tr class="text-nowrap table-dark">
                            <th class="text-white">No</th>
                            <th class="text-white">Student</th>
                            <th class="text-white">Package</th>
                            <th class="text-white">Payment Date</th>
                            <th class="text-white">Amount</th>
                            <th class="text-white">Payment Method</th>
                            <th class="text-white">Description</th>
                            <th class="text-white">Type</th>
                            <th class="text-white">Status</th>
                            <th class="text-white">Payment Proof</th>
                            <th class="text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($billing->payments as $payment)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $payment->student->user->name }}</td>
                            <td>{{ $payment->package->name }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>Rp {{ number_format($payment->amount, 2, ',', '.') }}</td>
                            <td>{{ $payment->payment_method }}</td>
                            <td>{{ $payment->description }}</td>
                            <td>{{ $payment->type }}</td>
                            <td>{{ $payment->status }}</td>
                            <td>
                                @if($payment->payment_proof)
                                    <a href="{{ Storage::url($payment->payment_proof) }}" target="_blank">View Proof</a>
                                @else
                                    No Proof
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('payments.edit', [$billing->id, $payment->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('payments.destroy', [$billing->id, $payment->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
