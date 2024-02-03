<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>

    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Inter", sans-serif;
    }

    :root {
      --dark-grey: #333333;
      --medium-grey: #636363;
      --light-grey: #eeeeee;
      --ash: #f4f4f4;
      --primary-color: #2b72fb;
      --white: white;
      --border: 1px solid var(--light-grey);
      --shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px,
      rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    }

    body {
      font-family: inherit;
      /* background-color: var(--white); */
      color: var(--dark-grey);
      letter-spacing: -0.4px;
      height: 100vh;
      /* display: grid; */
      background-image: url(<?php echo mdbg; ?>);
      background-size: cover;
      background-position: center;
    }

    ul {
      list-style: none;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    button {
      border: none;
      background-color: transparent;
      cursor: pointer;
      color: inherit;
    }

    .btn {
      display: block;
      background-color: var(--primary-color);
      color: var(--white);
      text-align: center;
      padding: 0.6rem 1.4rem;
      font-size: 1rem;
      font-weight: 500;
      border-radius: 5px;
    }

    .icon {
      padding: 0.5rem;
      background-color: var(--light-grey);
      border-radius: 10px;
    }

    .logo {
      margin-right: 1.5rem;
      color: #fff;
    }

    #nav-menu {
      /* border-bottom: var(--border); */
      background-color: rgba(0,0,0,0.2);
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      max-width: 1600px;
      margin: 0 auto;
      column-gap: 2rem;
      height: 90px;
      padding: 1.2rem 3rem;

    }

    .menu {
      position: relative;
      background: rgba(0,0,0,0.2);
      color: white;
    }

    .menu-bar li:first-child .dropdown {
      flex-direction: initial;
      min-width: 480px;
    }

    .menu-bar li:first-child ul:nth-child(1) {
      border-right: var(--border);
    }

    .menu-bar li:nth-child(n + 2) ul:nth-child(1) {
      border-bottom: var(--border);
    }

    .menu-bar .dropdown-link-title {
      font-weight: 600;
    }

    .menu-bar .nav-link {
      font-size: 1rem;
      font-weight: 500;
      letter-spacing: -0.6px;
      padding: 0.3rem;
      min-width: 60px;
      margin: 0 0.6rem;
    }

    .menu-bar .nav-link:hover,
    .dropdown-link:hover {
      color: var(--primary-color);
    }

    .nav-start,
    .nav-end,
    .menu-bar,
    .right-container,
    .right-container .search {
      display: flex;
      align-items: center;
    }
    .search input[type="search"]{
      background: rgba(0, 0, 0, 0.5);
      color: white;
    }
    .search input[type="search"]::placeholder {
      color: white; /* Placeholder text color */
    }
    .search .bx-search {
      color: white;
    }

    .dropdown {
      display: flex;
      flex-direction: column;
      min-width: 230px;
      background-color: var(--white);
      border-radius: 10px;
      position: absolute;
      top: 36px;
      z-index: 1;
      visibility: hidden;
      opacity: 0;
      transform: scale(0.97) translateX(-5px);
      transition: 0.1s ease-in-out;
      box-shadow: var(--shadow);
    }

    .dropdown.active {
      background: rgba(0,0,0,0.2);
      visibility: visible;
      color:white;
      opacity: 1;
      transform: scale(1) translateX(5px);
    }

    .dropdown ul {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
      padding: 1.2rem;
      font-size: 0.95rem;
    }

    .dropdown-btn {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 0.15rem;
    }

    .dropdown-link {
      display: flex;
      gap: 0.5rem;
      padding: 0.5rem 0;
      border-radius: 7px;
      transition: 0.1s ease-in-out;
    }

    .dropdown-link p {
      font-size: 0.8rem;
      color: var(--medium-grey);
    }

    .right-container {
      display: flex;
      align-items: center;
      column-gap: 1rem;
    }

    .right-container .search {
      position: relative;
    }

    .right-container img {
      border-radius: 50%;
    }

    .search input {
      background-color: var(--ash);
      border: none;
      border-radius: 6px;
      padding: 0.7rem;
      padding-left: 2.4rem;
      font-size: 16px;
      width: 100%;
      border: var(--border);
    }

    .search .bx-search {
      position: absolute;
      left: 10px;
      top: 50%;
      font-size: 1.3rem;
      transform: translateY(-50%);
      opacity: 0.6;
    }

    #hamburger {
      display: none;
      padding: 0.1rem;
      margin-left: 1rem;
      font-size: 1.9rem;
    }

    @media (max-width: 1100px) {
      #hamburger {
        display: block;
      }

      .container {
        padding: 1.2rem;
      }

      .menu {
        display: none;
        position: absolute;
        top: 87px;
        left: 0;
        min-height: 100vh;
        width: 100vw;
      }

      .menu-bar li:first-child ul:nth-child(1) {
        border-right: none;
        border-bottom: var(--border);
      }

      .dropdown {
        display: none;
        min-width: 100%;
        border: none !important;
        border-radius: 5px;
        position: static;
        top: 0;
        left: 0;
        visibility: visible;
        opacity: 1;
        transform: none;
        box-shadow: none;
      }

      .menu.show,
      .dropdown.active {
        display: block;
      }

      .dropdown ul {
        padding-left: 0.3rem;
      }

      .menu-bar {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        row-gap: 1rem;
        padding: 1rem;
      }

      .menu-bar .nav-link {
        display: flex;
        justify-content: space-between;
        width: 100%;
        font-weight: 600;
        font-size: 1.2rem;
        margin: 0;
      }

      .menu-bar li:first-child .dropdown {
        min-width: 100%;
      }

      .menu-bar > li:not(:last-child) {
        padding-bottom: 0.5rem;
        border-bottom: var(--border);
      }
    }

    @media (max-width: 600px) {
      .right-container {
        display: none;
      }
    }

  </style>
  <link
          href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
          rel="stylesheet"/>
  <title>Dashboard</title>
</head>
<body>
<header id="nav-menu" aria-label="navigation bar">
  <div class="container">
    <div class="nav-start">
      <a class="logo" href="/">
        <img
                src="<?php echo logo; ?>"
                width="35"
                height="35"
                alt="Inc Logo"
        />
      </a>
      <nav class="menu">
        <ul class="menu-bar">
          <li>
            <button
                    class="nav-link dropdown-btn"
                    data-dropdown="dropdown1"
                    aria-haspopup="true"
                    aria-expanded="false"
                    aria-label="browse"
            >
              Quick Access
              <i class="bx bx-chevron-down" aria-hidden="true"></i>
            </button>
            <div id="dropdown1" class="dropdown">
              <ul role="menu">
                <li role="menuitem">
                  <a class="dropdown-link" href="#best-of-the-day">
                    <div>
                          <span class="dropdown-link-title"
                          >Function 01</span
                          >
                    </div>
                  </a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#featured-streams">
                    <div>
                          <span class="dropdown-link-title"
                          >Function 02</span
                          >
                    </div>
                  </a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#subscriptions">
                    <div>
                      <span class="dropdown-link-title">Function 03</span>
                    </div>
                  </a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#creative-feed">
                    <div>
                      <span class="dropdown-link-title">Function 04</span>
                    </div>
                  </a>
                </li>
              </ul>

              <ul role="menu">
                <li class="dropdown-title">
                  <span class="dropdown-link-title">Moderator Specific</span>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#adobe-xd">
                  Function 01
                  </a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#after-effect">
                  Function 02
                  </a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#sketch">
                  Function 03
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- <li>
            <button
                    class="nav-link dropdown-btn"
                    data-dropdown="dropdown2"
                    aria-haspopup="true"
                    aria-expanded="false"
                    aria-label="discover"
            >
              Discover
              <i class="bx bx-chevron-down" aria-hidden="true"></i>
            </button>
            <div id="dropdown2" class="dropdown">
              <ul role="menu">
                <li>
                  <span class="dropdown-link-title">Browse Categories</span>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#branding">Branding</a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#illustrations"
                  >Illustration</a
                  >
                </li>
              </ul>
              <ul role="menu">
                <li>
                  <span class="dropdown-link-title">Download App</span>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#mac-windows"
                  >MacOS & Windows</a
                  >
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#linux">Linux</a>
                </li>
              </ul>
            </div>
          </li> -->
          <li><a class="nav-link" href="<?php echo URLROOT; ?>/moderators/eventpackage">Event Packages</a></li>
          <li><a class="nav-link" href="/">Function 06</a></li>
          <li><a class="nav-link" href="/">About</a></li>
        </ul>
      </nav>
    </div>
    <div class="nav-end">
      <div class="right-container">
        <form class="search" role="search">
          <input type="search" name="search" placeholder="Search" />
          <i class="bx bx-search" aria-hidden="true"></i>
        </form>

        <a href="<?php echo URLROOT; ?>/moderators/profile">
          <img
                  src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=740&t=st=1695596792~exp=1695597392~hmac=a97f49fa9b5bcfc036ff0d5265cf9de48ccaf84f06e2c2ae4fbec0d753c343e3"
                  width="30"
                  height="30"
                  alt="user image"
          />
        </a>
        <a class="btn btn-primary" href="<?php echo URLROOT; ?>/moderators/logout">Log out</a>
      </div>

      <button
              id="hamburger"
              aria-label="hamburger"
              aria-haspopup="true"
              aria-expanded="false"
      >
        <i class="bx bx-menu" aria-hidden="true"></i>
      </button>
    </div>
  </div>
</header>
<div class="bigClass">

</div>
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
