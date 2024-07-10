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
        font: 12pt;
        font-family: 'Public Sans', sans-serif;
      }
  
      * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
      }

      @page {
        size: A4;
        margin: 0;
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
        left: 30%;
        transform: translate(-50%, -50%);
        color: red;
        font-size: 80px;
        font-weight: bold;
        border: 15px solid red;
        padding: 20px;
        border-radius: 10px;
        transform: rotate(-30deg) translate(-10%, -90%);
        opacity: 0.5;
        z-index: 1000;
      }
    </style>
</head>
<body onload="window.print()">
    <div class="page">
        <div class="paid-stamp">PAID</div>
        <div class="row">
            <div class="col-3 card p-1">
                <img src="{{ asset('assets/img/logo-intents.jpg') }}" style="max-width: 160px" alt="">
            </div>
            <div class="col-5">
                <div class="">
                    <span class="fw-bold" style="font-size: 15px">PT. INTENTS EDUCATION SOLUTION </span> <br>
                    <span style="font-size: 13px">
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
                    <span class="fst-italic">#INV{{ str_pad($transaction->id, 3, '0', STR_PAD_LEFT) }} </span> <br>
                    <span style="font-size: 14px">
                        Tanggal: {{ date('d - F -Y', strtotime($transaction->transaction_date)) }} <br>
                    </span>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="fw-bold">Pelanggan: {{ $transaction->student->user->name }}</span> <br>
                Jl. Sisingamangaraja No. 69 Simpang Haru <br>
                {{ $transaction->student->user->phone ?? 'N / A' }}
            </div>
        </div>
        <div class="">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Di Bayar</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($transaction->transactionDetails as $detail)
                    <tr>
                      <td>{{ $detail->type }}</td>
                      <td>{{ $detail->description }}</td>
                      <td>Rp. {{ number_format($detail->amount, 0, ',', '.') }}</td>
                      <td>{{ date('d - F - Y', strtotime($transaction->transaction_date)) }}</td>
                      <td>{{ $transaction->user->name ?? 'N / A' }}</td>
                      <td>Rp. {{ number_format($detail->amount, 0, ',', '.') }}</td>
                      <td>{{ $detail->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        <div class="row">
            <div class="col-6">
                <p style="font-size: 14px" class="fst-italic">
                    Terima kasih atas kepercayaannya. <br>
                    Semoga bapak/ibu sehat selalu
                </p>
                <p style="font-size: 16px">
                    Info Pembayaran: <br>
                    Transfer Bank: 066901001096565 <br>
                    Lainnya: Bank BRI <br>
                    PT. Intents Education Solution
                </p>
            </div>
            <div class="col-6" style="font-size: 20px">
                <p>
                    @php
                        $total = $transaction->transactionDetails->where('status', 'paid')->sum('amount');
                    @endphp
                    <span class="fw-bold">Total</span> Rp{{ number_format($total, 0, ',', '.') }}<br>
                </p>
                <hr>
                <p>
                    Dibayar Rp{{ number_format($total, 0, ',', '.') }} / Rp{{ number_format($transaction->amount, 0, ',', '.') }} 
                </p>
            </div>
        </div>
    </div>
</body>
</html>
