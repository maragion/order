let slides = document.getElementById('slides');
let slidesCount = slides.childElementCount;
let maxSlides = document.getElementById('maxSlides');
let currentSlide = document.getElementById('currentSlide');

maxSlides.innerHTML = slidesCount;


// Swiper

const swiper = new Swiper('.swiper', {
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
let i;

for (i = 0; i < acc.length; i++) {
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

