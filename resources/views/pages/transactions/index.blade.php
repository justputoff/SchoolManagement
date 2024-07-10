@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Transactions</h4>
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm">Add Transaction</a>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap p-3">
                <table class="table" id="example">
                    <thead>
                        <tr class="text-nowrap table-dark">
                            <th class="text-white">No</th>
                            <th class="text-white">User</th>
                            <th class="text-white">Student</th>
                            <th class="text-white">Description</th>
                            <th class="text-white">Amount</th>
                            <th class="text-white">Payment Method</th>
                            <th class="text-white">Payment Proof</th>
                            <th class="text-white">Details</th>
                            <th class="text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $transaction->user->name }}</td>
                            <td>{{ $transaction->student->user->name }}</td>
                            <td>{{ $transaction->description }}</td>
                            <td>Rp {{ number_format($transaction->amount, 2, ',', '.') }}</td>
                            <td>{{ $transaction->payment_method }}</td>
                            <td>
                                @if ($transaction->payment_proof)
                                <a href="{{ Storage::url($transaction->payment_proof) }}" target="_blank">View Payment Proof</a>
                                @else
                                No Payment Proof
                                @endif
                            </td>
                            <td>
                                <ul>
                                    @foreach ($transaction->transactionDetails as $detail)
                                    <li>{{ $detail->type }}: {{ $detail->description }} - Rp {{ number_format($detail->amount, 2, ',', '.') }} - {{ $detail->status }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('transactions.show', $transaction->id) }}" target="_blank" class="btn btn-secondary btn-sm">Print Invoice</a>
                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline-block;">
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