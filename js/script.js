//Slideshow js
let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 4000);
}

var slideIndex1 = 1;
showSlides(slideIndex1);

function plusSlides(n) {
    showSlides(slideIndex1 += n);
}

function currentSlide(n) {
    showSlides(slideIndex1 = n);
}


//on going bids carousal
document.addEventListener("DOMContentLoaded", function() {
  const container = document.querySelector('.carousel-container');
  const products = document.querySelectorAll('.product');

  let index = 0;
  const productWidth = products[0].offsetWidth;
  const totalProducts = products.length;

  function showProduct() {
    container.style.transform = `translateX(-${index * productWidth}px)`;
  }

  function nextProduct() {
    index++;
    if (index >= totalProducts) {
      index = 0;
    }
    showProduct();
  }

  setInterval(nextProduct, 3000);
});
