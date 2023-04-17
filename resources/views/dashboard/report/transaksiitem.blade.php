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

            <h2 class="text-center text-2xl font-bold mb-4">LAPORAN PENIMBANGAN PER ITEM BARANG</h2>
            <table class="mb-4">

                <tr>
                    <td class="font-bold">Periode</td>
                    <td>{{ date('d-m-Y', strtotime($start)) }} s/d {{ date('d-m-Y', strtotime($end)) }}</td>
                </tr>


                <tr>
                    <td class="font-bold">Kategori : {{ $category->category_name }}

                    </td>
                </tr>


            </table>
            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Tgl</th>
                        <th class="px-4 py-2">Nama Transaksi</th>
                        <th class="px-4 py-2">qty</th>


                    </tr>
                </thead>
                <tbody>
                    @php
                        $grandTotalQty = 0;
                    @endphp
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="border px-4 py-2">{{ $transaction->updated_at->format('d-m-Y') }}</td>

                            <td class="border px-4 py-2">
                                Penimbangan Sampah dari {{ $transaction->user->name }}
                            </td>

                            @if(!$transaction->detailTransactions()->where('category_id', $category->id)->get())
                            <td class="border px-4 py-2">
                                tidak ada transaksi
                            </td>
                            @else
                            <td class="border px-4 py-2">
                                @php
                                    $totalQty = 0;
                                @endphp


                                @foreach ($transaction->detailTransactions()->where('category_id', $category->id)->get() as $detail)
                                    <p>{{ $detail->qty }} {{ $detail->category->uom }}</p>
                                    @php
                                        $totalQty += $detail->qty;
                                    @endphp
                                @endforeach
                                @php
                                    $grandTotalQty += $totalQty;
                                @endphp



                            </td>
                            @endif

                        </tr>
                    @endforeach
                    <tr>


                        <td class=""></td>

                        <th class="border px-4 py-2">Total : </th>
                        <td class="border px-4 py-2">{{ $grandTotalQty }}</td>
                    </tr>
                </tbody>
            </table>
            <h2 class="text-left text-lg font-bold mb-4">Print By : {{ auth()->user()->name }}</h2>
            <h2 class="text-left text-lg font-bold mb-4"> {{ date('d F Y') }}
            </h2>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
