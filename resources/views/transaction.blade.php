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
                        @foreach ($user->transactions->sortByDesc('created_at') as $transaction)
                            <a href="{{route('detail_transaction',['id' => $transaction->id])}}"
                                class="bg-[#15C972] hover:bg-[#016b38] font-mono text-md font-bold p-2 w-full text-white rounded-xl">
                                Transaksi Tanggal: {{ $transaction->created_at->format('d-m-Y') }} senilai
                                @currency($transaction->pay_total)</a>
                        @endforeach


                    </div>


                </div>

            </div>
        </div>
    @endsection
