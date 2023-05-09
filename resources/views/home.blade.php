@extends('layouts.main')

@section('container')
    <div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
        <div class="flex flex-col lg:flex-col justify-end items-center ">
            <div class="font-mono md:text-8xl text-5xl font-extrabold text-white text-center lg:mt-14 mt-16 mb-6 ">
                Bank Sampah
            </div>
            <div class="font-mono md:text-6xl text-5xl font-extrabold text-white text-center lg:mt-2 mt-2xl   mb-6 ">
                Faida Cendikia
            </div>

            <div class="mt-4">
                <img src="/public/img/image.png" alt="" class="h-[300px]">
            </div>
            <div>
                @if(auth()->user())
                    @if(auth()->user()->role == 1)
                        <a class="font-mono bg-[white] hover:bg-blue-700 text-[#3d68ff] hover:text-white text-xl sm:text-3xl py-2 px-4 sm:px-6 rounded"
                            href="/dashboard">
                            Menu
                        </a>
                        @elseif(auth()->user()->role == 3)
                        <a class="font-mono bg-[white] hover:bg-blue-700 text-[#3d68ff] hover:text-white text-xl sm:text-3xl py-2 px-4 sm:px-6 rounded"
                            href="/dashboard/dashboard">
                            Dashboard
                        </a>
                        @elseif(auth()->user()->role == 4)
                        <a class="font-mono bg-[white] hover:bg-blue-700 text-[#3d68ff] hover:text-white text-xl sm:text-3xl py-2 px-4 sm:px-6 rounded"
                        href="/menu">
                        Menu
                    </a>
@else
<a class="font-mono bg-[white] hover:bg-blue-700 text-[#3d68ff] hover:text-white text-xl sm:text-3xl py-2 px-4 sm:px-6 rounded"
href="/dashboard/pengepul">
Dashboard
</a>
                    @endif
                @else
                    <a class="font-mono bg-[white] hover:bg-blue-700 text-[#3d68ff] hover:text-white text-xl sm:text-3xl py-2 px-4 sm:px-6 rounded"
                        href="/login">
                        Login
                    </a>
                @endif
            </div>
        </div>


        
    @endsection
