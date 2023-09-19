let slides = document.getElementById('slides');
let slidesCount = slides.childElementCount;
let maxSlides = document.getElementById('maxSlides');
let currentSlide = document.getElementById('currentSlide');


let stepSlidesContainer = document.getElementById("slides-step");
let stepSlidesCount = stepSlidesContainer.childElementCount;

let stepSlides = document.getElementById("stepSlides")

let currentStepsSlide = document.getElementById("stepSlide")

maxSlides.innerHTML = slidesCount;
stepSlides.innerHTML = stepSlidesCount


// Swiper

const swiper = new Swiper('.swiper1', {
    direction: 'horizontal',
    spaceBetween: 20,

    pagination: {
        el: '.swiper-custom-pagination',
        clickable: true,
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    }
});

currentSlide.innerHTML = swiper.activeIndex + 1;

let writeCurrentSlide = () => {
    let number = swiper.activeIndex;
    currentSlide.innerHTML = number + 1;
}

swiper.on("transitionEnd", writeCurrentSlide);


// Accordion

let acc = document.getElementsByClassName("accordion");

for (let i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    let panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
      panel.style.marginBottom = 0;

    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
      panel.style.marginBottom = 30 + "px"
    }
  });
}





// Second Swiper

const swiper2 = new Swiper('.swiper2', {
  direction: 'horizontal',
  spaceBetween: 20,

  navigation: {
      nextEl: '.swiper-button-next2',
      prevEl: '.swiper-button-prev2',
  }
});

let writeCurrentStepsSlide = () => {
  let number = swiper2.activeIndex;
  currentStepsSlide.innerHTML = number + 1;
}

swiper2.on("transitionEnd", writeCurrentStepsSlide)