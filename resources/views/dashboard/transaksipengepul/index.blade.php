@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">
            <h1 class="text-3xl text-black pb-6">Transaksi Pengepul</h1>
        </div>

        <div>

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modalPengepul" data-modal-toggle="authentication-modalPengepul"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Tambah Transaksi Pengepul
            </button>

            <!-- Main modal -->
            <div id="authentication-modalPengepul" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
                            data-modal-hide="authentication-modalPengepul">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close</span>
                        </button>
                        <div x-data="{ searchText: '' }" class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Cari Data Pengepul</h3>
                            <div>
                                <input type="text" id="simple-search" x-model="searchText"
                                    class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search">


                            </div>

                            <div class="w-full mt-6">
                                <div class="overflow-x-auto">
                                    <table class="w-full bg-white">
                                        <thead class="bg-sidebar text-white w-full">
                                            <tr>
                                                <th
                                                    class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                    Nama</th>
                                                <th
                                                    class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                    No.HP</th>
                                                <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-700">
                                            @foreach ($users as $user)
                                                <template
                                                    x-if="searchText === '' || '{{ strtolower($user->name) }}'.includes(searchText.toLowerCase())">

                                                    <tr>
                                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $user->name }}
                                                        </td>
                                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">
                                                            {{ $user->phone_number }}</td>
                                                        <td class="sm:text-left py-3 px-4">

                                                            <form action="{{ route('transaksipengepul_store') }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="flex flex-col gap-1">
                                                                    <div>
                                                                        <input type="date" name="created_at"
                                                                            value="{{ date('Y-m-d') }}">
                                                                    </div>
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ $user->id }}">
                                                                    <input type="hidden" name="administrator"
                                                                        value="{{ auth()->user()->name }}">
                                                                    <input type="hidden" name="pay_status" value="0">


                                                                    <div
                                                                        class="text-sm font-medium text-gray-500 dark:text-gray-300">

                                                                        <button type="submit"
                                                                            onclick="this.disabled=true; this.form.submit();"
                                                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat
                                                                            Transaksi Pengepul</button>
                                                                    </div>
                                                                </div>
                                                            </form>



                                                        </td>
                                                    </tr>
                                                </template>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>

    </div>

    <div class="w-full mt-6">
        <div class="overflow-x-auto">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-sidebar">
                                    Tanggal
                                </th>

                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-sidebar">
                                    Nama Pengepul
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-sidebar">
                                    Jumlah

                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-sidebar">
                                    Total Bayar

                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-sidebar">
                                    Status

                                </th>

                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-sidebar">
                                    Detail

                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-sidebar">


                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-sidebar">

                                </th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collectortransactions as $transaction)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-sidebar">

                                        {{ date('d-m-Y', strtotime($transaction->created_at)) }}
                                    </th>

                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-sidebar">
                                        {{ $transaction->user->name }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-sidebar">
                                        @currency($transaction->pay_total)
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-sidebar">
                                        @currency($transaction->payments->sum('pay_total'))
                                    </th>

                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-sidebar">

                                        @if ($transaction->pay_status == 0)
                                            <span
                                                class="inline-flex items-center bg-yellow-100 text-yellow-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                                <span class="w-2 h-2 mr-1 bg-yellow-500 rounded-full"></span>
                                                Proses
                                            </span>
                                        @elseif($transaction->pay_status == 2)
                                            <span
                                                class="inline-flex items-center bg-green-100 text-green-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                                Selesai penimbangan
                                            </span>
                                            {{-- @elseif($transaction->pay_status == 2)
                            <span
                            class="inline-flex items-center bg-green-200 text-green-900 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                            <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                            Disetujui
                        </span> --}}
                                        @elseif($transaction->pay_status == 3)
                                            <span
                                                class="inline-flex items-center bg-blue-200 text-blue-900 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                                <span class="w-2 h-2 mr-1 bg-blue-500 rounded-full"></span>
                                                @if ($transaction->pay_total == $transaction->payments->sum('pay_total'))
                                                    Lunas
                                                @endif
                                                @if ($transaction->pay_total > $transaction->payments->sum('pay_total'))
                                                    Kurang Bayar @currency($transaction->pay_total - $transaction->payments->sum('pay_total'))
                                                @endif
                                                @if ($transaction->pay_total < $transaction->payments->sum('pay_total'))
                                                    Lebih Bayar @currency($transaction->payments->sum('pay_total') - $transaction->pay_total)
                                                @endif
                                            </span>
                                        @endif
                                    </th>
                                    <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-sidebar">
                                @foreach($transaction->payments as $payment)
                                <br>
                                {{ date('d-m-Y', strtotime($payment->created_at)) }} 
                                <br> {{$payment->information}} @currency($payment->pay_total) 
                                
                                @endforeach
                                
                                
                                </th>

                                    <th scope="row"
                                        class="flex flex-col gap-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-sidebar">
                                        @if ($transaction->pay_status == 0)
                                            <a href="{{ route('transaksipengepul_detail', ['id' => $transaction->id]) }}"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail
                                                Transaksi</a>
                                        @else
                                            {{-- <div>
                                                <form action="{{ route('finishpengepul', ['id' => $transaction->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="pay_status" value="3">
                                                    <input type="hidden" name="administrator"
                                                        value="{{ auth()->user()->name }}">

                                                    <button type="submit"
                                                        onclick="this.disabled=true; this.form.submit();"
                                                        onclick="return confirm('Apakah Transaksi sudah dibayar? Data Tidak bisa diubah setelah anda klik selesai')"
                                                        class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">Sudah
                                                        dibayar?</button>
                                                </form>
                                            </div> --}}


                                            <!-- Modal toggle -->
                                            <button data-modal-target="authentication-modal{{ $transaction->id }}"
                                                data-modal-toggle="authentication-modal{{ $transaction->id }}"
                                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">
                                                Pembayaran
                                            </button>
                                            <!-- Main modal -->
                                            <div id="authentication-modal{{ $transaction->id }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                                <div class="relative w-full h-full max-w-md md:h-auto">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button"
                                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
                                                            data-modal-hide="authentication-modal{{ $transaction->id }}">
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
                                                                Masukkan Nominal Pembayaran
                                                            </h3>
                                                            <form class="space-y-6"
                                                                action="{{ route('paymentpengepul') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="collector_transaction_id"
                                                                    value="{{ $transaction->id }}">

                                                                <div>
                                                                    <input type="date" name="created_at"
                                                                        value="{{ date('Y-m-d') }}">
                                                                </div>

                                                                <div class="flex flex-row gap-2">
                                                                    <div>
                                                                        <label for="qty"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                                                                    </div>
                                                                    <div x-data="{ number: null }">
                                                                        <input type="text" name="pay_total"
                                                                            x-model="number"
                                                                            x-on:input="
                                         number = $event.target.value.replace(/[^0-9]/g, '');
                                       "
                                                                            x-on:blur="
                                         $event.target.value = parseInt(number).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
                                       "
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                            required>
                                                                    </div>
                                                                    <div>
                                                                        <div>


                                                                            <select id="information" name="information"
                                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                                                <option value="tunai">Tunai
                                                                                </option>
                                                                                <option value="transfer">Transfer
                                                                                </option>

                                                                            </select>
                                                                        </div>


                                                                    </div>
                                                                </div>


                                                                <button type="submit"
                                                                    onclick="return confirm('Apakah Nominal Pembayaran yang anda masukkan sudah benar? Data Tidak bisa diubah setelah anda klik simpan')"
                                                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                                                <div
                                                                    class="text-sm font-medium text-gray-500 dark:text-gray-300">

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div>
                                            <a href="{{ route('print_transaction_collector', ['id' => $transaction->id]) }}"
                                                target="blank"
                                                class="block w-40 md:w-full focus:outline-none text-white text-center bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-orange-600 dark:ho ver:bg-orange-700 dark:focus:ring-orange-900 mb-2">Print</a>
                                        </div>
                                    </th>

                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-sidebar">
                                        
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    </div>
@endsection
