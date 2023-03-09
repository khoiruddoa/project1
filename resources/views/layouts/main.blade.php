<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
</head>
<body>
    @include('partials.navbar')
    <div>

        @yield('container')
    </div>
    <script src="asset/flowbite.min.js"></script>
</body>
</html>
