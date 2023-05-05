@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">
            <h1 class="text-3xl text-black pb-6">Tabel Konversi</h1>
            <div class="m-4">

            </div>

        </div>



        <div class="flex flex-row gap-2">


            <div>

                <!-- Modal toggle -->
                <button data-modal-target="authentication-modalupdate" data-modal-toggle="authentication-modalupdate"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Update Harga
                </button>

                <!-- Main modal -->
                <div id="authentication-modalupdate" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                    <div class="relative w-full h-full max-w-md md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
                                data-modal-hide="authentication-modalupdate">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Harga Emas</h3>




                                <form action="{{ route('updateemas') }}" method="POST">
                                    @csrf

                                    <div class="md:max-h-80 overflow-y-scroll">
                                        <table class="w-full  bg-white">
                                            <thead class="bg-sidebar text-white w-full">
                                                <tr>
                                                    <th
                                                        class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                        Varian</th>
                                                    <th
                                                        class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                        Berat</th>

                                                    <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Harga
                                                        Jual</th>
                                                    <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Harga
                                                        Beli</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-700">
                                                @foreach ($goldweights as $gold)
                                                    <input type="hidden" name="id[]" value="{{ $gold->id }}">
                                                    <tr>
                                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">
                                                            {{ $gold->information }}</td>
                                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $gold->gram }}
                                                            Gram</td>
                                                        <td class="sm:text-left py-3 px-4">
                                                            <div x-data="{ number: null }">
                                                                <label for="name"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                                    Jual</label>

                                                                <input type="text" name="price[]" x-model="number"
                                                                    x-on:input=" number = $event.target.value.replace(/[^0-9]/g, '');
                    "
                                                                    x-on:blur=" $event.target.value = parseInt(number).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
                    "
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                    required>
                                                            </div>


                                                        </td>
                                                        <td class="sm:text-left py-3 px-4">
                                                            <div x-data="{ number: null }">
                                                                <label for="name"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                                    Beli</label>

                                                                <input type="text" name="buy[]" x-model="number"
                                                                    x-on:input=" number = $event.target.value.replace(/[^0-9]/g, '');
                    "
                                                                    x-on:blur=" $event.target.value = parseInt(number).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
                    "
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                    required>
                                                            </div>


                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                                        Harga</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <!-- Modal toggle -->
            <button data-modal-target="authentication-modalshow" data-modal-toggle="authentication-modalshow"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Lihat item emas
            </button>

            <!-- Main modal -->
            <div id="authentication-modalshow" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="authentication-modalshow">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Data Harga Emas</h3>
                            <table class="w-full  bg-white">
                                <thead class="bg-sidebar text-white w-full">
                                    <tr>
                                        <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                            Varian</th>

                                        <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                            Berat</th>

                                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Harga Jual</th>
                                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Harga Beli</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach ($goldweights as $goldweight)
                                        <tr>
                                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $goldweight->information }}
                                            </td>
                                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $goldweight->gram }} Gram
                                            </td>
                                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($goldweight->price)</td>
                                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($goldweight->buy)</td>



                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modalTambah" data-modal-toggle="authentication-modalTambah"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Tambah item emas
            </button>

            <!-- Main modal -->
            <div id="authentication-modalTambah" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
                            data-modal-hide="authentication-modalTambah">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan item emas</h3>
                            <form class="space-y-6" action="{{ route('tambahemas') }}" method="POST">
                                @csrf

                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat(gram)</label>
                                    <input type="number" name="gram" id="qty" step="0.01"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                </div>
                                <div x-data="{ number: null }">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                        Jual</label>

                                    <input type="text" name="price" x-model="number"
                                        x-on:input=" number = $event.target.value.replace(/[^0-9]/g, '');
"
                                        x-on:blur=" $event.target.value = parseInt(number).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                </div>
                                <div x-data="{ number: null }">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                        Beli</label>

                                    <input type="text" name="buy" x-model="number"
                                        x-on:input=" number = $event.target.value.replace(/[^0-9]/g, '');
"
                                        x-on:blur=" $event.target.value = parseInt(number).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                </div>
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Varian</label>
                                    <input type="text" name="information"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                </div>



                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Input</button>
                                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full mt-10 bg-white border border-gray-200 rounded-lg shadow dark:bg-sidebar dark:border-gray-700">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-sidebar"
            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
            <li class="mr-2">
                <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                    aria-selected="true"
                    class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-sidebar dark:hover:bg-gray-700 dark:text-blue-500">Pengajuan</button>
            </li>
            <li class="mr-2">
                <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                    aria-controls="services" aria-selected="false"
                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Disetujui</button>
            </li>
            <li class="mr-2">
                <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab"
                    aria-controls="statistics" aria-selected="false"
                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Berhasil</button>
            </li>
        </ul>
        <div id="defaultTabContent">
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-sidebar" id="about" role="tabpanel"
                aria-labelledby="about-tab">
                <div class="w-full mt-6">
                    <div>

                        <!-- Modal toggle -->
                        <button data-modal-target="authentication-modalconvertions"
                            data-modal-toggle="authentication-modalconvertions"
                            class="mb-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Konversi
                        </button>

                        <!-- Main modal -->
                        <div id="authentication-modalconvertions" tabindex="-1"
                            aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
                                        data-modal-hide="authentication-modalconvertions">
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
                                            action="{{ route('konversiemas') }}" method="POST">
                                            @csrf

                                            <div>
                                                <label for="created_at"
                                                    class="block mb-2 text-sm font-medium text-gray-900">Tanggal Konversi</label>
                                                <input type="date" name="created_at" value="{{ date('Y-m-d') }}"
                                                    id="created_at"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    required>
                                            </div>

                                            














                                            <button type="submit"
                                                onclick="this.disabled=true; this.form.submit();"
                                                class=" text-white bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Konversi Emas</button>
                                            <div
                                                class="text-sm font-medium text-gray-500 dark:text-gray-300">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <div>
                        <form action="{{ route('konversiemas') }}" method="POST">
                            @csrf


                            <button type="submit" onclick="this.disabled=true; this.form.submit();"
                                class=" text-white bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Konversi
                                Emas</button>
                        </form>
                    </div> --}}
                    <div class="overflow-x-auto">
                        <table class="w-full bg-white">
                            <thead class="bg-sidebar text-white w-full">
                                <tr>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal
                                    </th>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Nama
                                    </th>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Saldo
                                    </th>
                                    <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Status Transaksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($convertions as $convertion)
                                    <tr>
                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ date('d-m-Y', strtotime($convertion->created_at)) }}</td>
                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $convertion->user->name }}</td>
                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($convertion->pay_total)</td>
                                        <td class="sm:text-left py-3 px-4">
                    </div>
                    <span
                        class="inline-flex items-center bg-green-100 text-green-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                        <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                        Menunggu Persetujuan
                    </span>
                </div>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>


        </div>
    </div>
    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-sidebar" id="services" role="tabpanel"
        aria-labelledby="services-tab">
        <div class="w-full mt-6">
            <div class="overflow-x-auto">
                <table class="w-full bg-white">
                    <thead class="bg-sidebar text-white w-full">
                        <tr>
                            <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Nama
                            </th>
                            <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Saldo
                            </th>
                            <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Status Transaksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($approves as $convertion)
                            <tr>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $convertion->user->name }}</td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($convertion->pay_total)</td>
                                <td class="sm:text-left py-3 px-4">
                                    <div class="flex flex-row items-center">
                                        <div>
                                            <span
                                                class="inline-flex items-center bg-blue-100 text-green-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                <span class="w-2 h-2 mr-1 bg-blue-500 rounded-full"></span>
                                                Disetujui
                                            </span>
                                        </div>

                                        <!-- Modal toggle -->
                                        <button data-modal-target="authentication-modalbayar{{$convertion->id}}"
                                            data-modal-toggle="authentication-modalbayar{{$convertion->id}}"
                                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button">
                                            Bayar
                                        </button>

                                        <!-- Main modal -->
                                        <div id="authentication-modalbayar{{$convertion->id}}" tabindex="-1" aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
                                                        data-modal-hide="authentication-modalbayar{{$convertion->id}}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                            Saldo Nasabah : @currency($convertion->pay_total - $convertion->detailConvertions->sum('price'))</h3>
                                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                            Perolehan Emas :</h3>

                                                            <div class="overflow-auto max-h-[150px]">
                                                            <table>
                                                                <tbody class="text-gray-700">
                                                                    @foreach ($convertion->detailConvertions as $detail)
                                                                        <tr>
                                                                            <td
                                                                                class="w-1/3 sm:w-auto text-left py-3 px-4">
                                                                                {{ $detail->gram }} Gram</td>
                                                                            <td
                                                                                class="w-1/3 sm:w-auto text-left py-3 px-4">
                                                                                {{ $detail->information }}</td>
                                                                            <td
                                                                                class="w-1/3 sm:w-auto text-left py-3 px-4">
                                                                                @currency ($detail->price)</td>

                                                                        </tr>
                                                                    @endforeach
                                                                    Total :
                                                                    {{ $convertion->detailConvertions->sum('gram') }} Gram
                                                                    seharga @currency($convertion->detailConvertions->sum('price'))
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <h3
                                                            class="mb-4  mt-6 text-xl font-medium text-gray-900 dark:text-white">
                                                            Masukkan Item Konversi</h3>

                                                        <form action="{{route('save_emas')}}" method="post">
                                                            @csrf
                                                            <label for="countries"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal {{ date('d-m-Y', strtotime($convertion->created_at)) }}</label>
                                                            <label for="countries"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                                                Emas</label>
                                                            <div class="flex flex-row gap-2">
                                                                <input type="hidden" name="id" value="{{$convertion->id}}">
                                                                <input type="hidden" name="created_at" value="{{$convertion->created_at}}">
                                                                <input type="hidden" name="saldo" value="{{$convertion->pay_total - $convertion->detailConvertions->sum('price')}}">
                                                                <div>
                                                                    <select id="emas" name="id_emas"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        @foreach ($goldweights as $gold)
                                                                            <option value="{{ $gold->id }}">
                                                                                {{ $gold->information }}
                                                                                {{ $gold->gram }} Gram @currency($gold->price)
                                                                            </option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                                <div> <button type="submit"
                                                                        onclick="this.disabled=true; this.form.submit();"
                                                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">save</button>
                                                                </div>
                                                            </div>
                                                    
                                                    </form>
                                                    <form class="space-y-6"
                                                        action="{{ route('store_konversi', ['id' => $convertion->id]) }}"
                                                        method="post">
                                                        @csrf


                                                        <input type="hidden" name="pay_total" value="{{$convertion->detailConvertions->sum('price')}}">
                                                        <input type="hidden" name="profit" value="{{$convertion->detailConvertions->sum('profit')}}">
                                                        <input type="hidden" name="pay_status" value="3">
                                                        <input type="hidden" name="administrator"
                                                            value="{{ auth()->user()->name }}">

                                                        <button type="submit"
                                                            onclick="this.disabled=true; this.form.submit();"
                                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Bayar</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            </div>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>


    </div>
    </div>
    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-sidebar" id="statistics" role="tabpanel"
        aria-labelledby="statistics-tab">
        <div class="w-full mt-6">
            <div class="overflow-x-auto">
                <table class="w-full bg-white">
                    <thead class="bg-sidebar text-white w-full">
                        <tr>
                            <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Nama
                            </th>
                            <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Jumlah Konversi
                            </th>
                            <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Perolehan emas
                            </th>
                            <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Status Transaksi
                            </th>
                            <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($success as $convertion)
                            <tr>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $convertion->user->name }}</td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($convertion->pay_total)</td>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4">@foreach($convertion->detailConvertions as $detail)
                                   {{$detail->goldweight->information}} {{$detail->gram}} gram <br>
                                @endforeach
                                <br>
                            
                            Total : {{$convertion->detailConvertions->sum('gram')}} Gram
                            </td>
                                <td class="sm:text-left py-3 px-4">
                                  <div class="flex flex-col gap-2">  <div>
                                        <span
                                            class="inline-flex items-center bg-blue-300 text-blue-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full">
                                            <span class="w-2 h-2 mr-1 bg-blue-600 rounded-full"></span>
                                     Sudah Dibayar
                                        </span>
                                    </div>
                                    @if($convertion->information > null)
                                    <div>
                                        <span
                                            class="inline-flex items-center bg-blue-300 text-blue-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full">
                                            <span class="w-2 h-2 mr-1 bg-blue-600 rounded-full"></span>
                                            Sudah Diterima
                                        </span>
                                    </div>

                                    @endif
                                </div>

                                </td>
                                <td class="sm:text-left py-3 px-4">
                                    @if($convertion->information == null)
                                    <div>
                        <form action="{{ route('terimaemas') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$convertion->id}}">
                            <button type="submit" onclick="this.disabled=true; this.form.submit();"
                                class=" text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Sudah diterima?</button>
                        </form>
                    </div>
                    @endif
                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
