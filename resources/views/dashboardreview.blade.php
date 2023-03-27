                @extends('layouts.main')

                @section('container')
                    <div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
                        <div class="flex flex-col lg:flex-col justify-end items-center ">
                            <div
                                class="font-mono md:text-5xl text-xl font-extrabold text-white text-center lg:mt-6 mt-16 mb-6 ">
                                Bank Sampah Faida Cendikia
                            </div>
                            <div class="flex items-center mt-10">
                               


                                <div class="bg-white p-2 rounded-lg">

                                
                                    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div class="bg-blue-500 text-white rounded-lg p-4">
                                            <p class="text-sm text-gray-100 mb-2">Saldo Nasabah</p>
                                            <p class="text-3xl font-semibold">@currency($saldoNasabah)</p>
                                        </div>
                                        <div class="bg-blue-500 text-white rounded-lg p-4">
                                            <p class="text-sm text-gray-100 mb-2">Saldo Admin</p>
                                            <p class="text-3xl font-semibold">@currency($saldoAdmin)</p>
                                        </div>
                                        <div class="bg-blue-500 text-white rounded-lg p-4">
                                            <p class="text-sm text-gray-100 mb-2">Jumlah Transaksi Bulan Ini</p>
                                            <p class="text-3xl font-semibold">{{$jumlahTransaksi}}</p>
                                        </div>
                                        <div class="bg-blue-500 text-white rounded-lg p-4">
                                            <p class="text-sm text-gray-100 mb-2">Akumulasi Saldo</p>
                                            <p class="text-3xl font-semibold">@currency($uangPengepul + $saldoNasabah + $saldoAdmin)</p>
                                        </div>
                                        <div class="bg-blue-500 text-white rounded-lg p-4">
                                            <p class="text-sm text-gray-100 mb-2">Uang di Pengepul</p>
                                            <p class="text-3xl font-semibold">@currency($uangPengepul)</p>
                                        </div>
                                        <div class="bg-blue-500 text-white rounded-lg p-4">
                                            <p class="text-sm text-gray-100 mb-2">Total Nasabah</p>
                                            <p class="text-3xl font-semibold">{{$user}}</p>
                                        </div>
                                        <div class="bg-blue-500 text-white rounded-lg p-4">
                                            <p class="text-sm text-gray-100 mb-2">Total Pengajuan Konversi</p>
                                            <p class="text-3xl font-semibold">@currency($uangkonversi)</p>
                                        </div>
                                        <div class="bg-blue-500 text-white rounded-lg p-4">
                                            <p class="text-sm text-gray-100 mb-2">Total Konversi Yang disetujui</p>
                                            <p class="text-3xl font-semibold">@currency($konversi)</p>
                                        </div>
                                        <div class="bg-blue-500 text-white rounded-lg p-4">
                                            <p class="text-sm text-gray-100 mb-2">Jumlah Pengaju Konversi</p>
                                            <p class="text-3xl font-semibold">{{$konver}}</p>
                                        </div>
                                    </div>
                                </div>
                                
                               
                            </div>
                            <a href="/menu" class="mt-4 text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Kembali</a>
                        </div>
                    @endsection
