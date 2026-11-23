@extends('layouts.app')
@section('title', 'About')

@section('content')
<h1 class="page-title">About me.</h1>
<p class="page-lead">Informatics student at INSTIKI Bali.</p>

<section class="journey about">
  <div class="dots" aria-hidden="true"></div>
  <div class="col-title">
    <h2>Hey, I'm<br>Naya.</h2>
    <p>Web dev, tech, and the occasional mountain.</p>
  </div>
  <div class="col-body">
    <article>
      <h3>Who I am</h3>
      <p>Hey there! I’m Naya, an Informatics student at INSTIKI Bali who’s super into web dev and all things tech. Right now, I’m busy building cool, modern web apps with PHP and Laravel—basically turning random ideas into smooth, user-friendly interfaces.</p>
    </article>
    <article>
      <h3>Hobbies</h3>
      <p>When I’m not staring at lines of code or grinding through uni stuff, I love staying active by hitting the gym or going for a jog. Whenever I need a change of scenery, you’ll catch me hiking up a mountain to soak in the views, or just chilling with good movies and PlayStation sessions with friends.</p>
    </article>
  </div>
</section>

<section class="grid">
  <section class="tile chat" style="grid-column:1/-1">
    <h2>Send a message to Naya</h2>
    <div class="msgs" id="msgs" aria-live="polite">
      <p class="them">Hi! Anything you'd like to say?</p>
    </div>
    <div class="send">
      <input id="msgInput" type="text" placeholder="Type a message…" aria-label="Message">
      <button id="msgBtn" type="button">Send</button>
    </div>
  </section>
</section>
@endsection