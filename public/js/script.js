const $ = id => document.getElementById(id);

// Jam
const clock = $('clock');
if (clock) {
  const tick = () => clock.textContent = new Date().toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit'});
  tick(); setInterval(tick, 30000);
}

// Hari sejak tanggal tertentu (UBAH tanggalnya)
const days = $('days');
if (days) days.textContent = Math.floor((Date.now() - new Date('2023-03-01')) / 864e5);

// Gambar cadangan kalau gagal dimuat
document.querySelectorAll('img[data-fallback]').forEach(img => {
  img.addEventListener('error', () => {
    img.src = 'data:image/svg+xml,' + encodeURIComponent('<svg xmlns="http://www.w3.org/2000/svg" width="400" height="500"><rect width="100%" height="100%" fill="#3a0a12"/></svg>');
  }, {once:true});
});

// Chat mini
const msgs = $('msgs'), input = $('msgInput'), btn = $('msgBtn');
if (msgs && input && btn) {
  const replies = ['Noted! Aku balas secepatnya ya.', 'Seru! Ceritain lebih banyak dong.', 'Haha, setuju.'];
  const add = (t, c) => { const p = document.createElement('p'); p.className = c; p.textContent = t; msgs.appendChild(p); msgs.scrollTop = msgs.scrollHeight; };
  const send = () => {
    const t = input.value.trim(); if (!t) return;
    add(t, 'me'); input.value = '';
    setTimeout(() => add(replies[Math.floor(Math.random() * replies.length)], 'them'), 700);
  };
  btn.addEventListener('click', send);
  input.addEventListener('keydown', e => { if (e.key === 'Enter') send(); });
}

// Badge friends like
const like = $('likeBtn'), count = $('likeCount');
if (like && count) like.addEventListener('click', () => {
  const on = like.getAttribute('aria-pressed') === 'true';
  like.setAttribute('aria-pressed', String(!on));
  count.textContent = Number(count.textContent) + (on ? -1 : 1);
});