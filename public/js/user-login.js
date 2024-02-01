let hamMenuIcon = document.getElementById("ham-menu");
let navBar = document.getElementById("nav-bar");
let navLinks = navBar.querySelectorAll("li");
let headerText = document.querySelector(".col-2");

hamMenuIcon.addEventListener("click", () => {
    navBar.classList.toggle("active");
    hamMenuIcon.classList.toggle("fa-times");
    // hideIcon
    headerText.style.display = headerText.style.display === "none" ? "block" : "none";
});

navLinks.forEach((navLinks) => {
    navLinks.addEventListener("click", () => {
        navBar.classList.remove("active");
        hamMenuIcon.classList.toggle("fa-times");
    });
});