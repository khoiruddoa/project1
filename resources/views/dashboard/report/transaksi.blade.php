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

            <h2 class="text-center text-2xl font-bold mb-4">LAPORAN TRANSAKSI</h2>
            <table class="mb-4">

                <tr>
                    <td class="font-bold">Periode</td>
                    <td>{{ date('d-m-Y', strtotime($start)) }} s/d {{ date('d-m-Y', strtotime($end)) }}</td>
                </tr>
                <tr>
                    <td class="font-bold">Saldo Awal : @currency($saldo_awal)</td>
                </tr>
                


            </table>
            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Tgl</th>
                        <th class="px-4 py-2">Nama Transaksi</th>
                        <th class="px-4 py-2">Debet</th>
                        <th class="px-4 py-2">Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="border px-4 py-2">{{ $transaction->updated_at->format('d-m-Y') }}</td>

                            <td class="border px-4 py-2">
                                @if ($transaction->origin == 'keluar')
                                    @if ($transaction->information == 1)
                                        Penyelarasan Saldo
                                    @elseif($transaction->information == 2)
                                        Jasa Angkut Sampah
                                    @else
                                        Setor Sampah {{$transaction->user->name}}
                                    @endif
                                @elseif ($transaction->origin == 'masuk')
                                @if ($transaction->information == 1)
                                        Penyelarasan Saldo Nasabah
                                    @else
                                    Jual Ke Pengepul
                                    @endif
                                @else
                                    Bagi Keuntungan
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                @if ($transaction->origin == 'masuk')
                                    @currency($transaction->pay_total)
                                @endif

                            </td>
                            <td class="border px-4 py-2">
                                @if ($transaction->origin == 'keluar')
                                    @currency($transaction->pay_total)
                                @endif
                                @if ($transaction->origin == 'profit')
                                    @currency($transaction->pay_total)
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    <tr>

                        <td class=""></td>
                        <td class=""></td>

                        <th class="border px-4 py-2">Total Setor Sampah :</th>
                        <td class="border px-4 py-2">@currency($keluar)</td>
                    </tr>
                    <tr>

                        <td class=""></td>
                        <td class=""></td>

                        <th class="border px-4 py-2">Pendapatan :</th>
                        <td class="border px-4 py-2">@currency($pendapatan)</td>
                    </tr>
                    <tr>

                        <td class=""></td>
                        <td class=""></td>

                        <th class="border px-4 py-2">Total Saldo :</th>
                        <td class="border px-4 py-2">@currency($total_saldo)</td>
                    </tr>


                </tbody>
            </table>
            <h2 class="text-left text-lg font-bold mb-4">Print By : {{ auth()->user()->name }}</h2>
            <h2 class="text-left text-lg font-bold mb-4">  {{ date('d F Y') }}
            </h2> </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
