//elements and variables
const slider = document.querySelector('.carousel__slider');
const prevButton = document.querySelector('.carousel__arrow.left');
const nextButton = document.querySelector('.carousel__arrow.right');
let direction;

//functions
const slidePrev = (e) => {
  direction = 0
  slider.style.transition = "none";
  slider.style.transform = "translateX(-19.76%)";
  slider.prepend(slider.lastElementChild);
  prevButton.removeEventListener("click", slidePrev);
  setTimeout(function() {
    slider.style.transition = "transform 0.1s";
    slider.style.transform = "translateX(0%)";
  }, 50);
}

//buttons
nextButton.addEventListener('click', function(e) {
  direction = 1;
  slider.style.transform = "translateX(-20%)";

  console.dir(slider);
});

prevButton.addEventListener('click', slidePrev);

//transition handler
slider.addEventListener('transitionend', function(e) {
  if (direction == 1) {
    slider.appendChild(slider.firstElementChild);
  }

  slider.style.transition = "none";
  slider.style.transform = "translateX(0)";
  setTimeout(function() {
    slider.style.transition = "transform 0.1s";
    prevButton.addEventListener('click', slidePrev);
  });
});
