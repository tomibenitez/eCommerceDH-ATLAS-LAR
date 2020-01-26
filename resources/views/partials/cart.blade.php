<div class="cart">
  <div class="cart__header">
    <h5>Carrito</h5>
    @IF (Auth::user()->cart->products->isNotEmpty())
      <button type="button" onclick="clearCart();" class="btn-head btn-clear btn-white">Vaciar carrito</button>
      <button type="button" onclick="buyCart();" class="btn-head btn-buy btn-white">Comprar carrito</button>

      {{-- <form action="/buy-cart" style="display: none" id="buy-form" method="post">
        @CSRF
      </form>

      <form action="{{ route('products.remove-from-cart') }}" style="display: none" id="clear-form" method="post">
        @CSRF
      </form> --}}
    @ENDIF
  </div>
  <ul class="cart__list">
    @forelse (Auth::user()->cart->products as $product)
      <li>
        <a href="{{ route('product.show', ['product' => $product->id]) }}">{{ $product->name }}</a>
        <span>{{ $product->price() }}</span>
        <form class="cart__remove-item" action="{{ route('products.remove-from-cart') }}" method="post">
          @CSRF
          <input type="hidden" name="product" value="{{ $product->pivot->id }}">
          <button type="submit" class="btn-remove">Quitar del carrito</button>
        </form>
      </li>
    @empty
      <div class="p-3">
        No tenés ningún producto en tu carrito. Mirá nuestro <a href="{{ route('products') }}">catálogo de productos</a> y encontrá lo que buscás.
      </div>
    @endforelse
  </ul>
</div>
