@extends('layouts.app')
@section('title', 'Dokumentasi')

@section('content')
<h1 class="page-title">Dokumentasi.</h1>
<p class="page-lead">Potongan momen yang sempat tertangkap kamera.</p>

<!-- GANTI src dengan foto sendiri: {{ asset('images/foto1.jpg') }} dst. -->
<section class="gallery-page">
  <figure class="card"><img src="https://picsum.photos/seed/nd1/400/500" alt="Foto 1" data-fallback><figcaption>sanur, subuh</figcaption></figure>
  <figure class="card"><img src="https://picsum.photos/seed/nd2/400/500" alt="Foto 2" data-fallback><figcaption>kopi hitam</figcaption></figure>
  <figure class="card"><img src="https://picsum.photos/seed/nd3/400/500" alt="Foto 3" data-fallback><figcaption>studio</figcaption></figure>
  <figure class="card"><img src="https://picsum.photos/seed/nd4/400/500" alt="Foto 4" data-fallback><figcaption>jalan sore</figcaption></figure>
  <figure class="card"><img src="https://picsum.photos/seed/nd5/400/500" alt="Foto 5" data-fallback><figcaption>makan bareng</figcaption></figure>
  <figure class="card"><img src="https://picsum.photos/seed/nd6/400/500" alt="Foto 6" data-fallback><figcaption>pulang</figcaption></figure>
</section>

<div class="likebar">
  <button class="badge" id="likeBtn" type="button" aria-pressed="false">
    <span>♥</span> friends like <b id="likeCount">128</b>
  </button>
</div>
@endsection