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
                    class="w-full h-60 mb-0 p-4 text-left bg-white border border-gray-200 rounded-2xl shadow sm:p-8 dark:bg-gray-800 dark:">
                    <div class="flex flex-row gap-2">
                        <div> <img src="img/date.png" alt="" class="w-20 h-20"></div>
                        <div>
                        <div class="">
                            <h5 class="mb-2 text-1xl font-bold font-mono text-gray-900 dark:text-white">Jadwal Pengangkutan
                                Sampah</h5>
                        </div>
                        <div>
                            <p class="mb-5 text-2xl font-extrabold font-mono">{{ date('d F Y', strtotime($schedule->date)) }}</p>
                        </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    @endsection
