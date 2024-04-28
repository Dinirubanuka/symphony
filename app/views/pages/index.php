<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo SITENAME?></title>
    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Ysabeau+SC:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@600&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <style>
    * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
html {
  font-size: 62.5%;
}
*:not(i) {
  font-family: "Poppins", sans-serif;
}
header {
  position: fixed;
  width: 100%;
  background-color: rgba(0,0,0,0.2);
  padding: 3rem 5rem;
}
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
nav ul {
  list-style: none;
  display: flex;
  gap: 2rem;

}
nav a {
  font-size: 1.8rem;
  text-decoration: none;

}
nav a#logo {
  color: #fff;
 
}
nav ul a {
  color: #fff;

}
nav ul a:hover {
  border-bottom: 2px solid #fff;
}
.row {
  /* border: 1px solid wheat; */
  height: 100vh;
  display: grid;
  grid-template-columns: 1fr 1fr;
  background-image: url(<?php echo BackgroundImageURL; ?>);
  background-size: cover;
  background-position: center;
}
.col-1{
  /* border: 1px solid orange; */
  /* place-self: center; */
}
.col-2{
    /* border: 6px solid green; */
} 
.flex-container{
  /* border: 1px solid white; */
  padding-left:3%;
  display: flex;
  gap: 1rem;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100%;
}
.topic{
  /* border: 1px solid white; */
  font-family: 'Unbounded', sans-serif;
  font-size: 8rem;
  color: rgb(255, 255, 255);
}
.sub-topic{
  /* border: 1px solid white; */
  font-family: 'Unbounded', sans-serif;
  font-size: 4rem;
  color: rgb(255, 255, 255);
}
h1 {
  font-size: 6rem;
  color: rgb(255, 255, 255);
}
#ham-menu {
  display: none;
}
nav ul.active {
  left: 0;
}
@media only screen and (max-width: 991px) {
  html {
    font-size: 56.25%;
  }
  header {
    padding: 2.2rem 5rem;
  }
}
@media only screen and (max-width: 767px) {
  .row {
  /* border: 1px solid wheat; */
  height: 100vh;
  display: block;
  background-image: url(<?php echo ImageUrl; ?>);
  background-size: cover;
  background-position: center;
}
.topic{
  position: absolute;
  top: 40%;
  /* border: 1px solid white; */
  font-size: 5.1rem;
}
.sub-topic{
  position: absolute;
  top: 55%;
  /* border: 1px solid white; */
  font-family: 'Unbounded', sans-serif;
  font-size: 2.1rem;
}
  html {
    font-size: 50%;
  }
  #ham-menu {
    display: block;
    color: #ffff;
  }
  nav a#logo,
  #ham-menu {
    font-size: 3.2rem;
  }
  nav ul {
    background-color: rgb(8, 8, 8);
    position: fixed;
    left: -100vw;
    top: 73.6px;
    width: 100vw;
    height: calc(100vh - 73.6px);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    transition: 2s;
    gap: 0;
  }
  nav ul li{
    border: 1px solid #fff;
  }
}
@media only screen and (max-width: 575px) {
  html {
    font-size: 46.87%;
  }
  header {
    padding: 2rem 3rem;
  }
  nav ul {
    top: 65.18px;
    height: calc(100vh - 65.18px);
  }
}
</style>
  </head>
  <body>
    <header>
      <nav>
          <a class="logo" href="http://localhost/symphony/users/index">
              <img
                      src="<?php echo logo; ?>"
                      width="35"
                      height="35"
                      alt="Inc Logo"
              />
          </a>
        <i class="fas fa-bars" id="ham-menu"></i>
        <ul id="nav-bar">
          <li>
            <a href="<?php echo URLROOT; ?>/users/login">Login</a>
          </li>
          <li>
            <a href="<?php echo URLROOT; ?>/users/register">Register</a>
          </li>
        </ul>
      </nav>
    </header>

    <div class="row">
      <div class="col-1">
        <div class="flex-container">
          <div class="topic">SYMPHONY</div>
          <div class="sub-topic">For all your musical needs</div>
        </div>
      </div> 
      <div class="col-2">
      </div>
    </div>  

    <!-- Script -->
    <script>
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
    </script>
  </body>
</html>