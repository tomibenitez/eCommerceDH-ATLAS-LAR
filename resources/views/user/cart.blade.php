@EXTENDS("layouts.basic_template")
@SECTION('styles') <link rel="stylesheet" href="/css/user.css"> @ENDSECTION
@SECTION('title') <title>Carrito comprado</title> @ENDSECTION
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
      </div>
      <ul>
        @foreach ($cart->products as $product)
          <li>
            <a href="{{ route('product.show', ['product' => $product->id]) }}">{{ $product->name }}</a>
            <span>{{ $product->price() }}</span>
          </li>
        @endforeach
      </ul>
    </div>
  </section>
@ENDSECTION
