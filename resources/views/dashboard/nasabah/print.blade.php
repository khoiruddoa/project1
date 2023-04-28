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

            <h2 class="text-center text-2xl font-bold mb-4">DATA NASABAH</h2>
            <table class="mb-4">

                <tr>
                    <td class="font-bold">Tanggal</td>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</td>
                </tr>
                

            </table>
            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">No HP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <td class="border px-4 py-2">
                                
                        {{$loop->iteration}}
                     </td>
                          
                            <td class="border px-4 py-2">
                                
                                {{$user->name}}
                             </td>
                            <td class="border px-4 py-2">
                                
                                {{$user->phone_number}}
                            </td>

                            </td>
                           

                        </tr>
                    @endforeach
                    

                </tbody>
            </table>
            <h2 class="text-left text-lg font-bold mb-4">Print By : {{ auth()->user()->name }}</h2>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
