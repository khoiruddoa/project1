@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col gap-4">
        <div class="">
            <h1 class="text-3xl text-black pb-6">Tabel detail Nasabah</h1>
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <a href="{{ route('nasabah_delete', ['id' => $user->id]) }}"
                onclick="return confirm('Apa Anda Yakin Ingin Menghapus data ini?')"
                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus
                Nasabah</a>
        </div>


        <div>

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Edit Nasabah
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
                        <div class="px-6 py-6 lg:px-4">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Data Nasabah</h3>
                            <form class="space-y-6" action="{{ route('nasabah_update', ['user_id' => $user->id]) }}"
                                method="POST">
                                @csrf
                                <div class="flex flex-row gap-4">
                                <div>
                                        <label for="id_member"
                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">ID Member</label>
                                        <input type="text" name="id_member" id="id_member" value="{{ $user->id_member }}"
                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                    </div>
                                    <div>
                                        <label for="name"
                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                        <input type="text" name="name" id="name" value="{{ $user->name }}"
                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                    </div>
                                    <div>
                                        <label for="small-input"
                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">No.
                                            HP</label>
                                        <input type="number" value="{{ $user->phone_number }}" name="phone_number"
                                            id="small-input"
                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                    </div>


                                </div>
                                <div class="flex flex-row gap-4">
                                    <div>
                                        <label for="email"
                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="email" name="email" id="email" value="{{ $user->email }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required>
                                    </div>

                                    <div>
                                        <label for="password"
                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                    </div>
                                </div>

                                <label for="address"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea id="address" name="address" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>{{ $user->address }}</textarea>

                                <div class="flex justify-between">

                                </div>
                                <button type="submit" onclick="this.disabled=true; this.form.submit();"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-sidebar dark:border-gray-700">
    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">ID Member : {{ $user->id_member }}</h5>

        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Nama : {{ $user->name }}</h5>
        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Alamat : {{ $user->address }}</p>
        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Email : {{ $user->email }}</p>
        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">No Telephone : {{ $user->phone_number }}</p>
        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Saldo : @currency($user->transactions->where('pay_status', 2)->sum('pay_total') - $user->convertions->where('pay_status', 3)->sum('pay_total')) </p>



        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-sidebar dark:border-gray-700">
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-sidebar"
                id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                <li class="mr-2">
                    <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                        aria-selected="true"
                        class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-sidebar dark:hover:bg-gray-700 dark:text-blue-500">
                        Transaksi</button>
                </li>
                <li class="mr-2">
                    <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                        aria-controls="services" aria-selected="false"
                        class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Konversi</button>
                </li>

            </ul>
            <div id="defaultTabContent">
                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-sidebar" id="about" role="tabpanel"
                    aria-labelledby="about-tab">
                    <div class="w-full mt-6">
                        <div class="overflow-auto max-h-[300px]">

                            <table class="w-full bg-white">
                                <thead class="bg-sidebar text-white w-full">
                                    <tr>

                                        <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                            tanggal</th>
                                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">
                                            Transaksi</th>
                                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">
                                            Status</th>
                                    </tr>
                                </thead>
                                </thead>
                                <tbody class="text-gray-700">

                                    @foreach ($transactions as $item)
                                        <tr>
                                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $item->created_at }}</td>
                                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($item->pay_total)</td>
                                            <td class="sm:text-left py-3 px-4">
                                                @if ($item->pay_status == 0)
                                                    <span
                                                        class="inline-flex items-center bg-yellow-100 text-yellow-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                                        <span class="w-2 h-2 mr-1 bg-yellow-500 rounded-full"></span>
                                                        proses
                                                    </span>
                                                @elseif($item->pay_status == 1)
                                                    <span
                                                        class="inline-flex items-center bg-green-100 text-green-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                        <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                                        menunggu
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center bg-blue-100 text-blue-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                                        <span class="w-2 h-2 mr-1 bg-blue-500 rounded-full"></span>
                                                        selesai
                                                    </span>
                                                @endif
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
                        <div class="overflow-auto max-h-[300px]">
                            <table class="w-full bg-white">
                                <thead class="bg-sidebar text-white w-full">
                                    <tr>

                                        <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                            tanggal</th>
                                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">
                                            Transaksi</th>
                                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">

                                    @foreach ($convertions as $item)
                                        <tr>
                                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $item->created_at }}</td>
                                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($item->pay_total)</td>
                                            <td class="sm:text-left py-3 px-4">
                                                @if ($item->pay_status == 1)
                                                    <span
                                                        class="inline-flex items-center bg-yellow-100 text-yellow-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                                        <span class="w-2 h-2 mr-1 bg-yellow-500 rounded-full"></span>
                                                        proses
                                                    </span>
                                                @elseif($item->pay_status == 2)
                                                    <span
                                                        class="inline-flex items-center bg-green-100 text-green-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                        <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                                        menunggu
                                                    </span>
                                                    @elseif($item->pay_status == 3)
                                                    <span
                                                        class="inline-flex items-center bg-blue-100 text-blue-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                                        <span class="w-2 h-2 mr-1 bg-blue-500 rounded-full"></span>
                                                        selesai
                                                    </span>
                                                    @else
                                                    <span
                                                        class="inline-flex items-center bg-red-100 text-red-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                                        <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                                                        ditolak
                                                    </span>
                                                @endif
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





    </div>
@endsection
