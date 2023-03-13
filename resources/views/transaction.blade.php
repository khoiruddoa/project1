@extends('layouts.main')

@section('container')
    <div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
        <div class="flex flex-col lg:flex-col justify-end items-center ">
            <div class="font-mono md:text-5xl text-xl font-extrabold text-white text-center lg:mt-6 mt-16 mb-6 ">
                Bank Sampah Faida Cendikia
            </div>

            <div class="flex flex-col gap-10 items-center">

                <div
                    class="lg:w-[500px] w-[300px] p-6 bg-white border border-gray-200 rounded-lg shadow flex md:flex-row flex-row-reverse gap-10">
                    <div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">Saldo Anda : </p>
                        <p class="mb-3 font-extrabold text-gray-700 lg:text-5xl text-xl  font-mono ">Rp. 700.000,00</p>
                    </div>
                    <div>
                        <img class="w-16 h-16 rounded-full" src="img/dumy.png" alt="user photo">
                    </div>
                </div>
                <div>
                    <div class="flex flex-row lg:gap-10 gap-2 font-mono">

                        <div
                            class="flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[20px] py-[10px] bg-white rounded-[35px] shadow-lg">
                            <div><img src="img/gold.png" alt="" class="w-10 h-10"></div>
                            <div>Konversi</div>
                        </div>
                        <div
                            class="flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[20px] py-[10px] bg-white rounded-[35px] shadow-lg">
                            <div><img src="img/garbage.png" alt="" class="w-10 h-10"></div>
                            <div>Transaksi</div>
                        </div>
                        <div
                            class="flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[30px] py-[10px] bg-white rounded-[35px] shadow-lg">
                            <div><img src="img/schedule.png" alt="" class="w-10 h-10"></div>
                            <div> Jadwal</div>
                        </div>

                    </div>
                </div>

                <div
                    class="w-full mb-0 p-4 text-left bg-white border border-gray-200 rounded-2xl shadow sm:p-8 dark:bg-gray-800 flex flex-col gap-4">
                    <div class="flex flex-row gap-2">
                        <div> <img src="img/mobile-transaction.png" alt="" class="w-20 h-20"></div>
                        <div>
                            <div class="">
                                <h5 class="mb-2 text-1xl font-bold font-mono text-gray-900 dark:text-white">Transaksi
                                    Penimbangan Sampah Anda</h5>
                            </div>
                        </div>

                    </div>
                    <div class="flex flex-col gap-2">

                        <div class="bg-[#15C972] hover:bg-[#016b38] font-mono text-md font-bold p-2 w-full text-white rounded-xl">Transaksi Tanggal: 20 Januari 2023 senilai
                            Rp.100.000,00</div>
                            <div class="bg-[#15C972] hover:bg-[#016b38] font-mono text-md font-bold p-2 w-full text-white rounded-xl">Transaksi Tanggal: 20 Januari 2023 senilai
                                Rp.100.000,00</div>  <div class="bg-[#15C972] hover:bg-[#016b38] font-mono text-md font-bold p-2 w-full text-white rounded-xl">Transaksi Tanggal: 20 Januari 2023 senilai
                                    Rp.100.000,00</div>


                    </div>


                </div>

            </div>
        </div>
    @endsection
