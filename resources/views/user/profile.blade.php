@EXTENDS("layouts.basic_template")
@SECTION('styles') <link rel="stylesheet" href="/css/user.css"> @ENDSECTION
@SECTION('title') <title>User info</title> @ENDSECTION
@SECTION('main')
  <div class="user-info">
    <div class="shadow-container">
      <img src="/storage/users_pics/{{ Auth::user()->user_pic }}" alt="">
    </div>
    <h3>{{ Auth::user()->name }}</h3>
  </div>

  <section class="cart-hist-container">
    <div class="cart">
      <div class="cart__header">
        <h5>Carrito</h5>
        <button type="button" id="toHist" class="btn btn-white">Historial</button>
      </div>
      <ul>
        <li>
          <a href="#">Nombre del ítem</a>
          <span>Precio</span>
        </li>
      </ul>
    </div>
    <div class="hist">
      <div class="hist__header">
        <h5>Historial de compras</h5>
        <button type="button" id="toCart" class="btn">Carrito</button>
      </div>
      <ul>
        <li>
          <a href="#">Nombre del ítem</a>
          <span>Precio</span>
          <span>xx/xx/xx</span>
        </li>
      </ul>
    </div>
  </section>

  <section class="settings panel">
    <h5 class="panel__header">Selecciona las categorías de las cuales te gustaría recibir ofertas:</h5>
    <form action="/user/update_fav_categories" method="post">
      <div class="input-field">
        <input id="boards" type="checkbox" name="favCategories[]" value="1"><label for="boards">Tablas</label>
      </div>
      <div class="input-field">
        <input id="accesories" type="checkbox" name="favCategories[]" value="2"><label for="accesories">Accesorios</label>
      </div>
      <div class="input-field">
        <input id="neoprene" type="checkbox" name="favCategories[]" value="3"><label for="neoprene">Neoprene</label>
      </div>
      <div class="input-field">
        <input id="clothes" type="checkbox" name="favCategories[]" value="4"><label for="clothes">Ropa</label>
      </div>
      <div class="input-field">
        <input id="footwear" type="checkbox" name="favCategories[]" value="5"><label for="footwear">Calzado</label>
      </div>

      <button type="submit">Actualizar</button>
    </form>
  </section>

  <section class="user-details panel">
    <div class="panel__header"><h4>Información de la cuenta</h4><a href="edit-user-info.php" class="btn btn-white">Editar</a></div>
    <ul>
      <li>
        <h5>Nombre de usuario:</h5>
        <span>{{ Auth::user()->name }}</span>
      </li>
      <li>
        <h5>Email:</h5>
        <span>{{ Auth::user()->email }}</span>
      </li>
      @IF (Auth::user()->address)
      <li>
        <h5>Dirección:</h5>
        <span>{{ Auth::user()->address->address }}</span>
      </li>
      <li>
        <h5>Ciudad:</h5>
        <span>{{ Auth::user()->address->city }}</span>
      </li>
      <li>
        <h5>Provincia:</h5>
        <span>{{ Auth::user()->address->province }}</span>
      </li>
      <li>
        <h5>Zip:</h5>
        <span>{{ Auth::user()->address->zip }}</span>
      </li>
    </ul>
      @ELSE
    </ul>
    <div>
      <a href="#" class="btn">Añade una Dirección!</a>
    </div>
      @ENDIF
  </section>
@ENDSECTION
