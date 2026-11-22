@extends('layouts.app')
@section('title', 'Selamat datang')

@section('content')
<main class="grid">
  <section class="tile headline">
    <p class="small">Denpasar, Bali — sedang online</p>
    <h1>Selamat<br>datang.</h1>
    <p class="sub">Terima kasih sudah mampir. Di sini aku bercerita tentang orang spesial dan momen yang kami simpan.</p>
    <a class="btn" href="{{ route('tentang') }}">Kenalan dulu</a>
  </section>

  <aside class="tile photo-hero">
    <!-- GANTI: asset('images/hero.jpg') -->
    <img src="https://picsum.photos/seed/nadia-hero/600/800" alt="Foto utama" data-fallback>
    <span class="sticker">★ halo!</span>
  </aside>

  <section class="tile schedule">
    <h2>Isi website ini</h2>
    <ul>
      <li><b>1</b><span>Sambutan</span><i>halaman ini</i></li>
      <li><b>2</b><span>Tentang</span><i><a href="{{ route('tentang') }}">buka</a></i></li>
      <li><b>3</b><span>Dokumentasi</span><i><a href="{{ route('dokumentasi') }}">buka</a></i></li>
    </ul>
  </section>

  <blockquote class="tile quote">
    <p>“Tidak harus tahu semuanya sekarang. Jalan dulu, petanya menyusul.”</p>
    <footer>— catatan di sampul buku harian</footer>
  </blockquote>

  <section class="tile stat">
    <strong id="days">0</strong>
    <span>hari sejak kami kenal</span>
  </section>
</main>
@endsection