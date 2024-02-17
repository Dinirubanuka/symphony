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
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Ysabeau+SC:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@600&display=swap" rel="stylesheet"> -->
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
  /* background-color: rgba(0,0,0,0.2); */
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
nav h1 {
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
  /* html {
    font-size: 50%;
  } */
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

/* -----form----- */

 @import url(https://fonts.googleapis.com/css?family=Roboto:300);
header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  /* border:1px solid black; */
  width: 50%;
  padding: 8% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
  margin-bottom: 26px;
}
.login-page .form .login .login-header h3{
  font-size: 4rem;
  text-align: center;
}

.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  width: 60%;
  margin: 10% auto ;
  padding: 45px;
  /* text-align: center; */
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 10px 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  /* background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b); */
  background: rgb(47,7,68);
  background: linear-gradient(90deg, rgba(47,7,68,1) 15%, rgba(128,58,152,1) 55%, rgba(64,7,84,1) 89%);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  margin:10px 0;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #270b30;
  text-decoration: none;
}
/* .container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
} */
.is-invalid {
  border-color: #dc3545; /* Red border color */
  background-color: #f8d7da; /* Light red background color */
  color: #dc3545; /* Red text color */
}
.form .invalid-feedback{
  text-align:left;
  /* border: 1px solid red; */
  color:#dc3545;
  margin:10px 0;
}
body {
  /* background-image: url(<?php echo BackgroundImageURL; ?>);
  background-size: cover;
  background-position: center; */
  /* height: 100vh;  */
  /* background-color: #328f8a; */
  /* font-family: "Roboto", sans-serif; */
  /* -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; */
  /* background-color: #330033; */
  /* background-image: linear-gradient(45deg, #1a001a, #200d33, #1f0a59, #2b1073); */
background: rgb(47,7,68);
background: linear-gradient(90deg, rgba(47,7,68,1) 32%, rgba(95,12,110,1) 100%);
}

</style>
  </head>
  <body>
    <header>
      <nav>
        <a href="<?php echo URLROOT; ?>/pages" id="logo">Site Logo</a>
        <i class="fas fa-bars" id="ham-menu"></i>
        <!-- <ul id="nav-bar">
          <li>
            <a href="<?php echo URLROOT; ?>/moderators/login">Login</a>
          </li>
          <li>
            <a href="<?php echo URLROOT; ?>/moderators/register">Register</a>
          </li>
        </ul> -->
      </nav>
    </header>
    <div class="login-page">
        <div class="form">
          <div class="login">
            <div class="login-header">
              <h3>MODERATOR LOGIN</h3>
            </div>
          </div>
          <form action="<?php echo URLROOT; ?>/moderators/login" method="post">
          <input type="moderator_email" placeholder="E-mail" name="moderator_email" class="<?php echo (!empty($data['moderator_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['moderator_email']; ?>">
          <span class="invalid-feedback"><?php echo $data['moderator_email_err']; ?></span>
        <input type="password" placeholder="Password" name="password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            <button>login</button>
          </form>
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

