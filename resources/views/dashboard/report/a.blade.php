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

            <h2 class="text-center text-2xl font-bold mb-4">LAPORAN TRANSAKSI</h2>
            <table class="mb-4">
               
                <tr>
                    <td class="font-bold">Tanggal</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="font-bold">Pemesan</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="font-bold">Alamat</td>
                    <td>:</td>
                    <td></td>
                </tr>
               
            </table>
            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Nama Barang</th>
                        <th class="px-4 py-2">Jumlah</th>
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($bills as $bill)
                        @foreach ($bill->order->sell as $selll) --}}
                            <tr>
                                <td class="border px-4 py-2"></td>
                                <td class="border px-4 py-2"></td>
                                <td class="border px-4 py-2"></td>
                                <td class="border px-4 py-2"></td>
                                <td class="border px-4 py-2"></td>

                            </tr>
                        {{-- @endforeach
                    @endforeach --}}
                    <tr>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>

                        <th class="border px-4 py-2"> Total Tagihan</th>
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
