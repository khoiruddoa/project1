<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">



    <div class="container mx-auto p-4">
        <div class="table-responsive lg:w-3/4 mx-auto">
            <br>

            <h2 class="text-center text-2xl font-bold mb-4">LAPORAN PENYELARASAN SALDO</h2>
            <table class="mb-4">

                <tr>
                    <td class="font-bold">Periode :</td>
                    <td>{{ date('d-m-Y', strtotime($start)) }} s/d {{ date('d-m-Y', strtotime($end)) }}</td>
                </tr>



            </table>
            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Tgl</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Keterangan</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($adjustments as $adjustment)
                        <tr>
                            <td class="border px-4 py-2">{{ $adjustment->created_at->format('d-m-Y') }}</td>

                            <td class="border px-4 py-2">

                                {{ $adjustment->user->name }}

                            </td>
                            <td class="border px-4 py-2">

                                @currency($adjustment->pay_total)


                            </td>
                            <td class="border px-4 py-2">

                                {{ $adjustment->information }}


                            </td>




                        </tr>
                    @endforeach
                    <tr>

                        <td class=""></td>


                        <th class="border px-4 py-2">Total</th>
                        <td class="border px-4 py-2"> @currency($adjustments->sum('pay_total'))
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
