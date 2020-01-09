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

  <section class="panel panel-with-form">
    <h3 class="panel__header">Editá tu producto!</h3>
    <div class="panel__content">
      <form action="" method="post" enctype="multipart/form-data">

        @CSRF

        <div class="input-field">
          <label for="name">Nombre</label>
          <input id="name" type="text" name="name" value="{{ $product->name }}">
          <p class="error-message">@error('name'){{ $message }}@enderror</p>
        </div>

        <div class="input-field textarea-lg">
          <label for="description">Descripción</label>
          <textarea name="description" id="description" rows="8" cols="80" placeholder="Dale a tu producto una descripción que ayude al usuario a decidir! :D...">{{ $product->description }}</textarea>
          <p class="error-message">@error('description'){{ $message }}@enderror</p>
        </div>

        <div class="input-field">
          <label for="category_id">Categoría</label>
          <select id="category_id" name="category_id">
          @FOREACH($categories as $category)
            <option value="{{ $category->id }}" @IF($product->category->id === $category->id) selected @ENDIF>{{ $category->category }}</option>
          @ENDFOREACH
          </select>
          <p class="error-message">@error('category_id'){{ $message }}@enderror</p>
        </div>

        <div class="input-field">
         <label for="price">Precio</label>
         <input id="price" type="text" name="price" value="{{ $product->price }}">
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
