<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/f20e971e07.js" crossorigin="anonymous"></script>
  @YIELD("bootstrap")
  <link rel="stylesheet" href="/css/header_and_footer.css">
  @YIELD("styles")
  @YIELD("title")
</head>
<body>
  <header class="header-navbar">
    <div class="main-hd">

        <img src="images/icons/Atlas-surf-logo2.png" alt="">

      <button class="hamburger" type="button" id="hamburger"><i class="fas fa-bars"></i></button>
      <button type="button" id="search-button" class="hamburger search"><label id="label-search" for="search"><i class="fas fa-search"></i></label></button>
    </div>
    <nav id="nav" class="">
      <ul>
        <li><a href="./index.php">Home</a></li>
        @AUTH
          <li class="dropdown__toggler"><img src="images/users/{{ $a }}" class="thumbnail-user"/><a>{{ $b }}</a>
            <div class="dropdown__box">
              <a href="user.php" class="dropdown__link">Ver perfil</a>
              <a href="logout.php" class="dropdown__link">Cerrar sesión</a>
            </div>
          </li>
        @ELSE
          <li><a href="./login.php">Entrar</a></li>
          <li><a href="./register.php">Registrarse</a></li>
        @ENDAUTH
        <li><a href="./questions.php">FAQ</a></li>
      </ul>
      <form action="index2.php" class="search-form" id="search-form">
        <input type="text" id="search" class="search-field" name="search" placeholder="Search">
        <button type="submit" name="button"></button>
      </form>
    </nav>
  </header>

  @YIELD("main")

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
<script src="js/main.js" charset="utf-8"></script>
</body>
</html>
