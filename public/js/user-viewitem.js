let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}

function changeRating(){
  let bar_5 = Math.floor((star5/count)*100);
  let bar_4 = Math.floor((star4/count)*100);
  let bar_3 = Math.floor((star3/count)*100);
  let bar_2 = Math.floor((star2/count)*100);
  let bar_1 = Math.floor((star1/count)*100);
  document.getElementById("bar-5").style.width = bar_5 + "%";
  document.getElementById("bar-4").style.width = bar_4 + "%";
  document.getElementById("bar-3").style.width = bar_3 + "%";
  document.getElementById("bar-2").style.width = bar_2 + "%";
  document.getElementById("bar-1").style.width = bar_1 + "%";
  const starRatingWrapper = document.querySelector('.star-rating');
  const frontStars =  document.querySelector('.front-stars');
  const percentage = Math.floor(rating*20) + '%';
  starRatingWrapper.title = percentage;
  frontStars.style.width = percentage;
}
