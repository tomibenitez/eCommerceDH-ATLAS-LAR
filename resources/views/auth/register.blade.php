@EXTENDS("layouts.basic_template")
@SECTION('bootstrap') <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> @ENDSECTION
@SECTION('styles') <link rel="stylesheet" href="/css/register.css"> @ENDSECTION
@SECTION('title') <title>Register</title> @ENDSECTION
@SECTION('main')
  <form id="registerForm" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
    @CSRF
    <div class="form-row justify-content-center">
      <div class="form-group col-md-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" autocomplete="off" required placeholder="Email" value="{{ old('email') }}">
        <p class="error-message">@ERROR('email') {{ $message }} @ENDERROR</p>
      </div>
      <div class="form-group col-md-3">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" autocomplete="off" name="password" id="password" placeholder="***********">
        <p class="error-message">@ERROR('password') {{ $message }} @ENDERROR</p>
      </div>
    </div>
    <div class="form-row justify-content-center">
      <div class="form-group col-md-3">
        <label for="userPic">Foto de perfil</label>
        <input type="file" name="userPic" id="userPic">
        <p class="error-message">@ERROR('userPic') {{ $message }} @ENDERROR</p>
      </div>
      <div class="form-group col-md-3">
        <label for="password-confirm">Confirmar contraseña</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
        <p class="error-message">@ERROR('password_confirmation') {{ $message }} @ENDERROR</p>
      </div>
    </div>
    <div class="form-row justify-content-center">
      <div class="form-group col-md-3">
        <label for="name">Nombre de usuario</label>
        <input type="text" class="form-control" name="name" id="name" required autocomplete="off" placeholder="Nombre de usuario" value="{{ old('name') }}">
        <p class="error-message">@ERROR('name') {{ $message }} @ENDERROR</p>
      </div>
    </div>
    <div class="form-row justify-content-center">
      <button type="submit" class="btn btn-primary">Registrarse</button>
      <input class="check-terms" type="checkbox" name="acepta" value="1" id="check-terms" required> <label for="check-terms">Acepta los terminos y condiciones.</label>
    </div>
    <span class="aclaration">*Datos necesarios.</span>
  </form>
@ENDSECTION
