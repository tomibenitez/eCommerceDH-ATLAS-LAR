@EXTENDS("layouts.basic_template")
@SECTION('bootstrap') <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> @ENDSECTION
@SECTION('styles') <link rel="stylesheet" href="/css/register.css"> @ENDSECTION
@SECTION('title') <title>Register</title> @ENDSECTION
@SECTION('main')
  <form id="lalala" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
    @CSRF
    <div class="form-row justify-content-center">
      <div class="form-group col-md-3">
        <label for="email">Email</label> @ERROR('email') <span>{{ $message }}</span> @ENDERROR
        <input type="email" class="form-control" name="email" id="email" required placeholder="Email" value="{{ old('email') }}">
      </div>
      <div class="form-group col-md-3">
        <label for="password">Contraseña</label> @ERROR('password') <span>{{ $message }}</span> @ENDERROR
        <input type="password" class="form-control" name="password" id="password" placeholder="***********">
      </div>
    </div>
    <div class="form-row justify-content-center">
      <div class="form-group col-md-3">
        <label for="userPic">Foto de perfil</label>
        <input type="file" name="userPic" id="userPic">
        @ERROR('userPic') <span>{{ $message }}</span> @ENDERROR
      </div>
      <div class="form-group col-md-3">
        <label for="password-confirm">Confirmar contraseña</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
      </div>
    </div>
    <div class="form-row justify-content-center">
      <div class="form-group col-md-3">
        <label for="name">Nombre de usuario</label> @ERROR('name') <span>{{ $message }}</span> @ENDERROR
        <input type="text" class="form-control" name="name" id="name" required placeholder="Nombre de usuario" value="{{ old('name') }}">
      </div>
    </div>
    <div class="form-row justify-content-center">
      <button type="submit" class="btn btn-primary">Registrarse</button>
      <input class="check-terms" type="checkbox" name="acepta" value="1" id="check-terms" required> <label for="check-terms">Acepta los terminos y condiciones.</label>
    </div>
    <span class="aclaration">*Datos necesarios.</span>
  </form>
@ENDSECTION
