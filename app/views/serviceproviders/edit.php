<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-edit.css"/>
  <title>UserProfile</title>
</head>
<body>
<!-----------edit-nav-bar-------->
<?php require_once APPROOT . '/views/inc/sp-edit-nav.php'; ?>
<!--------body-------->
<form action="<?php echo URLROOT; ?>/serviceproviders/edit" class="form" method="post">
  <div class="input-box">
    <label>Full Name</label>
    <input type="text" name="business_name" class="<?php echo (!empty($data['business_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_name']; ?>">
    <span class="invalid-feedback"><?php echo $data['business_name_err']; ?></span>
  </div>

  <div class="input-box">
    <label>Email Address</label>
    <input type="email" name="business_email" class="<?php echo (!empty($data['business_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_email']; ?>">
    <span class="invalid-feedback"><?php echo $data['business_email_err']; ?></span>
  </div>

  <div class="column">
    <div class="input-box">
      <label>Phone Number</label>
      <input type="number" name="business_contact_no" class="<?php echo (!empty($data['business_contact_no_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_contact_no']; ?>">
      <span class="invalid-feedback"><?php echo $data['business_contact_no_err']; ?></span>
    </div>
  </div>
  <div class="input-box">
    <label>Address</label>
    <input type="text" name="business_address" class="<?php echo (!empty($data['business_address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_address']; ?>">
    <span class="invalid-feedback"><?php echo $data['business_address_err']; ?></span><br><br>
  </div>

<div class="input-box">
  <label>Owner Name</label>
  <input type="text" name="owner_name" class="<?php echo (!empty($data['owner_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_name']; ?>">
  <span class="invalid-feedback"><?php echo $data['owner_name_err']; ?></span><br><br>
</div>

<div class="input-box">
  <label>Owner Email</label>
  <input type="email" name="owner_email" class="<?php echo (!empty($data['owner_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_email']; ?>">
  <span class="invalid-feedback"><?php echo $data['owner_email_err']; ?></span><br><br>
</div>

<div class="input-box ">
  <label>Owner Address</label>
  <input type="text" name="owner_address" class="<?php echo (!empty($data['owner_address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_address']; ?>">
  <span class="invalid-feedback"><?php echo $data['owner_address_err']; ?></span><br><br>
</div>

<div class="input-box address">
  <label>Owner contact Number</label>
  <input type="number" name="owner_contact_no" class="<?php echo (!empty($data['owner_contact_no_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_contact_no']; ?>">
  <span class="invalid-feedback"><?php echo $data['owner_contact_no_err']; ?></span><br><br>
</div>

<div class="input-box address">
  <label>About</label>
  <input type="text" name="about" class="<?php echo (!empty($data['about_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['about']; ?>">
  <span class="invalid-feedback"><?php echo $data['about_err']; ?></span><br><br>
  <button>Submit</button>
</div>
</form>
<script>
  // script.js
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

</script>
</body>
</html>
