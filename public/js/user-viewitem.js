const dropdownBtn = document.querySelectorAll(".dropdown-btn");
const dropdown = document.querySelectorAll(".dropdown");
const hamburgerBtn = document.getElementById("hamburger");
const navMenu = document.querySelector(".menu");
const links = document.querySelectorAll(".dropdown a");

function setAriaExpandedFalse() {
  dropdownBtn.forEach((btn) => btn.setAttribute("aria-expanded", "false"));
}

function closeDropdownMenu() {
  dropdown.forEach((drop) => {
    drop.classList.remove("active");
    drop.addEventListener("click", (e) => e.stopPropagation());
  });
}

function toggleHamburger() {
  navMenu.classList.toggle("show");
}

dropdownBtn.forEach((btn) => {
  btn.addEventListener("click", function (e) {
    const dropdownIndex = e.currentTarget.dataset.dropdown;
    const dropdownElement = document.getElementById(dropdownIndex);

    dropdownElement.classList.toggle("active");
    dropdown.forEach((drop) => {
      if (drop.id !== btn.dataset["dropdown"]) {
        drop.classList.remove("active");
      }
    });
    e.stopPropagation();
    btn.setAttribute(
        "aria-expanded",
        btn.getAttribute("aria-expanded") === "false" ? "true" : "false"
    );
  });
});

// close dropdown menu when the dropdown links are clicked
links.forEach((link) =>
    link.addEventListener("click", () => {
      closeDropdownMenu();
      setAriaExpandedFalse();
      toggleHamburger();
    })
);

// close dropdown menu when you click on the document body
document.documentElement.addEventListener("click", () => {
  closeDropdownMenu();
  setAriaExpandedFalse();
});

// close dropdown when the escape key is pressed
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") {
    closeDropdownMenu();
    setAriaExpandedFalse();
  }
});

hamburgerBtn.addEventListener("click", toggleHamburger);
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


