@extends('layouts.main')

@section('container')
<div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-gradient-to-b from-[#1EF53F] to-white">
    <div class="flex flex-col lg:flex-col justify-center items-center">
     <div>
        <img src="./img/image.png" alt="">
     </div>
     <div>
     <button
            class="bg-[#1EF53F] hover:bg-blue-700 text-white text-sm sm:text-base py-2 px-4 sm:px-6 rounded"
          >
            Daftar Sekarang
          </button>
    </div>
</div>
@endsection
