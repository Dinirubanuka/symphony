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

document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star');
    const ratingContainer = document.getElementById('rating-container');
    const submitBtn = document.getElementById('submitBtn');
    const reviewDescriptionInput = document.getElementById('reviewDescription');
  
    stars.forEach((star) => {
      star.addEventListener('click', () => {
        const ratingValue = star.dataset.rating;
        updateStars(ratingValue);
      });
    });
  
    submitBtn.addEventListener('click', () => {
      const selectedRating = document.querySelector('.star.active').dataset.rating;
      const reviewDescription = reviewDescriptionInput.value;
      
      alert(`You've rated the product ${selectedRating} stars and your review is: ${reviewDescription}`);
      
      // This is where you'd send the review data to the server
      // You can use the 'selectedRating' and 'reviewDescription' variables
    });
  
    function updateStars(rating) {
      stars.forEach((star) => {
        if (star.dataset.rating <= rating) {
          star.classList.add('active');
        } else {
          star.classList.remove('active');
        }
      });
    }
  });
  