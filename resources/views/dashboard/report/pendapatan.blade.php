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

            <h2 class="text-center text-2xl font-bold mb-4">LAPORAN PENDAPATAN TAHUN {{ $tahun }}</h2>

            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Bulan</th>
                        <th class="px-4 py-2">Pendapatan</th>
                        <th class="px-4 py-2">Jumlah</th>
                        <th class="px-4 py-2">Profit</th>
                        <th class="px-4 py-2">Persentase</th>
                    </tr>
                </thead>
                
                @for ($i = 1; $i <= 12; $i++)
                @if ($monthdata[$i] > 0)
                    <tr>
                        <td class="border px-4 py-2">
                            @switch($i)
                                @case(1)
                                    Januari
                                    @break
                                @case(2)
                                    Februari
                                    @break
                                @case(3)
                                    Maret
                                    @break
                                @case(4)
                                    April
                                    @break
                                @case(5)
                                    Mei
                                    @break
                                @case(6)
                                    Juni
                                    @break
                                @case(7)
                                    Juli
                                    @break
                                @case(8)
                                    Agustus
                                    @break
                                @case(9)
                                    September
                                    @break
                                @case(10)
                                    Oktober
                                    @break
                                @case(11)
                                    November
                                    @break
                                @case(12)
                                    Desember
                                    @break
                            @endswitch
                        </td>
                        <td class="border px-4 py-2">Setor Sampah</td>
                        <td class="border px-4 py-2">@currency($sampahdata[$i])</td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2">Jelantah</td>
                        <td class="border px-4 py-2">@currency($jelantahdata[$i])</td>
                        <td class="border px-4 py-2"></td>
                        <td class="border px-4 py-2"></td>
                    </tr>
                    <tr>
                        <td class=""></td>
                        <th class="border px-4 py-2">Total Pendapatan</th>
                        <td class="border px-4 py-2">@currency($jelantahdata[$i] + $sampahdata[$i])</td>
                        <td class="border px-4 py-2">@currency($profitdata[$i])</td>
                        <td class="border px-4 py-2">{{number_format($profitdata[$i]/($monthdata[$i]/100), 2, '.', '')}} %</td>
                    </tr>
                @endif
            @endfor
            
                    <tr>

                        <td class=""></td>
                       
                        <th class="border px-4 py-2">Grand Total Pendapatan</th>
                        <td class="border px-4 py-2">@currency(collect($monthdata)->sum())</td>
                        <td class="border px-4 py-2">@currency(collect($profitdata)->sum())</td>
                        <td class="border px-4 py-2">{{number_format(collect($profitdata)->sum()/(collect($monthdata)->sum()/100), 2, '.', '')}} %</td>
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
