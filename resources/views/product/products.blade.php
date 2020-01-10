@EXTENDS("layouts.basic_template")
@SECTION('styles') <link rel="stylesheet" href="/css/products.css"> @ENDSECTION
@SECTION('title') <title>Mirá nuestros productos</title> @ENDSECTION
@SECTION('main')
  <section class="filter">
    <form action="" method="get">
      <div class="input-field">
        <label for="category">Category</label>
        <select name="category" id="category">
          <option value="all">All</option>
          <option value="surfboards">Surfboards</option>
          <option value="accesories">Accesories</option>
          <option value="neoprene">Neoprene</option>
          <option value="clothes">Clothes</option>
          <option value="footwear">Footwear</option>
        </select>
        </label>
      </div>
      <div class="input-field price">
        <label for="minprice">Min price</label>
        <select name="minPrice" id="minprice">
          <option value="noMin">No minimun price</option>
          <option value="1">$1.000</option>
          <option value="2">$2.000</option>
          <option value="3">$4.000</option>
          <option value="4">$7.000</option>
          <option value="5">$10.000</option>
        </select>
        </label>
      </div>
      <div class="input-field price">
        <label for="minprice">Max price</label>
        <select name="maxPrice" id="maxprice">
          <option value="noMax">No maximun price</option>
          <option value="1">$3.000</option>
          <option value="2">$5.000</option>
          <option value="3">$6.000</option>
          <option value="4">$9.000</option>
          <option value="5">$12.000</option>
        </select>
        </label>
      </div>
      <div class="input-field ">
        <label for="minprice">Sort by:</label>
        <div class="sorts">
          <input type="radio" name="sortBy" value="date" id="date" checked><label for="date">Date <hr> </label>
          <input type="radio" name="sortBy" value="price" id="price"><label for="price">Price <hr> </label>
          <input type="radio" name="sortBy" value="name" id="name"><label for="name">Name <hr> </label>
        </div>
      </div>
      <button type="submit" class="btn btn-white">Search</button>
    </form>
  </section>
  <section class="products">
    @foreach($products as $product)
      <article class="product__container">
        <div class="product__image">
          <img src="/storage/products_pics/{{ $product->picture }}" alt="">
          <div class="product__details">
            <span>{{ $product->name }}</span>
            <span>{{ $product->price() }}</span>
          </div>
        </div>
        <div class="product__action">
          <a href="{{ route('product.show', ['product' => $product->id]) }}" class="btn btn-white">See more</a>
          <button type="button" id="addToCart" onclick="
                                                  event.preventDefault();
                                                  document.getElementById('add-to-cart_form{{ $product->id }}').submit();"
          class="btn">Add to cart</button>
          <form action="/products/add-to-cart" id="add-to-cart_form{{ $product->id }}" method="post" style="display: none;">
            @csrf
            <input type="hidden" name="product" value="{{ $product->id }}">
          </form>
        </div>
      </article>
    @endforeach
  </section>
@ENDSECTION
