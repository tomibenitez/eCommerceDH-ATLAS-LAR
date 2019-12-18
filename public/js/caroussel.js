const rail = $(".caroussel__rail");
const slides = rail.children();
const prevButton = $(".caroussel__arrow--left");
const nextButton = $(".caroussel__arrow--right");
const navDots = $(".caroussel__dots");
const dots = navDots.children();

// Functions
  //set slides position
const moveSlides = (amountMove, targetSlide, currentSlide)=>{
  rail.css("transform","translateX(-"+ amountMove + "vw)");
  targetSlide.addClass("current-slide");
  currentSlide.removeClass("current-slide");
}
  //hide and show arrows
const updateArrows = (targetSlide)=>{
  const targetIndex = slides.index(targetSlide);

  if(targetIndex == (slides.length - 1)){
    nextButton.addClass("is-hidden");
    prevButton.removeClass("is-hidden");
  }else if(targetIndex == 0){
    prevButton.addClass("is-hidden");
    nextButton.removeClass("is-hidden");
  }else {
    nextButton.removeClass("is-hidden");
    prevButton.removeClass("is-hidden");
  }
}
  //change nav when using arrows
const updateNav = (targetSlide) => {
  const currentDot = $(".current-pos");
  const targetIndex = slides.index(targetSlide);
  const targetDot = $(dots[targetIndex]);

  targetDot.addClass("current-pos");
  currentDot.removeClass("current-pos");
}
  //Move automaticly (Function)
  const moveAuto = () => {
    const currentSlide = $(".current-slide");
    let targetSlide = currentSlide.next();
    let amountMove = slides.index(targetSlide) * 80;

    if(currentSlide.index() == slides.length -1){
      targetSlide = $(slides[0]);
      amountMove = 0;
    }

    moveSlides(amountMove, targetSlide, currentSlide);
    updateArrows(targetSlide);
    updateNav(targetSlide);
  }


// events
  //move automaticly
  let carousselInterval = setInterval(moveAuto,3000);
  // move to next
  nextButton.on("click",e => {
    const currentSlide = $(".current-slide");
    const targetSlide = currentSlide.next();
    let amountMove = slides.index(targetSlide) * 80;

    moveSlides(amountMove, targetSlide, currentSlide);
    updateArrows(targetSlide);
    updateNav(targetSlide);
    clearInterval(carousselInterval);
    carousselInterval = setInterval(moveAuto,8000);
  });

  // move to previous
  prevButton.on("click",e => {
    const currentSlide = $(".current-slide");
    const targetSlide = currentSlide.prev();
    let amountMove = slides.index(targetSlide) * 80;

    moveSlides(amountMove, targetSlide, currentSlide);
    updateArrows(targetSlide);
    updateNav(targetSlide);
    clearInterval(carousselInterval);
    carousselInterval = setInterval(moveAuto,8000);
  })
  // move using nav
  navDots.on("click", e => {
    const pressedDot = $(e.target).closest(".dot");
    const currentDot = $(".current-pos");
    const targetIndex = dots.index(pressedDot);
    const currentSlide = $(".current-slide");
    const targetSlide = $(".caroussel__rail .caroussel__slide:nth-child("+(targetIndex+1)+")");
    let amountMove = slides.index(targetSlide) * 80;

    if(targetIndex != currentDot.index()){
      moveSlides(amountMove, targetSlide, currentSlide);
      updateArrows(targetSlide);
      pressedDot.addClass("current-pos");
      currentDot.removeClass("current-pos");
      clearInterval(carousselInterval);
      carousselInterval = setInterval(moveAuto,8000);
    }
  })
