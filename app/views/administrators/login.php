<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo SITENAME?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-login.css">
  </head>
  <body>
    <header>
      <nav>
        <a href="<?php echo URLROOT; ?>/pages" id="logo">Site Logo</a>
      </nav>
    </header>
    <div class="login-page">
        <div class="form">
          <div class="login">
            <div class="login-header">
              <h3>ADMINISTRATOR LOGIN</h3>
            </div>
          </div>
          <form action="<?php echo URLROOT; ?>/administrators/login" method="post">
          <input type="admin_email" placeholder="E-mail" name="admin_email" class="<?php echo (!empty($data['admin_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['admin_email']; ?>">
          <span class="invalid-feedback"><?php echo $data['admin_email_err']; ?></span>
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

