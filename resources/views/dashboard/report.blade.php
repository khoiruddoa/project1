@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">

        </div>

        <div class="bg-blue-500 text-white rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Laporan</h2>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-4 ">
                <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                    <p class="text-sm text-gray-100 mb-2">Laporan Transaksi</p>


                   

                </div>
                <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                    <p class="text-sm text-gray-100 mb-2">Laporan Konversi</p>
                    <p class="md:text-3xl font-semibold"></p>
                </div>
                <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                    <p class="text-sm text-gray-100 mb-2">Laporan Transaksi Pengepul</p>
                    <p class="md:text-3xl font-semibold"></p>
                </div>
                <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                    <p class="text-sm text-gray-100 mb-2">Laporan Pengeluaran</p>
                    <p class="md:text-3xl font-semibold"></p>
                </div>
            </div>
        </div>


    </div>
@endsection
