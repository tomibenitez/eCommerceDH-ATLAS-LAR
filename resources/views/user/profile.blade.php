@EXTENDS("layouts.basic_template")
@SECTION('styles') <link rel="stylesheet" href="/css/user.css"> @ENDSECTION
@SECTION('title') <title>Información del usuario</title> @ENDSECTION
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
        @IF (Auth::user()->cart->products->isNotEmpty())
          <button type="button" onclick="document.getElementById('buy-form').submit()" class="btn-buy btn-white">Comprar carrito</button>
          <form action="/buy-cart" style="display: none" id="buy-form" method="post">
            @CSRF
          </form>
        @ENDIF
        <button type="button" id="toHist" class="btn btn-white">Historial</button>
      </div>
      <ul>
        @forelse (Auth::user()->cart->products as $product)
          <li>
            <a href="{{ route('product.show', ['product' => $product->id]) }}">{{ $product->name }}</a>
            <span>{{ $product->price() }}</span>
            <form class="cart__remove-item" action="{{ route('products.remove-from-cart') }}" method="post">
              @CSRF
              <input type="hidden" name="product" value="{{ $product->id }}">
              <button type="submit" class="btn-remove">Quitar del carrito</button>
            </form>
          </li>
        @empty
          <div class="p-3">
            No tienes ningún producto en tu carrito. Mirá nuestro <a href="{{ route('products') }}">catálogo de productos</a> y encontrá lo que buscás.
          </div>
        @endforelse
      </ul>
    </div>
    <div class="hist">
      <div class="hist__header">
        <h5>Historial de compras</h5>
        <button type="button" id="toCart" class="btn">Carrito</button>
      </div>
      <ul>
        {{-- @forelse (Auth::user()->boughtProducts as $product) --}}
        @forelse (Auth::user()->boughtCarts() as $cart)
          <li>
            <a href="{{ route('product.show', ['product' => $cart->id]) }}">{{ $cart->is_active }}</a>
            <span>{{ $cart->user_id }}</span>
            <span>{{ $cart->bought_at }}</span>
          </li>
        @empty
          <div class="p-3">
            No compraste ningún producto aún!
          </div>
        @endforelse
      </ul>
    </div>
  </section>

  <section class="settings panel">
    <h5 class="panel__header">Selecciona las categorías de las cuales te gustaría recibir ofertas:</h5>
    <form action="/user/update_fav_categories" method="post">

      @CSRF

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
    <div class="panel__header"><h4>Información de la cuenta</h4><a href="{{ route('user/profile/edit') }}" class="btn btn-white">Editar</a></div>
    <ul>
      <li>
        <h5>Nombre de usuario:</h5>
        <span>{{ Auth::user()->name }}</span>
      </li>
      <li>
        <h5>Email:</h5>
        <span>{{ Auth::user()->email }}</span>
      </li>
      <li>
        <h5>Dirección:</h5>
        <span>{{ Auth::user()->address->address ?? 'No tiene' }}</span>
      </li>
      <li>
        <h5>Ciudad:</h5>
        <span>{{ Auth::user()->address->city ?? 'No tiene' }}</span>
      </li>
      <li>
        <h5>Provincia:</h5>
        <span>{{ Auth::user()->address->province->name ?? 'No tiene' }}</span>
      </li>
      <li>
        <h5>Zip:</h5>
        <span>{{ Auth::user()->address->zip ?? 'No tiene' }}</span>
      </li>
      @IF (!Auth::user()->address)
      <li class="add-address">
        <a href="{{ route('user/profile/add-address') }}" class="btn">Añade una Dirección!</a>
      </li>
      @ENDIF
    </ul>
  </section>
@ENDSECTION
