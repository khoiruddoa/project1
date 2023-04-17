<!doctype html>
<html>
<head>
    <title>Bank Sampah</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu+Mono&display=swap">
    <!-- Konfigurasi font di Tailwind CSS -->
    <style>
        @import url('https://rsms.me/inter/inter.css'); /* Opsi lain untuk mengimpor font Inter */
        @import url('https://fonts.googleapis.com/css?family=Ubuntu+Mono&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        code {
            font-family: 'Ubuntu Mono', monospace;
        }
    </style>
 
  
</head>
<body>
    @include('partials.navbar')
    <div>

        @yield('container')
    </div>
    {{-- @include('sweetalert::alert') --}}
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
   
   
</body>
</html>
