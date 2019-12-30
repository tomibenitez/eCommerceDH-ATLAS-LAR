@EXTENDS("layouts.basic_template")
@SECTION('bootstrap') <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> @ENDSECTION
@SECTION('styles') <link rel="stylesheet" href="/css/login.css"> @ENDSECTION
@SECTION('title') <title>Reseteá tu contraseña</title> @ENDSECTION
@SECTION('main')
  @if(session('status') == null)

  <form id="lelo" action="{{ route('password.email') }}" method="post">
    @CSRF
    <div class="form-row" id="lila">
      <div class="form-group col-md-12">
        <label for="inputEmail4">Porfavor ingrese el email de la cuenta que quiere recuperar. </br>
                                Se le enviará un email con los pasos a seguir.</label>
        <input type="email" name="email" class="form-control"
         id="inputEmail4" placeholder="Email" value="{{ old('email') }}" required autofocus>
      </div>
      <div class="form-group col-md-6">
        @error('email') {{ $message }} @enderror
      </div>
    </div>
    <div class="form-action">
      <button type="submit">Enviar email</button>
    </div>
  </form>

  @else

  <div class="result-pwd-request">
    {{ session('status') }}
  </div>

  @endif
@ENDSECTION
