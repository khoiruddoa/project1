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

            <h2 class="text-center text-2xl font-bold mb-4">LAPORAN UPDATE HARGA SAMPAH</h2>
            <table class="mb-4">

                <tr>
                    <td class="font-bold">Periode</td>
                    <td>{{ date('d-m-Y', strtotime($start)) }} s/d {{ date('d-m-Y', strtotime($end)) }}</td>
                </tr>
                
            


            </table>
            <table class="table-auto mb-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">No</th>
                       
                        <th class="px-4 py-2">KATEGORI SAMPAH</th>
                        <th class="px-4 py-2">HARGA BELI</th>
                        <th class="px-4 py-2">HARGA JUAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoryprices as $category)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ preg_replace('/\d+\./', '', $category->category->category_name ?? null) }}</td>
                           
                            
                            <td class="border px-4 py-2">
                               
                                @currency($category->buy)
                              
                            </td>
                            <td class="border px-4 py-2">
                                @currency($category->sell)
                                
                            </td>

                        </tr>
                    @endforeach
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
