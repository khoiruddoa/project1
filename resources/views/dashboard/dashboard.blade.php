@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">
            <h1 class="text-3xl text-black pb-6">Dashboard</h1>
        </div>

        <div class="bg-blue-500 text-white rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Dashboard</h2>
            <div class="grid grid-cols-3 gap-4 ">
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Saldo Nasabah</p>
                <p class="text-3xl font-semibold">Rp 10.000.000</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Saldo Admin</p>
                <p class="text-3xl font-semibold">Rp 5.000.000</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Jumlah Transaksi Bulan Ini</p>
                <p class="text-3xl font-semibold">50</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Saldo Nasabah</p>
                <p class="text-3xl font-semibold">Rp 10.000.000</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Saldo Admin</p>
                <p class="text-3xl font-semibold">Rp 5.000.000</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Total Nasabah</p>
                <p class="text-3xl font-semibold">50</p>
              </div>
            </div>
          </div>
          

    </div>

  
@endsection
