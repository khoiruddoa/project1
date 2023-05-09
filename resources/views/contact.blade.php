@extends('layouts.main')


@section('container')
<div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
    <div class="flex flex-col justify-center items-center mb-10 pt-[250px]">
      <h1 class="text-3xl md:text-5xl font-bold mb-2 text-white">Contact Us</h1>
      <p class="text-white mb-4">Helpdesk Bank Sampah Faida Cendikia : +62 821-3048-7784</p>
    </div>

    <div class="flex justify-center items-center mt-4 space-x-4">
        <a href="https://wa.me/082130487784" target="_blank">
            <img src="/public/img/whatsapp.png" alt="WhatsApp" class="h-10">
        </a>
        <a href="https://www.facebook.com/page/" target="_blank">
            <img src="/public/img/facebook.png" alt="Facebook" class="h-10">
        </a>
        <a href="https://www.instagram.com/page/" target="_blank">
            <img src="/public/img/instagram.png" alt="Instagram" class="h-10">
        </a>
        <a href="https://www.youtube.com/channel/page" target="_blank">
            <img src="/public/img/youtube.png" alt="YouTube" class="h-10">
        </a>
    </div>
  </div>
@endsection
