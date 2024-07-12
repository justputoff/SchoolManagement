@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('billings.create') }}" class="btn btn-primary btn-sm">Create Billing</a>
        </div>
    </div>
    <div class="card mt-2">
        <h5 class="card-header">Table Billings</h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">No Invoice</th>
                        <th class="text-white">User</th>
                        <th class="text-white">Cabang</th>
                        <th class="text-white">Package</th>
                        <th class="text-white">Payment Date</th>
                        <th class="text-white">Due Date</th>
                        <th class="text-white">Total Amount</th>
                        <th class="text-white">Status</th>
                        <th class="text-white">Payments</th>
                        <th class="text-white">Paid / Total</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($billings as $billing)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ str_pad($billing->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $billing->user->name }}</td>
                        <td>{{ $billing->user->student->cabang ?? 'N / A' }}</td>
                        <td>{{ $billing->package->name }} - {{ $billing->package->type }}</td>
                        <td>{{ $billing->payment_date }}</td>
                        <td>{{ $billing->due_date }}</td>
                        <td>Rp {{ number_format($billing->amount, 2, ',', '.') }}</td>
                        <td>{{ $billing->status }}</td>
                        <td>
                            @foreach ($billing->payments->where('status', 'Success') as $payment)
                                <div>{{ $payment->payment_date }}: Rp {{ number_format($payment->amount, 2, ',', '.') }}</div>
                            @endforeach
                        </td>
                        <td>
                            @php
                                $totalPaid = $billing->payments->where('status', 'Success')->sum('amount');
                            @endphp
                            Rp {{ number_format($totalPaid, 2, ',', '.') }} / Rp {{ number_format($billing->amount, 2, ',', '.') }}
                        </td>
                        <td>
                            <a href="{{ route('billings.edit', $billing->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('payments.index', $billing->id) }}" class="btn btn-info btn-sm">Payments</a>
                            <a href="{{ route('billings.show', $billing->id) }}" target="_blank" class="btn btn-secondary btn-sm">Print Invoice</a>
                            <form action="{{ route('billings.destroy', $billing->id) }}" method="POST" style="display:inline-block;">
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
<!-- / Content -->
@endsection
