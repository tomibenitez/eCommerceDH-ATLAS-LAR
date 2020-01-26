<div class="thanks__container">
  <div class="thanks__inner">
    <h3 class="thanks__header">
      Gracias por comprar!
    </h3>
    <p class="thanks__message">
      Tu pedido será enviado a la dirección: <br>
      <span>{{ Auth::user()->address->address }}, {{ Auth::user()->address->city }}</span>
    </p>
    <div class="thanks__image"></div>
    <span class="thanks__close" onclick="closeThanks();">
      X
    </span>
  </div>
</div>
