@extends('layouts.app')
@section('title', 'Dokumentasi')

@section('content')
@php
// ====== EDIT BAGIAN INI SAJA ======
// img = nama file di public/images | song = nama file di public/audio (isi null kalau tanpa lagu)
$photos = [
  ['img'=>'foto4b.jpeg','title'=>'Hiking','who'=>'me and friends','text'=>'3,142 MASL — Above the Clouds Steady steps through steep paths lead to wider views. A reminder to keep moving forward even when the climb feels heavy.','song'=>'4b.mp3','songTitle'=>'Judul lagu 1 — Artis'],
  ['img'=>'foto2.jpeg','title'=>'Boyfie','who'=>'Randy','text'=>"There is something grounding about watching waves crash against towering cliffs under an open sky. It wasn't a rush to check off a list, just a real moment of being present together and carrying that calm energy forward.",'song'=>'2.mp3','songTitle'=>'Judul lagu 2 — Artis'],  ['img'=>'foto1.jpeg','title'=>'The Gendokers','who'=>'Nama teman','text'=>'Tulis cerita singkat tentang foto ini.','song'=>'lmel.mp3','songTitle'=>'Judul lagu 3 — Artis'],
  ['img'=>'foto4.jpeg','title'=>'Nonton film','who'=>'Nama teman','text'=>'Tulis cerita singkat tentang foto ini.','song'=>'lagu4b.mp3','songTitle'=>'Judul lagu 4 — Artis'],
  ['img'=>'foto5.jpeg','title'=>'Main PS','who'=>'Nama teman','text'=>'Tulis cerita singkat tentang foto ini.','song'=>'lagu5.mp3','songTitle'=>'Judul lagu 5 — Artis'],
  ['img'=>'foto6.jpeg','title'=>'Hari kuliah','who'=>'Nama teman','text'=>'Tulis cerita singkat tentang foto ini.','song'=>null,'songTitle'=>''],
];
// ====== SELESAI ======
$photos = array_map(fn($p) => [
  'img' => asset('images/'.$p['img']),
  'title' => $p['title'], 'who' => $p['who'], 'text' => $p['text'],
  'song' => $p['song'] ? asset('audio/'.$p['song']) : null,
  'songTitle' => $p['songTitle'] ?? '',
], $photos);
@endphp

<h1 class="page-title">Dokumentasi.</h1>
<p class="page-lead">Klik sebuah foto untuk melihat ceritanya dan mendengar lagunya.</p>

<section class="gallery-page">
  @foreach ($photos as $i => $p)
    <figure class="card" tabindex="0" role="button" data-i="{{ $i }}" aria-label="Buka foto {{ $p['title'] }}">
      <img src="{{ $p['img'] }}" alt="{{ $p['title'] }}" data-fallback>
      <figcaption>{{ $p['title'] }} @if($p['song'])<span class="note">♪</span>@endif</figcaption>
    </figure>
  @endforeach
</section>

<div class="likebar">
  <button class="badge" id="likeBtn" type="button" aria-pressed="false">
    <span>♥</span> friends like <b id="likeCount">128</b>
  </button>
</div>

<!-- Jendela detail foto -->
<div class="lb" id="lb" hidden>
  <div class="lb-bg" data-close></div>
  <div class="lb-box" role="dialog" aria-modal="true" aria-label="Detail foto">
    <button class="lb-x" type="button" data-close aria-label="Tutup">✕</button>
    <div class="lb-stage">
      <figure class="lb-card" id="lbCard">
        <img id="lbImg" alt="" draggable="false">
        <figcaption id="lbCap"></figcaption>
      </figure>
      <p class="lb-hint">tarik kartu ke kiri atau kanan</p>
    </div>
    <div class="lb-info">
      <h2 id="lbTitle"></h2>
      <p class="lb-who" id="lbWho"></p>
      <p id="lbText"></p>
      <div class="player" id="player">
        <div class="vinyl" id="vinyl" aria-hidden="true"></div>
        <div class="song"><b id="songTitle"></b><button type="button" id="playBtn">Putar</button></div>
      </div>
      <div class="lb-nav">
        <button type="button" id="prev" aria-label="Foto sebelumnya">‹</button>
        <span id="counter"></span>
        <button type="button" id="next" aria-label="Foto berikutnya">›</button>
      </div>
      <div class="dots-nav" id="dotsNav"></div>
    </div>
    <audio id="audio" loop></audio>
  </div>
</div>

<style>
  .card{cursor:pointer}
  .card .note{color:var(--crimson);margin-left:4px}
  .lb[hidden]{display:none}
  .lb{position:fixed;inset:0;z-index:50;display:flex;align-items:center;justify-content:center;padding:16px}
  .lb-bg{position:absolute;inset:0;background:rgba(7,6,6,.88)}
  .lb-box{position:relative;width:min(940px,100%);max-height:94vh;overflow:auto;background:var(--panel);border:1px solid var(--maroon);border-radius:22px;padding:28px;display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:28px}
  .lb-x{position:absolute;top:12px;right:12px;width:38px;height:38px;border-radius:50%;border:1px solid var(--line);background:var(--bg);color:var(--text);cursor:pointer;z-index:2}
  .lb-stage{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:14px;overflow:hidden;padding:10px}
  .lb-card{width:min(320px,100%);background:var(--text);color:#1a0a0c;padding:10px 10px 12px;border-radius:6px;cursor:grab;touch-action:pan-y;user-select:none;-webkit-user-select:none;box-shadow:0 18px 40px rgba(0,0,0,.5)}
  .lb-card:active{cursor:grabbing}
  .lb-card img{width:100%;aspect-ratio:4/5;object-fit:cover;display:block;pointer-events:none}
  .lb-card figcaption{text-align:center;font-weight:600;padding-top:10px}
  .lb-hint{color:var(--muted);font-size:.85rem}
  .lb-info{display:flex;flex-direction:column;gap:12px;justify-content:center}
  .lb-info h2{font-size:clamp(1.8rem,4vw,2.6rem);font-weight:800;letter-spacing:-.03em}
  .lb-who{color:var(--crimson);font-weight:600}
  .player{display:flex;align-items:center;gap:14px;padding:12px;border:1px solid var(--line);border-radius:16px;background:var(--bg)}
  .player[hidden]{display:none}
  .vinyl{flex:none;width:64px;height:64px;border-radius:50%;background:radial-gradient(circle,var(--crimson) 0 18%,#000 19% 22%,transparent 23%),repeating-radial-gradient(circle,#161012 0 3px,#0b0708 3px 6px);animation:spin 3s linear infinite;animation-play-state:paused}
  .vinyl.spin{animation-play-state:running}
  @keyframes spin{to{transform:rotate(360deg)}}
  .song{display:flex;flex-direction:column;align-items:flex-start;gap:6px;min-width:0}
  .song b{font-weight:600}
  .song button,.lb-nav button{cursor:pointer;border:0;border-radius:99px;background:var(--crimson);color:var(--text);font:600 .9rem var(--body);padding:6px 16px}
  .lb-nav{display:flex;align-items:center;gap:14px}
  .lb-nav button{width:42px;height:42px;padding:0;font-size:1.4rem;line-height:1}
  .dots-nav{display:flex;gap:8px;flex-wrap:wrap}
  .dots-nav button{width:10px;height:10px;border-radius:50%;border:0;background:var(--line);cursor:pointer;padding:0}
  .dots-nav button.on{background:var(--crimson);transform:scale(1.3)}
  @media(max-width:760px){.lb-box{grid-template-columns:1fr;padding:22px 18px}}
  @media(prefers-reduced-motion:reduce){.vinyl{animation:none}}
</style>

<script>
(function () {
  const P = @json($photos);
  const N = P.length;
  const calm = matchMedia('(prefers-reduced-motion: reduce)').matches;
  const g = id => document.getElementById(id);
  const lb = g('lb'), card = g('lbCard'), img = g('lbImg'), audio = g('audio');
  const player = g('player'), vinyl = g('vinyl'), playBtn = g('playBtn');
  const dotsNav = g('dotsNav');
  let idx = 0, curSong = null, opener = null;

  P.forEach((_, i) => {
    const b = document.createElement('button');
    b.type = 'button'; b.setAttribute('aria-label', 'Foto ' + (i + 1));
    b.onclick = () => show(i, i > idx ? 1 : -1);
    dotsNav.appendChild(b);
  });

  function setPlaying(on) {
    vinyl.classList.toggle('spin', on);
    playBtn.textContent = on ? 'Jeda' : 'Putar';
  }

  function show(i, dir) {
    idx = (i + N) % N;
    const p = P[idx];
    img.src = p.img; img.alt = p.title;
    g('lbCap').textContent = p.title;
    g('lbTitle').textContent = p.title;
    g('lbWho').textContent = p.who;
    g('lbText').textContent = p.text;
    g('counter').textContent = (idx + 1) + ' / ' + N;
    [...dotsNav.children].forEach((d, k) => d.classList.toggle('on', k === idx));

    if (p.song) {
      player.hidden = false;
      g('songTitle').textContent = p.songTitle || 'Lagu';
      if (curSong !== p.song) { audio.src = p.song; curSong = p.song; }
      audio.play().then(() => setPlaying(true)).catch(() => setPlaying(false));
    } else {
      player.hidden = true; audio.pause(); setPlaying(false);
    }

    if (dir && !calm) {
      card.animate(
        [{ transform: `translateX(${dir * 90}px) rotate(${dir * 8}deg)`, opacity: 0 }, { transform: 'none', opacity: 1 }],
        { duration: 300, easing: 'ease-out' }
      );
    }
  }

  function open(i, el) {
    opener = el; lb.hidden = false; document.body.style.overflow = 'hidden';
    show(i, 0); lb.querySelector('.lb-x').focus();
  }
  function close() {
    lb.hidden = true; document.body.style.overflow = '';
    audio.pause(); setPlaying(false); curSong = null; audio.removeAttribute('src');
    if (opener) opener.focus();
  }

  document.querySelectorAll('.gallery-page .card').forEach(c => {
    c.addEventListener('click', () => open(+c.dataset.i, c));
    c.addEventListener('keydown', e => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open(+c.dataset.i, c); } });
  });
  lb.querySelectorAll('[data-close]').forEach(b => b.addEventListener('click', close));
  g('prev').onclick = () => show(idx - 1, -1);
  g('next').onclick = () => show(idx + 1, 1);
  playBtn.onclick = () => { audio.paused ? audio.play().then(() => setPlaying(true)).catch(() => {}) : (audio.pause(), setPlaying(false)); };
  audio.onerror = () => setPlaying(false);
  img.onerror = () => { img.src = 'data:image/svg+xml,' + encodeURIComponent('<svg xmlns="http://www.w3.org/2000/svg" width="400" height="500"><rect width="100%" height="100%" fill="#3a0a12"/></svg>'); };

  document.addEventListener('keydown', e => {
    if (lb.hidden) return;
    if (e.key === 'Escape') close();
    if (e.key === 'ArrowLeft') show(idx - 1, -1);
    if (e.key === 'ArrowRight') show(idx + 1, 1);
  });

  // Geser kartu: tarik, miring, lalu terlempar
  let startX = null, dx = 0;
  card.addEventListener('pointerdown', e => { startX = e.clientX; dx = 0; card.setPointerCapture(e.pointerId); });
  card.addEventListener('pointermove', e => {
    if (startX === null) return;
    dx = e.clientX - startX;
    card.style.transform = `translateX(${dx}px) rotate(${dx / 18}deg)`;
  });
  const release = () => {
    if (startX === null) return;
    startX = null;
    if (Math.abs(dx) > 90) {
      const dir = dx < 0 ? 1 : -1;
      const done = () => { card.style.transform = ''; show(idx + dir, dir); };
      if (calm) return done();
      card.animate(
        [{ transform: `translateX(${dx}px) rotate(${dx / 18}deg)` }, { transform: `translateX(${-dir * 700}px) rotate(${-dir * 30}deg)`, opacity: 0 }],
        { duration: 220, easing: 'ease-in' }
      ).onfinish = done;
    } else {
      card.style.transition = 'transform .25s';
      card.style.transform = '';
      setTimeout(() => card.style.transition = '', 260);
    }
  };
  card.addEventListener('pointerup', release);
  card.addEventListener('pointercancel', release);
})();
</script>
@endsection