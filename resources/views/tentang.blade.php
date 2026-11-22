@extends('layouts.app')
@section('title', 'Tentang')

@section('content')
<h1 class="page-title">Tentang dia.</h1>
<p class="page-lead">Ganti nama dan cerita di bawah dengan orang yang kamu pilih: teman, pasangan, atau siapa saja.</p>

<section class="journey about">
  <div class="dots" aria-hidden="true"></div>
  <div class="col-title">
    <h2>Nama Temanmu</h2>
    <p>Orang yang bikin hari-hari terasa lebih ringan.</p>
  </div>
  <div class="col-body">
    <article>
      <h3>Pertama kali bertemu</h3>
      <p>Tulis cerita singkat kapan dan di mana kalian pertama kali bertemu.</p>
    </article>
    <article>
      <h3>Hal yang aku suka darinya</h3>
      <p>Ceritakan sifat atau kebiasaan yang membuatnya istimewa menurutmu.</p>
    </article>
    <article>
      <h3>Kenangan favorit</h3>
      <p>Satu momen yang paling sulit dilupakan, dan alasan kenapa itu berarti.</p>
    </article>
  </div>
</section>

<section class="grid">
  <section class="tile chat" style="grid-column:1/-1">
    <h2>Kirim pesan untuknya</h2>
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