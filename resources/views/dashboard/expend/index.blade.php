@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">
            <h1 class="text-3xl text-black pb-6">Transaksi Pengeluaran Operasional</h1>
        </div>

        <div>

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Tambah Transaksi Pengeluaran
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
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Input Pengeluaran</h3>
                            <div>

                                <form class="space-y-6" action="{{route('expend_store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="1">
                                    <input type="hidden" name="administrator" value="{{ auth()->user()->name }}" >
                                    
                                    <div>
                                        <label for="information"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pengeluaran</label>
                                        <input type="text" name="information"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required>
                                    </div>
                                    <div>
                                        <label for="pay_total"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Pengeluaran</label>
                                            <div x-data="{ number: null }">
                                                <input type="text" name="pay_total" x-model="number" x-on:input="number = parseFloat($event.target.value)" x-on:blur="$event.target.value = number.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})"
                                        
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required>
                                        </div>
                                              
                                    </div>
                                   
    
    
    
                                    <button type="submit" onclick="this.disabled=true; this.form.submit();"
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

    </div>

    <div class="w-full mt-6">
        <div class="overflow-x-auto">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Tanggal
                                </th>

                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Nama Pengeluaran
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Jumlah

                                </th>
                              
                              

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expends as $expend)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $expend->created_at }}
                                    </th>

                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $expend->information}}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        @currency($expend->pay_total)
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
