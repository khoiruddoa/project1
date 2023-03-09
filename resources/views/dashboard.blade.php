@extends('layouts.main')

@section('container')
    <div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#1EF53F] min-h-screen">
        <div class="flex flex-col lg:flex-col justify-end items-center ">
            <div class="font-mono md:text-xl text-xl font-extrabold text-white text-center lg:mt-6 mt-16 mb-6 ">
                Bank Sampah Faida Cendekia
            </div>

            <div class="flex flex-col gap-10 items-center">

                <div class="w-[500px] p-6 bg-white border border-gray-200 rounded-lg shadow flex flex-row gap-10">
                    <div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">Saldo Anda : </p>
                        <p class="mb-3 font-extrabold text-gray-700 text-5xl  font-mono ">Rp. 700.000,00</p>
                    </div>
                    <div>
                        <img class="w-16 h-16 rounded-full" src="img/dumy.png" alt="user photo">
                    </div>
                </div>
                <div class="flex flex-row gap-10">

                    <div
                        class="w-[200px] h-[200px] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">Transaksi Anda</p>

                    </div>
                    <div
                        class="w-[200px] h-[200px] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">Transaksi Anda</p>

                    </div>
                    <div
                        class="w-[200px] h-[200px] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">Transaksi Anda</p>

                    </div>
                </div>
            </div>
        </div>
    @endsection
