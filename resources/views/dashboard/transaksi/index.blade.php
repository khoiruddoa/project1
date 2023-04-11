@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">
            <h1 class="text-3xl text-black pb-6">Transaksi Nasabah</h1>
        </div>

        <div>

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Tambah Transaksi
            </button>

            <!-- Main modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close</span>
                        </button>

                        <div x-data="{ searchText: '' }" class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Cari Data Nasabah</h3>
                            <div>

                                <div class="flex items-center">
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input type="text" id="simple-search" x-model="searchText"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Search" required>
                                    </div>

                                </div>

                            </div>

                            <div class="w-full mt-6">
                                <div class="overflow-auto max-h-[300px]">
                                    <table class="w-full  bg-white">
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
                                                    x-if="searchText === '' || '{{ strtolower($user->name) }}'.includes(searchText.toLowerCase()) || '{{ $user->phone_number }}'.includes(searchText)">
                                                    <tr>
                                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">
                                                            {{ $user->name }}</td>
                                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">
                                                            {{ $user->phone_number }}</td>
                                                        <td class="sm:text-left py-3 px-4">
                                                            <div>
                                                                <form action="{{ route('transaksi_store') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ $user->id }}">
                                                                    <input type="hidden" name="administrator"
                                                                        value="{{ auth()->user()->name }}">
                                                                    <input type="hidden" name="pay_status" value="0">

                                                                    <button type="submit"
                                                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat
                                                                        Transaksi</button>
                                                                    <div
                                                                        class="text-sm font-medium text-gray-500 dark:text-gray-300">

                                                                    </div>
                                                                </form>


                                                            </div>
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

    <div class="w-full mt-10 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
            <li class="mr-2">
                <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                    aria-selected="true"
                    class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Proses</button>
            </li>
            <li class="mr-2">
                <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                    aria-controls="services" aria-selected="false"
                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Selesai</button>
            </li>
            <li class="mr-2">
                <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab"
                    aria-controls="statistics" aria-selected="false"
                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Disetujui</button>
            </li>
        </ul>
        <div id="defaultTabContent">
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel"
                aria-labelledby="about-tab">
                <div class="w-full mt-6">
                    <div class="overflow-x-auto">

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                           
                            <div class="relative overflow-auto max-h-[500px] shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                Nama Nasabah
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">

                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr class="border-b border-gray-200 dark:border-gray-700">

                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                    {{ $transaction->user->name }}
                                                </th>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                    <div class="flex flex-row gap-1 items-center justify-center">
                                                        <div><a href="{{ route('transaksi_detail', ['id' => $transaction->id]) }}"
                                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>
                                                        </div>
                                                        <div>
                                                            <form
                                                                action="{{ route('finish', ['id' => $transaction->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="pay_status" value="1">
                                                                <button type="submit"
                                                                    onclick="return confirm('Apakah Transaksi sudah benar? Data Tidak bisa diubah setelah anda klik selesai')"
                                                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">Selesai</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel"
                aria-labelledby="services-tab">


                <div class="w-full mt-6">
                    <div class="overflow-x-auto">

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                            <div class="relative overflow-auto max-h-[500px] shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                Nama Nasabah
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">

                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($finish as $transaction)
                                            <tr class="border-b border-gray-200 dark:border-gray-700">

                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                    {{ $transaction->user->name }}
                                                </th>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                    <span
                                                        class="inline-flex items-center bg-green-100 text-green-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                        <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                                        Menunggu Persetujuan
                                                    </span>
                                                    <div class="flex flex-row gap-1 items-center justify-center">
                                                        <div><a href="{{ route('transaksi_detail', ['id' => $transaction->id]) }}"
                                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>
                                                        </div>


                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="statistics" role="tabpanel"
                aria-labelledby="statistics-tab">
                <div class="w-full mt-6">
                    <div class="overflow-x-auto">

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                            <div class="relative overflow-auto max-h-[500px] shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                Nama Nasabah
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">

                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($approved as $transaction)
                                            <tr class="border-b border-gray-200 dark:border-gray-700">

                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                    {{ $transaction->user->name }}
                                                </th>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                    <span
                                                        class="inline-flex items-center bg-green-100 text-green-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                        <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                                        Selesai
                                                    </span>
                                                    <div class="flex flex-row gap-1 items-center justify-center">
                                                        <div><a href="{{ route('transaksi_detail', ['id' => $transaction->id]) }}"
                                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>
                                                        </div>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        @endsection
