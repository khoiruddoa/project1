<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">



    <div class="container mx-auto p-4 mt-10 mb-10 ">
        <div class="table-responsive lg:w-3/4 mx-auto">
            <br>

            <h2 class="text-center text-2xl font-bold mb-4">NOTA TRANSAKSI PENJUALAN</h2>
            <table class="mb-4">

                <tr>
                    <td class="font-bold">Tanggal</td>
                    <td>{{ date('d-m-Y', strtotime($transaction->created_at)) }}</td>
                </tr>
                <tr>
                    <td class="font-bold">Nama Pengepul</td>
                    <td>{{ $transaction->user->name }}</td>
                </tr>
            </table>
            
                   
            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Qty</th>
                        <th class="px-4 py-2">Harga Jual</th>
                        <th class="px-4 py-2">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($detail_transactions as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ preg_replace('/\d+\./', '', $item->category->category_name) }}</td>
                            <td class="border px-4 py-2">{{ number_format($item->qty, 3, ',', '.') }}
                                {{ $item->category->uom }}</td>
                            <td class="border px-4 py-2">@currency($item->price)</td>
                            <td class="border px-4 py-2">@currency($item->price * $item->qty)</td>
                        </tr>
                        
                        @php
                        $total += $item->price * $item->qty; // tambahkan nilai baru ke total
                    @endphp
                    @endforeach
                    <tr>

                        <td class=""></td>
                        <td class=""></td>
                        <td class=""></td>

                        <th class="border px-4 py-2">Total :</th>
                        <td class="border px-4 py-2">@currency($total)</td>
                    </tr>
                </tbody>
            </table>



            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Tgl</th>
                        <th class="px-4 py-2">Jumlah Bayar</th>
                        
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($payments as $payment)
                        <tr>
                            <td class="text-center">{{ date('d-m-Y', strtotime($transaction->created_at)) }}</td>
                            <td class="border px-4 py-2">@currency($payment->pay_total)</td>
                           
                        </tr>
                    @endforeach
                    <tr>

                        
                        <th>Total Bayar :</th>
                        <td class="border px-4 py-2">@currency($payments->sum('pay_total'))</td>
                    </tr>
                </tbody>
            </table>
            <h2 class="text-left text-lg font-bold mb-4">Print By : {{ auth()->user()->name }}</h2>
            <h2 class="text-left text-lg font-bold mb-4">  {{ date('d F Y') }}
            </h2>
          
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
