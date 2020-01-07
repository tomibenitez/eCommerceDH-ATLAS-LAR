@EXTENDS("layouts.basic_template")
@SECTION('styles') <link rel="stylesheet" href="/css/user.css"> @ENDSECTION
@SECTION('title') <title>Bienvenido, admin!</title> @ENDSECTION
@SECTION('main')
  <div class="user-info">
    <div class="shadow-container">
      <img src="/storage/users_pics/{{ Auth::user()->user_pic }}" alt="">
    </div>
    <h3>{{ Auth::user()->name }}</h3>
  </div>

  <section class="panel">
    <h3 class="panel__header">Hola!</h3>
    <div class="panel__content">
      <p>Este es tu dash-board. Acá podés ver, editar y hasta eliminar todos los productos que creaste.</p>
      <hr>
      <ul class="list-group">

        @forelse ($products as $product)
            <li class="list-group__item">
              <a href="#" class="w-50">{{ $product->name }}</a>
              <span class="w-25">{{ $product->created_at }}</span>
              <a href="#">Edit</a>
              <form action="" method="post">
                @method('DELETE')
                <input type="hidden" name="product" value="{{ $product->id }}">
                <button type="button">Delete</button>
              </form>
            </li>
        @empty
            No tienes ningún producto creado!
        @endforelse
      </ul>

    </div>
  </section>

  <section class="panel panel-with-form">
    <h3 class="panel__header">Creá un producto nuevo!</h3>
    <div class="panel__content">
      <form action="{{ route('products') }}" method="post" enctype="multipart/form-data">

        @CSRF

        <div class="input-field">
          <label for="name">Nombre</label>
          <input id="name" type="text" name="name" value="{{ old('name') }}">
          <p class="error-message">@error('name'){{ $message }}@enderror</p>
        </div>

        <div class="input-field textarea-lg">
          <label for="description">Descripción</label>
          <textarea name="description" id="description" rows="8" cols="80" placeholder="Dale a tu producto una descripción que ayude al usuario a decidir! :D...">{{ old('description') }}</textarea>
          <p class="error-message">@error('description'){{ $message }}@enderror</p>
        </div>

        <div class="input-field">
          <label for="category_id">Categoría</label>
          <select id="category_id" name="category_id">
          @FOREACH($categories as $category)
            <option value="{{ $category->id }}" @IF(old('category_id') === $category->id) selected @ENDIF>{{ $category->category }}</option>
          @ENDFOREACH
          </select>
          <p class="error-message">@error('category_id'){{ $message }}@enderror</p>
        </div>

        <div class="input-field">
         <label for="price">Precio</label>
         <input id="price" type="text" name="price" value="{{ old('price') }}">
         <p class="error-message">@ERROR('price') {{ $message }} @ENDERROR</p>
        </div>

        <div class="input-field">
         <label for="picture">Imagen</label>
         <input id="picture" class="file-input" type="file" name="picture">
         <p class="error-message">@ERROR('picture') {{ $message }} @ENDERROR</p>
        </div>

        <div class="form-action">
          <button type="submit" class="btn">Confirmar cambios</button>
        </div>


      </form>
    </div>
  </section>
@ENDSECTION
