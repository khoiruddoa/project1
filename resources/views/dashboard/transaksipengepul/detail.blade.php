@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-row gap-4">
        <div class="">
            <h1 class="text-3xl text-black pb-6">Detail Transaksi</h1>

        </div>
        <div>
            <a href="{{route('transaksipengepul_delete',['id' => $transaction->id])}}" onclick="return confirm('Apa Anda Yakin Ingin Menghapus data ini?')"
                class="block focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-red-600 dark:ho ver:bg-red-700 dark:focus:ring-red-900">Hapus
                Transaksi</a>
        </div>


        <div>

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Tambah Item Kategori
            </button>

            <!-- Main modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan Transaksi</h3>
                            <form class="space-y-6" action="{{route('storepengepul_detail')}}" method="POST">
                                @csrf
                                <div>
                                    <div>
                                        <label for="category"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                        <select id="category" name="category_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @foreach ($categories as $category)

                                            @if(($category->detailTransactions->sum('qty')-$category->detailCollectorTransactions->sum('qty')) > 0)
                                                <option value="{{ $category->id }}">{{ $category->category_name }} (Stock : {{$category->detailTransactions->sum('qty')}} {{ $category->uom }})</option>
                                            
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="collector_transaction_id" value="{{$transaction->id}}">
                                <div class="flex flex-row gap-2">
                                <div>
                                    <label for="qty"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                                    <input type="number" name="qty" id="qty" step="0.01"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                </div>
                                <div>
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                        Jual</label>
                                        <div x-data="{ number: null }">
                                            <input type="text" name="price" x-model="number" x-on:input="number = parseFloat($event.target.value)" x-on:blur="$event.target.value = number.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})"
                                    
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                    </div>
                                          
                                </div>
                            </div>



                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div>
            <form action="{{route('finishpengepul',['id' => $transaction->id])}}" method="post">
             @csrf
             <input type="hidden" name="pay_status" value="1">
                     <button type="submit" onclick="return confirm('Apakah Transaksi sudah benar? Data Tidak bisa diubah setelah anda klik selesai')" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">Selesai</button>
                 </form></div>

    </div>


    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-sidebar dark:border-gray-700">

        <a href="#">
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                {{ $transaction->user->name }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"></p>
        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"></p>




        <div class="w-full mt-6">
            <div class="overflow-x-auto">
                <table class="w-full bg-white">
                    <thead class="bg-sidebar text-white w-full">
                        <tr>
                            <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                Kategori</th>
                            <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                QTY</th>
                            <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Harga</th>
                            <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Jumlah</th>
                            <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm"></th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @php
$total = 0; 
@endphp
@foreach($detail_transactions as $item)
                        <tr>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{$item->category->category_name}}</td>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{$item->qty}} {{$item->category->uom}}</td>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($item->price)</td>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($item->price * $item->qty)</td>
                            <td class="sm:text-left py-3 px-4">
                                
                                <a href="{{route('deletepengepul_detail',['id' => $item->id])}}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Hapus</a>
                            </td>
                        </tr>
                        @php
    $total += $item->price * $item->qty; // tambahkan nilai baru ke total
    @endphp
@endforeach
<tr>
    <td class="w-1/3 sm:w-auto text-left py-3 px-4"></td>
    <td class="w-1/3 sm:w-auto text-left py-3 px-4"></td>
    <td class="w-1/3 sm:w-auto text-left py-3 px-4 font-extrabold">Total</td>
    <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($total)</td>
    <td class="sm:text-left py-3 px-4">
    </td>
</tr>
                    </tbody>
                </table>
            </div>


        </div>





    </div>
@endsection
