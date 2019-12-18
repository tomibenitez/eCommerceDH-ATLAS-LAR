
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

  $('#toHist').on('click', e =>{
    $('.hist').css('left','-50%');
  })

  $('#toCart').on('click', e =>{
    $('.hist').css('left','0%');
  })
