@EXTENDS("layouts.basic_template")
@SECTION('styles') <link rel="stylesheet" href="/css/user.css"> @ENDSECTION
@SECTION('title') <title>Editar la información del usuario</title> @ENDSECTION
@SECTION('main')
  <div class="user-info">
    <div class="shadow-container">
      <img src="/storage/users_pics/{{ Auth::user()->user_pic }}" alt="">
    </div>
    <h3>{{ Auth::user()->name }}</h3>
  </div>

  <section class="user-edit panel">
   <div class="panel__header"><h4><label for="userName">Nombre de usuario</label></h4></div>
   <form action="" method="post">

      @CSRF

      <div class="input-field">
        <input id="userName" type="text" name="userName" value="{{ Auth::user()->name }}">
        <p class="error-message">@ERROR('userName') {{ $message }} @ENDERROR</p>
      </div>
      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>

 <section class="user-edit panel">
   <div class="panel__header"><h4><label for="email">Dirección de email</label></h4></div>
   <form action="" method="post">

      @CSRF

      <div class="input-field">
        <input id="email" type="email" name="email" value="{{ Auth::user()->email }}">
        <p class="error-message">@ERROR('email') {{ $message }} @ENDERROR</p>
      </div>
      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>

@IF ( Auth::user()->address )
 <section class="user-edit panel" id="address">
   <div class="panel__header"><h4>Nuevo domicilio</h4></div>
   <form action="" method="post">

      @CSRF

      <div class="input-field">
        <label for="address">Dirección</label>
        <input id="address" type="text" name="address" value="{{ Auth::user()->address->address }}">
        <p class="error-message"></p>
      </div>
      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>

 <section class="user-edit panel">
   <div class="panel__header"><h4>Ciudad y provincia</h4></div>
   <form action="" method="post">

      @CSRF

      <div class="input-field">
        <label for="city">Ciudad</label>
        <input id="city" type="text" name="city" value="{{ Auth::user()->address->city }}">
        <p class="error-message"></p>
      </div>
      <div class="input-field">
        <label for="province">Provincia</label>
        <select id="province" name="province">
        @FOREACH($provinces as $province)
          <option value="{{ $province->id }}" @IF(Auth::user()->address->province->id === $province->id) selected @ENDIF>{{ $province->name }}</option>
        @ENDFOREACH
        </select>
        <p class="error-message"></p>
      </div>
      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>

 <section class="user-edit panel">
   <div class="panel__header"><h4>Cambiar código Zip</h4></div>
   <form action="" method="post">

      @CSRF

      <div class="input-field">
        <label for="zip">Zip</label>
        <input id="zip" type="text" name="zip" value="{{ Auth::user()->address->zip }}">
        <p class="error-message">@ERROR('zip') {{ $message }} @ENDERROR</p>
      </div>
      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>
@ENDIF
 <section class="user-edit panel">
   <div class="panel__header"><h4>Nueva foto de perfil</h4></div>
   <form action="" method="post" enctype="multipart/form-data">

      @CSRF

      <div class="input-field">
        <label for="userPic">Foto de perfil</label>
        <input class="user-pic" id="userPic" type="file" name="userPic">
        <p class="error-message">@ERROR('userPic') {{ $message }} @ENDERROR</p>
      </div>
      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>

 <section class="user-edit panel" id="address">
   <div class="panel__header"><h4>Cambiar la contraseña</h4></div>
   <form action="" method="post">

      @CSRF

      <div class="input-field">
        <label for="newPassword">Nueva contraseña</label>
        <input id="newPassword" type="password" name="newPassword">
        <p class="error-message"></p>
      </div>
      <div class="input-field">
        <label for="newPasswordRepeat">Vuelva a escribir su nueva contraseña</label>
        <input id="newPasswordRepeat" type="password" name="newPasswordRepeat">
        <p class="error-message">@ERROR('newPassword') {{ $message }} @ENDERROR</p>
      </div>
      <div class="form-action">
        <div class="input-field">
          <label for="password">Antes de continuar, ingrese su contraseña actual</label>
          <input id="password" type="password" name="password">
          <p class="error-message">@ERROR('password') {{ $message }} @ENDERROR</p>
        </div>
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>
@ENDSECTION
