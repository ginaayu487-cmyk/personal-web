@extends('layouts.app')
@section('title', 'Tentang')

@section('content')
<h1 class="page-title">Tentang aku.</h1>
<p class="page-lead">Mahasiswa Informatika di INSTIKI Bali.</p>

<section class="journey about">
  <div class="dots" aria-hidden="true"></div>
  <div class="col-title">
    <h2>Halo, aku<br>Naya.</h2>
    <p>Web, teknologi, dan sedikit gunung.</p>
  </div>
  <div class="col-body">
    <article>
      <h3>Siapa aku</h3>
      <p>Halo! Saya Naya, mahasiswa Informatika di INSTIKI Bali yang tertarik pada pengembangan web dan teknologi. Saat ini saya sedang aktif mengeksplorasi pembuatan aplikasi web modern menggunakan PHP dan Laravel, serta senang mengubah ide menjadi tampilan antarmuka yang fungsional dan nyaman digunakan.</p>
    </article>
    <article>
      <h3>Hobi</h3>
      <p>Di luar aktivitas ngoding dan kuliah, saya senang menjaga kebugaran dengan rutin berolahraga di gym dan jogging. Saat butuh suasana baru, saya suka mendaki gunung untuk menikmati alam, atau bersantai dengan menonton film dan bermain PlayStation bersama teman.</p>
    </article>
  </div>
</section>

<section class="grid">
  <section class="tile chat" style="grid-column:1/-1">
    <h2>Kirim pesan untuk Naya</h2>
    <div class="msgs" id="msgs" aria-live="polite">
      <p class="them">Hai! Ada yang mau disampaikan?</p>
    </div>
    <div class="send">
      <input id="msgInput" type="text" placeholder="Tulis pesan…" aria-label="Pesan">
      <button id="msgBtn" type="button">Kirim</button>
    </div>
  </section>
</section>
@endsection