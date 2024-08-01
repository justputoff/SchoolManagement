@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mt-3">
    <h5 class="card-header">Laporan Pembayaran</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Nama Siswa</th>
            <th class="text-white">Paket</th>
            <th class="text-white">Jumlah</th>
            <th class="text-white">Tanggal Pembayaran</th>
            <th class="text-white">Status</th>
            <th class="text-white">Metode Pembayaran</th>
            <th class="text-white">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($payments as $payment)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $payment->student->user->name  }}</td>
            <td>{{ $payment->package->name }}</td>
            <td>{{ number_format($payment->amount, 0, ',', ',') }}</td>
            <td>{{ $payment->payment_date }}</td>
            <td>{{ ucfirst($payment->status) }}</td>
            <td>{{ ucfirst($payment->payment_method) }}</td>
            <td>{{ $payment->description }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('#filterStatus, #filterMetode').select2({
      placeholder: "Pilih",
      allowClear: true
    });
  });
</script>
@endpush

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush