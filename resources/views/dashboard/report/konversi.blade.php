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
                    <td class="font-bold">Periode :</td>
                    <td>{{ date('d-m-Y', strtotime($start)) }} s/d {{ date('d-m-Y', strtotime($end)) }}</td>
                </tr>
               


            </table>
            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Tgl</th>
                        <th class="px-4 py-2">Nama Transaksi</th>
                        <th class="px-4 py-2">Harga Jual</th>
                        <th class="px-4 py-2">Harga Beli</th>
                        <th class="px-4 py-2">keuntungan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($convertions as $convertion)
                        <tr>
                            <td class="border px-4 py-2">{{ $convertion->updated_at->format('d-m-Y') }}</td>

                            <td class="border px-4 py-2">
                               
                                    Konversi Emas dari {{$convertion->user->name}} Senilai
                               
                            </td>
                            <td class="border px-4 py-2">
                                
                                    @currency($convertion->pay_total)
                        
                              
                            </td>

                            </td>
                            <td class="border px-4 py-2">
                              
                                    @currency($convertion->buy)
                               
                            </td>
                            <td class="border px-4 py-2">
                                
                                @currency($convertion->profit)
                    
                          
                        </td>


                        </tr>
                    @endforeach
                    <tr>

                        <td class=""></td>
                        <td class=""></td>

                        <td class=""></td>

                        <th class="border px-4 py-2">Total</th>
                        <td class="border px-4 py-2"> @currency($convertion->sum('profit'))
                        </td>
                    </tr>

                </tbody>
            </table>
            <h2 class="text-left text-lg font-bold mb-4">Print By : {{ auth()->user()->name }}</h2>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
