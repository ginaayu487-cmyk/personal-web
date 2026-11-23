<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') — Naya</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,800&family=Instrument+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="wrap">
  <header class="bar">
    <a class="logo" href="{{ route('welcome') }}">Naya</a>
    <nav>
      <a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'on' : '' }}">Sambutan</a>
      <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'on' : '' }}">Tentang</a>
      <a href="{{ route('dokumentasi') }}" class="{{ request()->routeIs('dokumentasi') ? 'on' : '' }}">Dokumentasi</a>
    </nav>
    <span class="clock" id="clock">--:--</span>
  </header>

  @yield('content')

  <footer class="foot">© 2026 Naya .</footer>
</div>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>