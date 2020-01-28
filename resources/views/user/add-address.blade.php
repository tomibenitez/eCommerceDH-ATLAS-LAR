@EXTENDS("layouts.basic_template")
@SECTION('styles') <link rel="stylesheet" href="/css/user.css"> @ENDSECTION
@SECTION('title') <title>Agregar Dirección</title> @ENDSECTION
@SECTION('main')
  <div class="user-info">
    <div class="shadow-container">
      <img src="/storage/users_pics/{{ Auth::user()->user_pic }}" alt="">
    </div>
    <h3>{{ Auth::user()->name }}</h3>
  </div>

  <section class="user-edit panel panel-with-form" id="address">
    <div class="panel__header"><h4>Nuevo domicilio</h4></div>
    <form action="" method="post">

      @CSRF

      <div class="input-field">
        <label for="address">Dirección</label>
        <input id="address" type="text" name="address" value="{{ old('address') }}">
        <p class="error-message">@ERROR('address') {{ $message }} @ENDERROR</p>
      </div>

      <div class="input-field">
        <label for="city">Ciudad</label>
        <input id="city" type="text" name="city" value="{{ old('city') }}">
        <p class="error-message">@ERROR('city') {{ $message }} @ENDERROR</p>
      </div>

      <div class="input-field">
        <label for="province">Provincia</label>
        <select id="province" name="province">
          @FOREACH($provinces as $province)
            <option value="{{ $province->id }}" @IF(old('province') == $province->id) selected @ENDIF>{{ $province->name }}</option>
          @ENDFOREACH
        </select>
        <p class="error-message">@ERROR('province') {{ $message }} @ENDERROR</p>
      </div>

      <div class="input-field">
        <label for="zip">Zip</label>
        <input id="zip" type="text" name="zip" value="{{ old('zip') }}">
        <p class="error-message">@ERROR('zip') {{ $message }} @ENDERROR</p>
      </div>

      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>

    </form>
  </section>

@ENDSECTION
