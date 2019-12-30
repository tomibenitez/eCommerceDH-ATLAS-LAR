@EXTENDS("layouts.basic_template")
@SECTION('bootstrap') <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> @ENDSECTION
@SECTION('styles') <link rel="stylesheet" href="/css/login.css"> @ENDSECTION
@SECTION('title') <title>Login</title> @ENDSECTION
@SECTION('main')
  <form id="lelo" action="{{ route('login') }}" method="post">
    @CSRF
    <div class="form-row" id="lila">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" name="email" class="form-control"
         id="inputEmail4" placeholder="Email" value="{{ old('email') }}">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Contraseña</label>
        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="***********">
      </div>
      <div class="form-group col-md-6">
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember">Recordarme</label>
      </div>
      <div class="form-group col-md-6">
        @ERROR('email') {{$message}} @ENDERROR
        @ERROR('password') {{$message}} @ENDERROR
      </div>
    </div>
    <div class="form-action">
      <button type="submit">Iniciar sesión</button>
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">Olvidé mi contraseña</a>
      @endif
    </div>
  </form>
@ENDSECTION
