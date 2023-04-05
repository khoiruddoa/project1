@extends('layouts.main')

@section('container')
    <div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
        <div class="flex flex-col lg:flex-col justify-end items-center ">
            <div class="font-mono md:text-5xl text-xl font-extrabold text-white text-center lg:mt-6 mt-16 mb-6 ">
                Bank Sampah Faida Cendikia
            </div>

            <div class="flex flex-col gap-10 items-center">

                @include('saldo')

                <div
                    class="w-full mb-0 p-4 text-left bg-white border border-gray-200 rounded-2xl shadow sm:p-8 dark:bg-gray-800 flex flex-col gap-4">
                    <div class="flex flex-row gap-2">
                        <div> <img src="/img/mobile-transaction.png" alt="" class="w-20 h-20"></div>
                        <div>
                            <div class="">
                                <h5 class="mb-2 text-1xl font-bold font-mono text-gray-900 dark:text-white">Transaksi
                                    Penimbangan Sampah Anda</h5>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 max-h-60 overflow-y-auto">
                        @foreach ($user->transactions->merge($user->manages)->sortByDesc('created_at') as $transaction)
                            <a href="{{ route('detail_transaction', ['id' => $transaction->id]) }}"
                                class="bg-[#15C972] hover:bg-[#016b38] font-mono text-md font-bold p-2 w-full text-white rounded-xl">
                                <div>
                                    <div>
                                        Transaksi Tanggal: {{ $transaction->created_at->format('d-m-Y') }} senilai
                                        @currency($transaction->pay_total)</div>
                                    <div>
                                        @if($transaction->pay_status == 0)
                                        <span
                                            class="inline-flex items-center bg-yellow-100 text-yellow-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full ">
                                            <span class="w-2 h-2 mr-1 bg-yellow-500 rounded-full"></span>
                                            Proses
                                        </span>
                                        @endif
                                        @if($transaction->pay_status == 1)
                                        <span
                                            class="inline-flex items-center bg-green-100 text-green-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                            <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                            Menunggu
                                        </span>
                                        @endif
                                        @if($transaction->pay_status == 2)
                                        <span
                                            class="inline-flex items-center bg-blue-100 text-blue-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                            <span class="w-2 h-2 mr-1 bg-blue-500 rounded-full"></span>
                                            Selesai
                                        </span>
                                        @endif
                                        @if($transaction->pay_status == 4)
                                        <span
                                            class="inline-flex items-center bg-orange-100 text-orange-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-orange-900 dark:text-orange-300">
                                            <span class="w-2 h-2 mr-1 bg-orange-500 rounded-full"></span>
                                            Bagi Hasil Pengurus
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endforeach


                    </div>


                </div>

            </div>
        </div>
    @endsection
