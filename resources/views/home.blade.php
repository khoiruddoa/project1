@extends('layouts.main')

@section('container')
<div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
    <div class="flex flex-col lg:flex-col justify-end items-center ">
      <div class="font-mono md:text-8xl text-5xl font-extrabold text-white text-center lg:mt-14 mt-16 mb-6 ">
        Bank Sampah
      </div>
      <div class="font-mono md:text-6xl text-5xl font-extrabold text-white text-center lg:mt-2 mt-2xl   mb-6 ">
        Faida Cendekia
      </div>
     
     <div class="mt-4">
        <img src="./img/image.png" alt="" class="h-[300px]">
     </div>
     <div>
     <a class="font-mono bg-[white] hover:bg-blue-700 text-[#3d68ff] hover:text-white text-xl sm:text-3xl py-2 px-4 sm:px-6 rounded"
          href="/login">
            Login
     </a>
    </div>
</div>
@endsection
