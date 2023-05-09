@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col gap-4">

        <div class="">
            <h1 class="text-3xl text-black pb-6">Detail Transaksi</h1>

        </div>
        <div class="flex md:flex-row flex-col gap-4">
            @if ($transaction->pay_status == 0)
                <div>
                    <a href="{{ route('transaksi_delete', ['id' => $transaction->id]) }}"
                        onclick="return confirm('Apa Anda Yakin Ingin Menghapus data ini?')"
                        class="block w-40 md:w-full focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-red-600 dark:ho ver:bg-red-700 dark:focus:ring-red-900">Hapus
                        Transaksi</a>
                </div>
                <div>

                    <!-- Modal toggle -->
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Tambah Item
                    </button>

                    <!-- Main modal -->
                    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover "bg-sidebar
                                    dark:hover:text-white" data-modal-hide="authentication-modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan Transaksi
                                    </h3>
                                    <form class="space-y-6" action="{{ route('store_detail') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="date" value="{{ $transaction->created_at }}">
                                        <div>
                                            <div x-data="{ searchText: '' }">
                                                <label for="category"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                                <input type="text" id="simple-search" x-model="searchText"
                                                    class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Search">

                                                <select id="category" name="category_id"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @foreach ($categories as $category)
                                                        <template
                                                            x-if="searchText === '' || '{{ strtolower($category->category_name) }}'.includes(searchText.toLowerCase())">
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->category_name }} ({{ $category->uom }})
                                                            </option>
                                                        </template>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>
                                        <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                        <div class="flex flex-row gap-2">
                                            <div>
                                                <label for="qty"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                                                <input type="number" name="qty" id="qty" step="0.01"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                    required>
                                            </div>

                                        </div>


                                        <button type="submit" onclick="this.disabled=true; this.form.submit();"
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

                    <!-- Modal toggle -->
                    <button data-modal-target="authentication-modal2" data-modal-toggle="authentication-modal2"
                        class="block text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Jasa Angkut
                    </button>

                    <!-- Main modal -->
                    <div id="authentication-modal2" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 max-h-screen overflow-y-scroll">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover "bg-sidebar
                                    dark:hover:text-white" data-modal-hide="authentication-modal2">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan Penjemput
                                    </h3>
                                    <form class="space-y-6" action="{{ route('store_pick') }}" method="POST">
                                        @csrf
                                        <div>
                                            <div>
                                                <label for="category"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Petugas</label>
                                                <select id="user" name="user_id"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>
                                        <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                        <input type="hidden" name="created_at" value="{{ $transaction->created_at }}">

                                        <button type="submit" onclick="this.disabled=true; this.form.submit();"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                    </form>
                                </div>
                                <div class="px-6 py-1 lg:px-8">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th></th>
                                                <th></th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($picks as $pick)
                                                <tr>
                                                    <td>{{ $pick->user->name }}</td>
                                                    <td>-</td>
                                                    <td><a href="{{ route('delete_pick', ['id' => $pick->id]) }}"
                                                            class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div x-data="{ allChecked: false }" class="max-h-48 overflow-y-scroll px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan item yang dibawa</h3>
                                    <form action="{{ route('detail_pick') }}" method="post">
                                        @csrf
                                        <div class="flex flex-row items-center justify-center gap-2 text-sm">
                                            <div class="mb-2 border border-gray-300 p-2 rounded-lg flex items-center bg-[#15C972] hover:bg-[#016b38]">
                                                <input type="checkbox" class="form-checkbox h-4 w-4 text-green-500" x-model="allChecked" x-on:click="allChecked ? uncheckAll() : checkAll()">
                                                <div class="ml-2 font-mono">
                                                    Pilih Semua
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">Simpan</button>
                                            </div>
                                        </div>
                                        @foreach ($detail_transactions as $index => $item)
                                        @if (!in_array($item->category_id, $detail_pick->pluck('category_id')->toArray()))
                                            
                                                <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                                <input type="hidden" name="created_at" value="{{ $transaction->created_at }}">
                                                <div class="border border-gray-300 p-2 rounded-lg flex items-center mb-2 bg-[#15C972] hover:bg-[#016b38]">
                                                    <input type="checkbox" name="category_id[]" value="{{ $item->category_id }}" class="form-checkbox h-4 w-4 text-green-500" x-model="checkedItems[{{ $index }}]">
                                                    <div>
                                                        <div class="ml-2 font-mono">
                                                            {{ preg_replace('/\d+\./', '', $item->category->category_name) }}
                                                        </div>
                                                    </div>
                                                </div>

                                        @endif
                                        @endforeach
                                    </form>
                                </div>
                                
                                <script>
                                    const checkedItems = @json(array_fill(0, count($categories), false));
                                    const inputs = document.querySelectorAll('.form-checkbox');
                                    const submitBtn = document.querySelector('button[type="submit"]');

                                    inputs.forEach(input => {
                                        input.addEventListener('input', () => {
                                            const hasValue = Array.from(inputs).some(input => input.value);
                                            submitBtn.disabled = !hasValue;
                                        });
                                    });

                                    function checkAll() {
                                        checkedItems.forEach((item, i) => {
                                            checkedItems[i] = true;
                                        });
                                    }

                                    function uncheckAll() {
                                        checkedItems.forEach((item, i) => {
                                            checkedItems[i] = false;
                                        });
                                    }
                                </script>
                                 <div class="px-6 py-3 lg:px-8">
                                    <h3 class="my-4 text-xl font-medium text-gray-900 dark:text-white">Item yang dibawa</h3>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Nama Item</th>
                                                <th></th>
                                                <th></th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($detail_pick as $pick)
                                                <tr>
                                                    <td>{{ preg_replace('/\d+\./', '', $pick->category->category_name) }}</td>
                                                    <td>-</td>
                                                    <td><a href="{{ route('deletedetail_pick', ['id' => $pick->id]) }}"
                                                            class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div>
                    <form action="{{ route('finish', ['id' => $transaction->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="pay_status" value="1">
                        <button type="submit" onclick="this.disabled=true; this.form.submit();"
                            onclick="return confirm('Apakah Transaksi sudah benar? Data Tidak bisa diubah setelah anda klik selesai')"
                            class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">Selesai</button>
                    </form>
                </div>
            @endif

            @if ($transaction->pay_status == 1 || $transaction->pay_status == 2)
                <div>
                    <a href="#"
                        class="block w-40 md:w-full focus:outline-none text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-orange-600 dark:ho ver:bg-orange-700 dark:focus:ring-orange-900 mb-2">Print</a>
                </div>
            @endif
        </div>

    </div>


    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark bg-sidebar dark:border-gray-700">
        <div class="flex flex-row justify-between">
            <div>
                <h5 class="mb-2 text-xl font-semibold text-gray-900">
                    {{ $transaction->user->name }}</h5>
                <h5 class="mb-2 text-xl font-semibold text-gray-900">
                    {{ date('d-m-Y', strtotime($transaction->created_at)) }}
                </h5>

            </div>

            <div class="mr-8 ">
                @if (count($picks) > 0)
                    <h5 class="mb-2 text-md font-semibold text-gray-900">
                        Ongkos Angkut :</h5>
                    @foreach ($picks as $pick)
                        <h5 class="mb-2 text-sm font-semibold text-gray-900">

                            {{ $pick->user->name }} - @currency($pick->pay)
                        </h5>
                    @endforeach
                    <h5 class="mb-2 text-sm font-semibold text-gray-900">
                        Total Ongkos: @currency($picks->sum('pay'))</h5>
                @endif


                <h5 class="mb-2 text-md font-semibold text-gray-900">
                    Saldo :</h5>
                <h5 class="mb-2 text-lg font-semibold text-gray-900">
                    @currency($transaction->pay_total)</h5>


            </div>
        </div>





        <div class="w-full mt-6">
            <div class="overflow-auto max-h-[300px]">
                <table class="w-full bg-white ">
                    <thead class="bg-sidebar text-white w-full">
                        <tr>

                            <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold md:text-sm text-xs">
                                Kategori</th>
                            <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold md:text-sm text-xs">
                                QTY</th>
                            <th class="sm:text-left py-3 px-4 uppercase font-semibold md:text-sm text-xs">Harga beli</th>
                            <th class="sm:text-left py-3 px-4 uppercase font-semibold md:text-sm text-xs">Harga Jual</th>
                            <th class="sm:text-left py-3 px-4 uppercase font-semibold md:text-sm text-xs">Jumlah</th>
                            <th class="sm:text-left py-3 px-4 uppercase font-semibold md:text-sm text-xs">Jumlah jual</th>
                            <th class="sm:text-left py-3 px-4 uppercase font-semibold md:text-sm text-xs"></th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @php
                            $total = 0;
                            $total1 = 0;
                        @endphp
                        @foreach ($detail_transactions as $item)
                            <tr>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs">
                                    {{ preg_replace('/\d+\./', '', $item->category->category_name) }}</td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs">
                                    {{ number_format($item->qty, 2, ',', '.') }}
                                    {{ $item->category->uom }}</td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs">@currency($item->price)</td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs">@currency($item->sell)</td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs">@currency($item->price * $item->qty)</td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs">@currency($item->sell * $item->qty)</td>
                                @if ($transaction->pay_status == 0)
                                    <td class="sm:text-left py-3 px-4 md:text-sm text-xs">

                                        <a href="{{ route('delete_detail', ['id' => $item->id]) }}"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Hapus</a>
                                    </td>
                                @else
                                    <td class="sm:text-left py-3 px-4 md:text-sm text-xs">

                                        <div>

                                            <!-- Modal toggle -->
                                            <button data-modal-target="authentication-modalcancel{{ $item->id }}"
                                                data-modal-toggle="authentication-modalcancel{{ $item->id }}"
                                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">
                                                Batal
                                            </button>

                                            <!-- Main modal -->
                                            <div id="authentication-modalcancel{{ $item->id }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                                <div class="relative w-full h-full max-w-md md:h-auto">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg">
                                                        <button type="button"
                                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
                                                            data-modal-hide="authentication-modalcancel{{ $item->id }}">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        <div class="px-6 py-6 lg:px-8">
                                                            <h3
                                                                class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                            </h3>
                                                            <form class="space-y-6"
                                                                action="{{ route('cancel_detail', ['id' => $item->id]) }}"
                                                                method="POST">
                                                                @csrf

                                                                <div>
                                                                    <label for="name"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">Alasan
                                                                        Pembatalan</label>
                                                                    <input type="text" name="information"
                                                                        id="information"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                        required>
                                                                </div>

                                                                <input type="hidden" name="created_at"
                                                                    value="{{ $item->created_at }}">
                                                                <input type="hidden" name="transaction_id"
                                                                    value="{{ $item->transaction_id }}">
                                                                <input type="hidden" name="category_id"
                                                                    value="{{ $item->category_id }}">
                                                                <input type="hidden" name="price"
                                                                    value="{{ $item->price }}">
                                                                <input type="hidden" name="sell"
                                                                    value="{{ $item->sell }}">
                                                                <input type="hidden" name="qty"
                                                                    value="{{ $item->qty }}">














                                                                <button type="submit"
                                                                    onclick="this.disabled=true; this.form.submit();"
                                                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Batalkan</button>
                                                                <div
                                                                    class="text-sm font-medium text-gray-500 dark:text-gray-300">

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                @endif
                            </tr>
                            @php
                                $total += $item->price * $item->qty;
                                $total1 += $item->sell * $item->qty; // tambahkan nilai baru ke total
                            @endphp
                        @endforeach
                        <tr>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs"></td>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs"></td>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs font-extrabold">Total Beli
                            </td>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs">@currency($total)</td>
                            <td class="sm:text-left py-3 px-4 md:text-sm text-xs">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs"></td>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs"></td>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs font-extrabold">Total Jual
                            </td>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs">@currency($total1)</td>
                            <td class="sm:text-left py-3 px-4 md:text-sm text-xs">
                            </td>
                        </tr>
                        @foreach ($cancel_transactions as $item)
                            <tr>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs">
                                    {{ preg_replace('/\d+\./', '', $item->category->category_name) }}</td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs">
                                    {{ number_format($item->qty, 3, ',', '.') }}
                                    {{ $item->category->uom }}</td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs">BATAL</td>

                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs"></td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs"></td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs"></td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4 md:text-sm text-xs"></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>





    </div>
@endsection
