@extends('layouts.main')

@section('container')
    <div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
        <div class="flex flex-col lg:flex-col justify-end items-center ">
            <div class="font-mono md:text-5xl text-xl font-extrabold text-white text-center lg:mt-6 mt-16 mb-6 ">
                Bank Sampah Faida Cendekia
            </div>

            <div class="flex flex-col gap-10 items-center">

                <div class="lg:w-[500px] w-[300px] p-6 bg-white border border-gray-200 rounded-lg shadow flex md:flex-row flex-row-reverse gap-10">
                    <div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">Saldo Anda : </p>
                        <p class="mb-3 font-extrabold text-gray-700 lg:text-5xl text-xl  font-mono ">Rp. 700.000,00</p>
                    </div>
                    <div>
                        <img class="w-16 h-16 rounded-full" src="img/dumy.png" alt="user photo">
                    </div>
                </div>
                <div class="flex flex-row lg:gap-10 gap-5">

                    <div
                        class=" md:w-[150px] md:h-[150px] w-[100px] h-[100px] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">Jadwal Penarikan Sampah</p>

                    </div>
                    <div
                        class="md:w-[150px] md:h-[150px] w-[100px] h-[100px] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">Pengajuan Konversi Emas</p>

                    </div>
                    <div
                        class="md:w-[150px] md:h-[150px] w-[100px] h-[100px] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">Transaksi Anda</p>

                    </div>
                </div>

                <div
                    class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Jadwal Pengangkutan Sampah</h5>
                    <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">ini jadwalnya</p>
                    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                        
                        test test
                    </div>
                </div>

            </div>
        </div>
    @endsection
