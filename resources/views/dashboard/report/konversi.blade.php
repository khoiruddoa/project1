<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200">



    <div class="container mx-auto p-4">
        <div class="table-responsive lg:w-3/4 mx-auto">
            <br>

            <h2 class="text-center text-2xl font-bold mb-4">LAPORAN KONVERSI</h2>
            <table class="mb-4">

                <tr>
                    <td class="font-bold">Per Tanggal</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="font-bold">Saldo Awal</td>
                    <td>:</td>
                    <td></td>
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
                    @foreach ($convertions as $convertion)
                        <tr>
                            <td class="border px-4 py-2">{{ $convertion->updated_at->format('d-m-Y') }}</td>

                            <td class="border px-4 py-2">
                                @if ($convertion->origin == 'keluar')
                                    Konversi Emas Senilai
                                @elseif ($convertion->origin == 'masuk')
                                    Dana Masuk
                                @else
                                Bagi Keuntungan
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                @if ($convertion->origin == 'masuk')
                                    @currency($convertion->pay_total)
                                @endif
                                @if ($convertion->origin == 'profit')
                                    @currency($convertion->pay_total)
                                @endif
                            </td>

                            </td>
                            <td class="border px-4 py-2">
                                @if ($convertion->origin == 'keluar')
                                    @currency($convertion->pay_total)
                                @endif
                                

                        </tr>
                    @endforeach
                    <tr>

                        <td class=""></td>
                        <td class=""></td>

                        <th class="border px-4 py-2">Sisa Saldo</th>
                        <td class="border px-4 py-2"></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
