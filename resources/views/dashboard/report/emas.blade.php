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

            <h2 class="text-center text-2xl font-bold mb-4">LAPORAN PEROLEHAN EMAS</h2>
            <table class="mb-4">

                <tr>
                    <td class="font-bold">Per Tanggal</td>
                    <td>:</td>
                    <td></td>
                </tr>
                

            </table>
            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Tgl</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Total Perolehan Emas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                            <td class="border px-4 py-2">{{ $user->updated_at->format('d-m-Y') }}</td>
                            <td class="border px-4 py-2">
                                
                                {{$user->name}}
                             </td>

                            <td class="border px-4 py-2">
                                
                               {{$user->convertions->sum('information')}} Gram
                            </td>

                            </td>
                           
                                

                        </tr>
                    @endforeach
                    

                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
