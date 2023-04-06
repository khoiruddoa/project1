<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap" rel="stylesheet">
  
  
  {{-- <link href="{{ asset('build/assets/app-2752224f.css') }}" rel="stylesheet"> --}}
  <link href="./build/assets/app-2752224f.css" rel="stylesheet">
  
</head>
<body>
    @include('partials.navbar')
    <div>

        @yield('container')
    </div>
    @include('sweetalert::alert')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
   
   
</body>
</html>
