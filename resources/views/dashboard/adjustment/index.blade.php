@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">
            <h1 class="text-3xl text-black pb-6">Tabel Penyelarasan Saldo</h1>
        </div>

        <div>

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Input Penyelarasan Saldo
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
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan Penyelarasan Saldo
                            </h3>
                            <form class="space-y-6" action="{{ route('adjustment_store') }}" method="POST">
                                @csrf
                                <div>
                                    <label for="user"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        User</label>
                                    <select id="user_id" name="user_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div>
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saldo</label>
                                    <div x-data="{ number: null }">
                                        <input type="text" name="pay_total" x-model="number"
                                            x-on:input="number = parseFloat($event.target.value)"
                                            x-on:blur="$event.target.value = number.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required>
                                    </div>

                                </div>

                                <input type="hidden" name="pay_status" value="1">
                                <input type="hidden" name="administrator" value="{{ auth()->user()->name }}">
                                <input type="hidden" name="information" value="1">







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

    <div class="w-full mt-6">
        <div class="overflow-x-auto">
            <table class="w-full bg-white">
                <thead class="bg-sidebar text-white w-full">
                    <tr>
                        <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Tgl</th>

                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Nasabah</th>
                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Saldo</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $transaction->created_at }}</td>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $transaction->user->name }}</td>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($transaction->pay_total)</td>
                            <td class="sm:text-left py-3 px-4">
                                <div class="flex flex-row justify-center items-center gap-2">
                                    <div>

                                        <!-- Modal toggle -->
                                        <button data-modal-target="authentication-modal{{ $transaction->id }}"
                                            data-modal-toggle="authentication-modal{{ $transaction->id }}"
                                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button">
                                            Edit
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
                                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                            Edit Penyelarasan Saldo</h3>
                                                        <form class="space-y-6"
                                                            action="{{ route('adjustment_update', ['id' => $transaction->id]) }}"
                                                            method="POST">
                                                            @csrf

                                                            <div>
                                                                <label for="user"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                                    User</label>
                                                                <select id="user_id" name="user_id"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @foreach ($users as $user)
                                                                        @if ($transaction->user_id == $user->id)
                                                                            <option value="{{ $user->id }}" selected>
                                                                                {{ $user->name }}</option>
                                                                        @else
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}</option>
                                                                        @endif
            
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                            <div>
                                                                <label for="price"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saldo</label>
                                                                <div x-data="{ number: null }">
                                                                    <input type="text" name="pay_total" value="$transaction->pay_total"
                                                                        x-model="number"
                                                                        x-on:input="number = parseFloat($event.target.value)"
                                                                        x-on:blur="$event.target.value = number.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                        required>
                                                                </div>

                                                            </div>

                                                            <input type="hidden" name="pay_status" value="1">
                                                            <input type="hidden" name="administrator"
                                                                value="{{ auth()->user()->name }}">
                                                            <input type="hidden" name="information" value="1">







                                                            <button type="submit"
                                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Input</button>
                                                            <div
                                                                class="text-sm font-medium text-gray-500 dark:text-gray-300">

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                        <a href="{{ route('adjustment_delete', ['id' => $transaction->id]) }}"
                                            onclick="return confirm('Apa Anda Yakin Ingin Menghapus data ini?')"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</a>
                                    </div>

                                </div>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
