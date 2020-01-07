@EXTENDS("layouts.basic_template")
@SECTION('styles') <link rel="stylesheet" href="/css/products.css"> @ENDSECTION
@SECTION('title') <title>Mirá nuestros productos</title> @ENDSECTION
@SECTION('main')
  <section class="panel">
    <h3 class="panel__header">Hola!</h3>
    <div class="panel__content">
      <p>Acá se van a ver los detalles del producto con id: {{ $id }}!</p>
    </div>
  </section>
@ENDSECTION
