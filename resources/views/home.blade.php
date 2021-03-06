<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="/images/icons/favicon.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/f20e971e07.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/main.css">
  <title>Las mejores tablas de surf, Atlas Surf</title>
</head>
<body>
  <div class="top-section-wrapper">
    <header class="header-navbar">
      <div class="main-hd">

        <img src="images/icons/Atlas-surf-logo2.png" alt="">

        <button class="hamburger" type="button" id="hamburger"><i class="fas fa-bars"></i></button>
        <button style="display: none;" type="button" id="search-button" class="hamburger search"><label id="label-search" for="search"><i class="fas fa-search"></i></label></button>
      </div>
      <nav id="nav" class="">
        <ul>
          @AUTH
            <li class="nav_cart">
              <a><img src="/images/icons/cart.png" alt=""></a>
              @include('partials.cart')
            </li>
          @ENDAUTH
          <li><a href="{{ route('home') }}">Home</a></li>
          @AUTH
            <li class="dropdown__toggler"><img src="/storage/users_pics/{{ Auth::user()->user_pic }}" class="thumbnail-user"/><a> {{ Auth::user()->name }} </a>
              <div class="dropdown__box">
                <a href="{{ route('user/profile') }}" class="dropdown__link">Ver perfil</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>
          @ELSE
            <li><a href="{{ route('login') }}">Entrar</a></li>
            <li><a href="{{ route('register') }}">Registrarse</a></li>
          @ENDAUTH
          <li><a href="{{ route('questions') }}">FAQ</a></li>
        </ul>
        <form style="display: none;" action="#" class="search-form" id="search-form" method="get">
          <input type="text" id="search" class="search-field" name="search" placeholder="Search">
          <button type="submit" name="button"></button>
        </form>
      </nav>
    </header>
    <video src="images/beach2.webm" muted autoplay loop></video>
    <div class="vid-overlay"></div>
    <div class="header__bajada">
        @AUTH
          <h2>Bienvenido!</h2>
          <p>Iniciaste sesión como <span class="user-name"> {{ Auth::user()->name }} </span></p>
        @ELSE
          <h2>Registrate</h2>
          <p>Y encontrá todo lo que necesitás para surfear</p>
          <a href="{{ route('register') }}" class="btn">Crear cuenta</a>
        @ENDAUTH
    </div>
  </div>
  <section class="carousel__container">
    <div class="carousel">
      <div class="carousel__slider">
        @foreach($categories as $category)
        <div class="slide">
          <img src="/images/{{ $category->picture }}" alt="">
          <div class="slide__bottom">
            <img src="/images/icons/{{ $category->logo }}" alt="">
            <h4>{{ strtoupper($category->display_name) }}</h4>
          </div>
          <a href="{{ $category->urlToProducts() }}"></a>
        </div>
        @endforeach
      </div>
    </div>
    <button class="carousel__arrow left">
      <img src="images/icons/Arrow.png" alt="">
    </button>
    <button class="carousel__arrow right">
      <img src="images/icons/Arrow.png" alt="">
    </button>
  </section>
  <section class="showreel__container">
    <iframe class="showreel__video" src="https://player.vimeo.com/video/157135353?byline=0&portrait=0" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
  </section>
  <footer>
    <div class="contact">
      <h5>CONTACTO</h5>
      <ul>
        <li>Telefono: <br> <a href="tel:1234-5678">1234-5678</a> </li>
        <li>Email: <br> <a href="mailto:contact@atlassurf.com">contact@atlassurf.com</a> </li>
      </ul>
    </div>
    <div class="redes">
      <h5>REDES</h5>
      <ul>
        <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
      </ul>
    </div>
    <div class="ubic">
      <h5>UBICACIÓN</h5>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d821.0639540086755!2d-58.408432370819995!3d-34.59769219483588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca8e4d01fcc9%3A0x2b11fc98d2859c6e!2sConsorcio%20Propietarios%20922!5e0!3m2!1sen!2sar!4v1570829948912!5m2!1sen!2sar" allowfullscreen=""></iframe>
    </div>
    <div class="rights">
      <p>All rights reserved © 2019.</p>
    </div>
  </footer>
</body>
<script src="/js/circular-carousel.js" charset="utf-8"></script>
<script src="/js/main.js" charset="utf-8"></script>
</html>
