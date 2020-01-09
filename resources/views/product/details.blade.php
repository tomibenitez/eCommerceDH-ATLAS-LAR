@EXTENDS("layouts.basic_template")
@SECTION('styles') <link rel="stylesheet" href="/css/products.css"> @ENDSECTION
@SECTION('title') <title>Mirá nuestros productos</title> @ENDSECTION
@SECTION('main')
  <section class="product-details">
    <img class="product-picture" src="/storage/products_pics/{{ $product->picture }}" alt="">
    <div class="product-name">
      <h1>{{ $product->name }}</h1>
    </div>
    <div class="product-description">
      <p>
        {{ $product->description }}
      </p>
    </div>
    <div class="product-price">
      <span>${{ number_format($product->price, 2) }}</span>
    </div>
    <form action="/products/add-to-cart" method="post">
      @csrf
      <input type="hidden" name="product" value="{{ $product->id }}">
      <button type="submit" class="btn add-to-cart-btn">Al carrito!</button>
    </form>
  </section>
@ENDSECTION
