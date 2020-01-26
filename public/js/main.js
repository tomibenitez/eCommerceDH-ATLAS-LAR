
  //Open and close nav
  $("#hamburger").on("click", function(){
    var lSearch = $("#search-form").css("left");
    lSearch = parseInt(lSearch.substring(0,2));
    if(lSearch > 0){
      $("#search-form").css("left","-85%");
    }
    var ml = $("#nav").css("marginLeft");
    ml = parseInt(ml.substring(0,1));
    if(ml>0){
      $("nav").css("marginLeft","0vw");
    }else {
      $("nav").css("marginLeft","100vw");
    }
  })
  //Open and close search field
  $("#search-button").on("click", function(){
    var mlNav = $("#nav").css("marginLeft");
    mlNav = parseInt(mlNav.substring(0,1));
    if(mlNav < 100){
      $("nav").css("marginLeft","100vw");
    }
    var l = $("#search-form").css("left");
    l = parseInt(l.substring(0,2));
    if(l<0){
      $("#search-form").css("left","10%");
            $("#label-search").prop("for","search");

    }else {
      $("#search-form").css("left","-85%");
    $("#label-search").prop("for","false");
    }
  })
  //Adjust to desktop
  $( window ).resize(function(){
    var ww = $(window).width();
    if(ww > 900){
      $("#nav").css("marginLeft","0");
      $('.hist').css('left','0');
    }
  });
  //make nav sticky
  $(window).scroll(function(){
    var pos = $(this).scrollTop();
    if(pos > 70){
      $("#nav").addClass("sticky-nav");
      setTimeout(function(){
        $("#nav").addClass("ready");
      },10)
    }else {
      $("#nav").removeClass("ready");
      $("#nav").removeClass("sticky-nav");
    }
  })

// -------------- Toggle current cart and history user profile -------------------

  function toHist(){
    $('.hist').css('left','-50%');
  }

  function toCart(){
    $('.hist').css('left','0%');
  }

// --------------- Filter for min and max price ----------------------------

  let minPrices = $('#minprice').children().filter( (index, price) => {
    return parseInt(price.value) > 0;
  });
  let maxPrices = $('#maxprice').children().filter( (index, price) => {
    return parseInt(price.value) > 0;
  });

  let operators = {
    '<': (a, b) => {return a < b},
    '>': (a, b) => {return a > b}
  };

  let updateMinMaxFilter = (receiver, commander, operator) => {
    let value = commander.children('option:selected').val();
    value = parseInt(value);

    if (value > 0) {
      receiver.each((key, price) => {

        if (operator(parseInt(price.value), value)) {
          price.style.display = 'block';
        }else{
          price.style.display = 'none';
        }

      })
    }else{
      receiver.each((key, price) => {
        price.style.display = 'block';
      });
    }
  }

  updateMinMaxFilter(maxPrices, $('#minprice'), operators['>']);
  updateMinMaxFilter(minPrices, $('#maxprice'), operators['<']);

  $('#minprice').change(e => {

    updateMinMaxFilter(maxPrices, $(e.target), operators['>']);

  });

  $('#maxprice').change(e => {

    updateMinMaxFilter(minPrices, $(e.target), operators['<']);

  });

  // --------------------------fix event propagation caroussel-------------------------------

  $('.slide a').on('transitionend' , (e) => { e.stopPropagation(); });

  // ------------------------ add to cart and update cart view -----------------------------
  let token = $('meta[name="csrf-token"]').prop('content');

  renderProductsInCart = function (products) {
    let html = '';

    if (products.length > 0) {
      products.forEach((product, i) => {
        html +=
        `<li>
          <a href="/products/${product.id}">${product.name}</a>
          <span>${product.price}</span>
          <form class="cart__remove-item" action="/products/remove-from-cart" method="post">
            <input type="hidden" name="_token" value="${token}">
            <input type="hidden" name="product" value="${product.pivot.id}">
            <button type="submit" class="btn-remove">Quitar del carrito</button>
          </form>
        </li>`;
      });


      $('.cart-hist-container .cart__header').html(
        `<h5>Carrito</h5>
        <button type="button" onclick="clearCart();" class="btn-head btn-clear btn-white">Vaciar carrito</button>
        <button type="button" onclick="buyCart();" class="btn-head btn-buy btn-white">Comprar carrito</button>

        <button type="button" id="toHist" onclick="toHist();" class="btn btn-white">Historial</button>`
      )
      $('.nav_cart .cart__header').html(
        `<h5>Carrito</h5>
        <button type="button" onclick="clearCart();" class="btn-head btn-clear btn-white">Vaciar carrito</button>
        <button type="button" onclick="buyCart();" class="btn-head btn-buy btn-white">Comprar carrito</button>`
      )
    }else{
      html =
      `<div class="p-3">
        No tenés ningún producto en tu carrito. Mirá nuestro <a href="/products">catálogo de productos</a> y encontrá lo que buscás.
      </div>`;

      $('.cart-hist-container .cart__header').html(
        `<h5>Carrito</h5>

        <button type="button" id="toHist" onclick="toHist();" class="btn btn-white">Historial</button>`
      )
      $('.nav_cart .cart__header').html(
        `<h5>Carrito</h5>`
      )
    }

    $('.cart__list').html(html);
  }

  addProductToCart = function(id) {


    let requestOptions = {
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-CSRF-Token": token,
        "X-Requested-With": "XMLHttpRequest"
      },
      body: JSON.stringify({
        product: id
      }),
      method: 'post',
      credentials: 'same-origin'
    }

    fetch('/products/add-to-cart', requestOptions)
      .then(response => {
        return response.json();
      })
      .then( products => {
        renderProductsInCart(products);
      })

  }

  // ---------------------------- Validación registro ------------------

  $('#registerForm #email').on('blur', e => {
    const errorElement = $(e.target).siblings('.error-message');

    if (!e.target.value.length > 0) {
      errorElement.html('El campo de email es obligatorio');
      $(e.target).css('boxShadow','1px 1px 3px rgba(230, 0, 0, .5)');
      return;
    }

    emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (!emailRegex.test(e.target.value)) {
      errorElement.html('Esta dirección de email es invalida');
      $(e.target).css('boxShadow','1px 1px 3px rgba(230, 0, 0, .5)');
      return;
    }

    errorElement.html('');
    $(e.target).css('boxShadow','1px 1px 3px rgba(0, 240, 20, .5)');
  })


  $('#registerForm #password').on('keyup', e => {

    const errorElement = $(e.target).siblings('.error-message');
    if (e.target.value.length == 0) {
      errorElement.html('El campo de contraseña es obligatorio');
      $(e.target).css('boxShadow','1px 1px 3px rgba(230, 0, 0, .5)');
      return;
    }

    console.log(e.target.value.length);
    if (!(e.target.value.length >= 8)) {
      errorElement.html('La contraseña debe tener al menos 8 caracteres');
      $(e.target).css('boxShadow','1px 1px 3px rgba(230, 0, 0, .5)');
      return;
    }

    errorElement.html('');
    $(e.target).css('boxShadow','1px 1px 3px rgba(0, 240, 20, .5)');
  })

  $('#registerForm #password-confirm').on('keyup', e => {

    let password = $('#registerForm #password').val();
    const errorElement = $(e.target).siblings('.error-message');

    if (e.target.value.length < 8 || e.target.value != password) {
      errorElement.html('Las contraseñas no coinciden');
      $(e.target).css('boxShadow','1px 1px 3px rgba(230, 0, 0, .5)');
      return;
    }

    errorElement.html('');
    $(e.target).css('boxShadow','1px 1px 3px rgba(0, 240, 20, .5)');
  })

  $('#registerForm #name').on('keyup', e => {

    const errorElement = $(e.target).siblings('.error-message');

    if (!(e.target.value.length >= 5)) {
      errorElement.html('El nombre debe tener al menos 5 caracteres');
      $(e.target).css('boxShadow','1px 1px 3px rgba(230, 0, 0, .5)');
      return;
    }

    errorElement.html('');
    $(e.target).css('boxShadow','1px 1px 3px rgba(0, 240, 20, .5)');
  })

// --------------------- buy current cart ------------------

buyCart = function () {
  let requestOptions = {
    headers: {
      "Content-Type": "application/json",
      "Accept": "application/json",
      "X-CSRF-Token": token,
      "X-Requested-With": "XMLHttpRequest"
    },
    method: 'post',
    credentials: 'same-origin'
  }

  fetch('/buy-cart', requestOptions)
    .then(response => {
      return response.text();
    })
    .then( thanksMessage => {
      renderProductsInCart([]);
      $('body').append(thanksMessage);
    })
}

// -------------Close thanks message -----------------

function closeThanks() {
  $('.thanks__container').detach();
}

// ------------------ claer current cart ---------------------

function clearCart() {
  let requestOptions = {
    headers: {
      "Content-Type": "application/json",
      "Accept": "application/json",
      "X-CSRF-Token": token,
      "X-Requested-With": "XMLHttpRequest"
    },
    method: 'post',
    credentials: 'same-origin'
  }

  fetch('/products/remove-from-cart', requestOptions)
    .then(response => {
      return response.text();
    })
    .then( message => {
      renderProductsInCart([]);
      console.log(message);
    })
}
