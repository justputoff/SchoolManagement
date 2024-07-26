<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo-intents.jpg') }}" />
    <title>Invoice - {{ mt_rand(000000,999999) }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    /> 

<style>
    body {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      background-color: #FAFAFA;
      font: 12pt "Times New Roman";
    }

    * {
      box-sizing: border-box;
      -moz-box-sizing: border-box;
    }

    .page {
      width: 210mm;
      min-height: 297mm;
      padding: 15mm;
      margin: 10mm auto;
      border: 1px #D3D3D3 solid;
      border-radius: 5px;
      background: white;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .subpage {
      padding: 1cm;
      border: 5px red solid;
      height: 257mm;
      outline: 2cm #FFEAEA solid;
    }
    
    td {
      padding-top: 5px;
    }

    .borderhr {
      color: black;
      background-color: black;
      border-color: black;
      height: 5px;
      opacity: 100;
    }
    

    @page {
      size: A4;
      margin: 0;
    }

    @media print {

      html,
      body {
        width: 210mm;
        height: 297mm;
      }

      .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
      }
    }

    .paid-stamp {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: red;
        font-size: 60px; /* Mengurangi ukuran font */
        font-weight: bold;
        border: 10px solid red; /* Mengurangi ukuran border */
        padding: 10px; /* Mengurangi padding */
        border-radius: 10px;
        transform: rotate(-30deg) translate(-50%, -70%);
        opacity: 0.5;
        z-index: 1000;
      }
  </style>
</head>
<body onload="window.print()">
    <div class="page">
        <div class="paid-stamp">PAID</div>
        <div class="row">
            <div class="col-2 card p-1" style="height: 100px">
                <img src="{{ asset('assets/img/logo-intents.jpg') }}" style="max-width: 160px" alt="">
            </div>
            <div class="col-6">
                <div class="">
                    <span class="fw-bold" style="font-size: 11px">PT. INTENTS EDUCATION SOLUTION </span> <br>
                    <span style="font-size: 10px">
                        Jl. Dr. Moh. Hatta No.23 Jalan Tunggang <br>
                        Ps. Ambacang kec. Kuranji kota Padang <br>
                        082388059016 <br>
                        intentslanguagecousersebimbel@gmail.com
                    </span>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="">
                    <span class="fw-bold">FAKTUR </span> <br>
                    <span class="fst-italic">#INV{{ str_pad($billing->id, 3, '0', STR_PAD_LEFT) }} </span> <br>
                    <span style="font-size: 10px">
                        Tanggal: {{ date('d - F -Y', strtotime($billing->payment_date)) }} <br>
                        Jatuh Tempo: {{ date('d - F - Y', strtotime($billing->due_date)) }}
                    </span>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12" style="font-size: 12px">
                <span class="fw-bold">Pelanggan: {{ $billing->user->name }}</span> <br>
                {{ $billing->user->student->address ?? 'N / A' }}  | {{ $billing->user->student->phone ?? 'N / A' }}
            </div>
        </div>
        <div class="">
            <table class="table table-sm" style="font-size: 10px">
                <thead>
                  <tr>
                    <th scope="col">Package</th>
                    <th scope="col">Description</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Di Bayar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($billing->payments->where('status', 'Success') as $payment)
                    <tr>
                      <td>{{ $billing->package->name }} - {{ $billing->package->type }}</td>
                      <td>{{ $payment->description }}</td>
                      <td>Rp. {{ number_format($billing->amount, 0, ',', '.') }}</td>
                      <td>{{ date('d - F - Y', strtotime($payment->payment_date)) }}</td>
                      <td>{{ $payment->user->name ?? 'N / A' }}</td>
                      <td>Rp. {{ number_format($payment->amount, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        <div class="row">
            <div class="col-8">
                <p style="font-size: 10px" class="fst-italic">
                    Terima kasih atas kepercayaannya. <br>
                    Semoga bapak/ibu sehat selalu
                </p>
                <p style="font-size: 10px">
                    pembayaran selanjutnya {{ date('d - F - Y', strtotime($billing->due_date)) }} jam 17:00 <br>
                    Transfer Bank: 066901001096565 Lainnya: Bank BRI <br>
                    PT. Intents Education Solution
                </p>
            </div>
            <div class="col-4" style="font-size: 10px">
                <p>
                    @php
                        $total = $billing->payments->where('status', 'Success')->sum('amount');
                    @endphp
                    <span class="fw-bold">Total</span> Rp{{ number_format($total, 0, ',', '.') }}<br>
                </p>
                <hr>
                <p>
                    Dibayar Rp{{ number_format($billing->payments->where('status', 'Success')->sum('amount'), 0, ',', '.') }} / Rp{{ number_format($billing->amount, 0, ',', '.') }} 
                </p>
            </div>
        </div>
    </div>
</body>
</html>