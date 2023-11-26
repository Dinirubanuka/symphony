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

  // inventory categories
  function triggerAll(){
    document.getElementById('all').click();
  }
  function triggerElectric(){
    document.getElementById('electricGuitars').click();
  }
  function triggerKeyboard(){
    document.getElementById('keyboard').click();
  }
  function triggerAcoustic(){
    document.getElementById('acousticGuitars').click();
  }
  function triggerAmps(){
    document.getElementById('amps').click();
  }
  function triggerBass(){
    document.getElementById('bassGuitars').click();
  }
  function triggerBand(){
    document.getElementById('bandAndOrchestra').click();
  }
  function triggerHome(){
    document.getElementById('homeAudio').click();
  }

  //delete item
  function DeleteItem() {
    // Display a confirmation dialog
    var confirmed = confirm("Are you sure you want to delete your account?");
    // Check the user's response
    if (confirmed) {
      document.getElementById("button123").click();
    } else {
      alert("Deletion canceled.");
    }
  }

