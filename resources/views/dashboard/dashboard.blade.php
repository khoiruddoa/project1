@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">
            
        </div>

        <div class="bg-blue-500 text-white rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Dashboard</h2>
            <div class="grid grid-cols-3 gap-4 ">
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Saldo Nasabah</p>
                <p class="text-3xl font-semibold">@currency($saldoNasabah)</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Saldo Admin</p>
                <p class="text-3xl font-semibold">@currency($saldoAdmin)</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Jumlah Transaksi Bulan Ini</p>
                <p class="text-3xl font-semibold">{{$jumlahTransaksi}}</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Akumulasi Saldo</p>
                <p class="text-3xl font-semibold">@currency($uangPengepul + $saldoNasabah + $saldoAdmin)</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Uang di Pengepul</p>
                <p class="text-3xl font-semibold">@currency($uangPengepul)</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Total Nasabah</p>
                <p class="text-3xl font-semibold">{{$user}}</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Total Pengajuan Konversi</p>
                <p class="text-3xl font-semibold">@currency($konversi)</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Total Konversi Yang disetujui</p>
                <p class="text-3xl font-semibold">@currency($uangkonversi)</p>
              </div>
              <div class="text-center bg-blue-600 rounded-xl p-4">
                <p class="text-sm text-gray-100 mb-2">Jumlah Pengaju Konversi</p>
                <p class="text-3xl font-semibold">{{$konver}}</p>
              </div>
            </div>
          </div>
          

    </div>

  
@endsection
