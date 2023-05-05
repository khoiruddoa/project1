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

            <h2 class="text-center text-2xl font-bold mb-4">LAPORAN ONGKOS KIRIM</h2>
            <table class="mb-4">

              
                <tr>
                    <td class="font-bold">Periode</td>
                    <td>:</td>
                    <td>{{ date('d-m-Y', strtotime($start)) }}</td>
                    <td>s/d</td>
                    <td>{{ date('d-m-Y', strtotime($end)) }}</td>
                </tr>

            </table>
            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Tgl</th>
                        <th class="px-4 py-2">Nasabah</th>
                        <th class="px-4 py-2">Nominal</th>
                        <th class="px-4 py-2">Petugas</th>
                        <th class="px-4 py-2">Ongkos Kirim</th>


                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $tran)
                        <tr>
                            <td class="border px-4 py-2">{{ $tran->created_at->format('d-m-Y') }}</td>

                            <td class="border px-4 py-2">
                                {{$tran->user->name}}
                               
                            </td>
                            
                            <td class="border px-4 py-2">
                                @currency($tran->pay_total)
                               
                            </td>
                            @php $a = 0; @endphp
                            <td class="border px-4 py-2">
                                @foreach($tran->picks as $item)
                                {{$item->user->name}}
                                @php
                                $a = $item->sum('pay');
                                @endphp
                                <br>

                                @endforeach
                               
                            </td>
                            <td class="border px-4 py-2">
                                @currency($a)
                               
                            </td>

                           
                          
                        </tr>
                    @endforeach
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
