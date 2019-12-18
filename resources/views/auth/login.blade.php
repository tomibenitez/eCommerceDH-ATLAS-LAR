@EXTENDS("layouts.basic_template")
@SECTION('bootstrap') <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> @ENDSECTION
@SECTION('styles') <link rel="stylesheet" href="/css/login.css"> @ENDSECTION
@SECTION('title') <title>Login</title> @ENDSECTION
@SECTION('main')
  <form id="lelo" action="" method="post">
    <div class="form-row" id="lila">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" name="email" class="form-control"
         id="inputEmail4" placeholder="Email" value="<?php if($_POST){echo $_POST['email']; }?>">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Contraseña</label>
        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="***********">
      </div>
      <div class="form-group col-md-6">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Recordarme</label>
      </div>
      <div class="form-group col-md-6">
        <?php if(isset($errorMessage) && $errorMessage != ""){echo $errorMessage;} ?>
      </div>
    </div>
    <div class="form-action">
      <button type="submit">Iniciar sesión</button>
      <a href="reset-pwd-request.php">Olvidé mi contraseña</a>
    </div>
  </form>
@ENDSECTION
