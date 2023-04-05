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
                        <div> <img src="img/gold2.png" alt="" class="w-20 h-20"></div>
                        <div>
                            <div class="">
                                <h5 class="mb-2 text-1xl font-bold font-mono text-gray-900 dark:text-white">Transaksi
                                    Konversi Emas Anda</h5>
                            </div>
                            @if (count($convertion) > 0)
                                <div class="">
                                    <h5 class="mb-2 text-2xl font-bold font-mono text-[#a38c08]">Anda Sedang Mengajukan
                                        Konversi Emas</h5>
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="flex flex-col gap-2">
                        @if (count($convertions) < 1)
                            <div
                                class="bg-[#15C972] hover:bg-[#016b38] font-mono text-md font-bold p-2 w-full text-white rounded-xl">
                                Anda belum mempunyai transaksi yang disetujui</div>
                        @endif
                        @foreach ($convertions as $convertion)
                            @if ($convertion->pay_status == 2)
                                <div
                                    class="bg-[#15C972] hover:bg-[#016b38] font-mono text-md font-bold p-2 w-full text-white rounded-xl">
                                    Disetujui Tanggal: {{ $convertion->created_at->format('d-m-Y') }} senilai
                                    @currency($convertion->pay_total)</div>
                            @elseif($convertion->pay_status == 3)
                                <div
                                    class="bg-blue-500 hover:bg-blue-700 font-mono text-md font-bold p-2 w-full text-white rounded-xl">
                                    Konversi Tanggal: {{ $convertion->created_at->format('d-m-Y') }} senilai
                                    @currency($convertion->pay_total)</div>
                            @elseif($convertion->pay_status == 4)
                                <div
                                    class="bg-red-500 hover:bg-red-700 font-mono text-md font-bold p-2 w-full text-white rounded-xl">
                                    ditolak Tanggal: {{ $convertion->created_at->format('d-m-Y') }} senilai
                                    @currency($convertion->pay_total)</div>
                            @endif
                        @endforeach


                    </div>


                </div>

            </div>
        </div>
    @endsection
