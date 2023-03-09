@extends('layouts.main')

@section('container')
<div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-gradient-to-b from-[#1EF53F] to-white min-h-screen">
    <div class="flex flex-col lg:flex-col justify-end items-center ">
      <div class="font-mono md:text-6xl text-5xl font-extrabold text-white text-center lg:mt-6 mt-16 mb-6 ">
        Bank Sampah Faida Cendekia
      </div>
     <div>
        <img src="./img/image.png" alt="" class="h-[300px]">
     </div>
     <div>
     <button
            class="font-mono bg-[#1EF53F] hover:bg-blue-700 text-white text-xl sm:text-3xl py-2 px-4 sm:px-6 rounded"
          href="/login">
            Login
          </button>
    </div>
</div>
@endsection
