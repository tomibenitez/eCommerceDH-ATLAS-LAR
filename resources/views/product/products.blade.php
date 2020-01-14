@EXTENDS("layouts.basic_template")
@SECTION('styles') <link rel="stylesheet" href="/css/products.css"> @ENDSECTION
@SECTION('title') <title>Mirá nuestros productos</title> @ENDSECTION
@SECTION('main')
  <section class="filter">
    <form action="" method="get">
      <div class="input-field">
        <label for="category">Category</label>
        <select name="category" id="category">
          <option value="0">Todas</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" @IF (app('request')->input('category') == $category->id) selected @ENDIF>{{ $category->display_name }}</option>
          @endforeach
        </select>
        </label>
      </div>
      <div class="input-field price">
        <label for="minprice">Min price</label>
        <select name="minPrice" id="minprice">
          <option value="0" @IF (app('request')->input('minPrice') == '0') selected @ENDIF>Sin precio mínimo</option>
          <option value="100" @IF (app('request')->input('minPrice') == '100') selected @ENDIF>$100</option>
          <option value="1000" @IF (app('request')->input('minPrice') == '1000') selected @ENDIF>$1,000</option>
          <option value="10000" @IF (app('request')->input('minPrice') == '10000') selected @ENDIF>$10,000</option>
          <option value="50000" @IF (app('request')->input('minPrice') == '50000') selected @ENDIF>$50,000</option>
          <option value="200000" @IF (app('request')->input('minPrice') == '200000') selected @ENDIF>$200,000</option>
        </select>
        </label>
      </div>
      <div class="input-field price">
        <label for="minprice">Max price</label>
        <select name="maxPrice" id="maxprice">
          <option value="0" @IF (app('request')->input('maxPrice') == '0') selected @ENDIF>Sin precio máximo</option>
          <option value="1000" @IF (app('request')->input('maxPrice') == '1000') selected @ENDIF>$1,000</option>
          <option value="10000" @IF (app('request')->input('maxPrice') == '10000') selected @ENDIF>$10,000</option>
          <option value="50000" @IF (app('request')->input('maxPrice') == '50000') selected @ENDIF>$50,000</option>
          <option value="200000" @IF (app('request')->input('maxPrice') == '200000') selected @ENDIF>$200,000</option>
          <option value="400000" @IF (app('request')->input('maxPrice') == '400000') selected @ENDIF>$400,000</option>
        </select>
        </label>
      </div>
      <div class="input-field ">
        <label for="minprice">Sort by:</label>
        <div class="sorts">
          <input type="radio" name="orderBy" @IF (app('request')->input('orderBy') == 'created_at') checked @ENDIF value="created_at" id="date" checked><label for="date">Date <hr> </label>
          <input type="radio" name="orderBy" @IF (app('request')->input('orderBy') == 'price') checked @ENDIF value="price" id="price"><label for="price">Price <hr> </label>
          <input type="radio" name="orderBy" @IF (app('request')->input('orderBy') == 'name') checked @ENDIF value="name" id="name"><label for="name">Name <hr> </label>
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
