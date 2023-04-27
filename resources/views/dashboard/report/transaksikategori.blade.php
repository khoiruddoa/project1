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

            <h2 class="text-center text-2xl font-bold mb-4">LAPORAN TRANSAKSI KATEGORI @if($kode == 1)
                UMUM
                @elseif($kode == 2)
                TK
                @elseif($kode == 3)
                BIMBEL
                @else
               KESELURUHAN
                @endif</h2>
            <table class="mb-4">

                <tr>
                    <td class="font-bold">Periode</td>
                    <td>{{ date('d-m-Y', strtotime($start)) }} s/d {{ date('d-m-Y', strtotime($end)) }}</td>
                </tr>
               
               

            </table>
            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr> <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Tgl</th>
                        <th class="px-4 py-2">Nama Transaksi</th>
                        <th class="px-4 py-2">Harga Beli</th>
                        <th class="px-4 py-2">Harga Jual</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>

                            <td class="border px-4 py-2">{{ $transaction->created_at->format('d-m-Y') }}</td>

                            <td class="border px-4 py-2">
                               Penimbangan Sampah dari {{$transaction->user->name}}
                            </td>
                            <td class="border px-4 py-2">
                              @currency($transaction->pay_total)
                            </td>
                            <td class="border px-4 py-2">
                                @currency($transaction->sell_total)
                                
                            </td>

                        </tr>
                    @endforeach
                    <tr>

                        <td class=""></td>
                        <td class=""></td>

                        <th class="border px-4 py-2">Total harga jual :</th>
                        <td class="border px-4 py-2">@currency($transactions->sum('sell_total'))</td>
                    </tr>
                    <tr>

                        <td class=""></td>
                        <td class=""></td>

                        <th class="border px-4 py-2">Total harga Beli :</th>
                        <td class="border px-4 py-2">@currency($transactions->sum('pay_total'))</td>
                    </tr>


                    <tr>

                        <td class=""></td>
                        <td class=""></td>

                        <th class="border px-4 py-2">Pendapatan :</th>
                        <td class="border px-4 py-2">@currency($transactions->sum('sell_total') - $transactions->sum('pay_total'))</td>
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
