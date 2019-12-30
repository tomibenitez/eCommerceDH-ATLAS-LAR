@EXTENDS("layouts.basic_template")
@SECTION('bootstrap') <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> @ENDSECTION
@SECTION('styles') <link rel="stylesheet" href="/css/login.css"> @ENDSECTION
@SECTION('title') <title>Reseteá tu contraseña</title> @ENDSECTION
@SECTION('main')
  <form id="lelo" action="{{ route('password.update') }}" method="post">
    @CSRF

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-row justify-content-center">
      <div class="form-group col-md-6">
        <label for="email">Elija una nueva contraseña</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Tu email" value="{{ $email ?? old('email') }}" required autofocus>
      </div>
    </div>
    <div class="form-row" id="lila">
      <div class="form-group col-md-6">
        <label for="password">Elija una nueva contraseña</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="***********" required>
      </div>
      <div class="form-group col-md-6">
        <label for="password-repeat">Escriba la contraseña de nuevo</label>
        <input type="password" name="password_confirmation" class="form-control" id="password-repeat" placeholder="***********" required>
      </div>
      <div class="form-group col-md-6">
        @error('email')
          {{$message}}
        @enderror
        @error('password')
          {{$message}}
        @enderror
      </div>
    </div>
    <div class="form-action">
      <button type="submit">Cambiar contraseña</button>
    </div>
  </form>
@ENDSECTION
