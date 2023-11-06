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
      /* background-image: url(<?php echo csbg; ?>); */
      background: linear-gradient(90deg, rgba(47,7,68,1) 32%, rgba(95,12,110,1) 100%);
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
    /*----VIEW----*/

    .flex-outer{
      /* border:1px solid green; */
      display: flex;
      flex-direction: column; 
      justify-content: space-evenly;
      align-items: center;
      /* height: 100vh; */
    }
    .photo-outer{
      /* border:4px solid green; */
      width: 200px;
      height: 200px;
      overflow: hidden;
      /* margin: 0 auto; */
      /* border: 1px solid white; */
      /* border-radius: 60% */
    }
    .photo-inner{
      /* border:1px solid green; */
      width: 100%;
      height: 100%;
      position: relative;
    }
    .photo-inner img{
      border:1px solid green;
      width: 100%;
      height: 100%;
      object-fit:cover;
      border-radius: 50%;
    }
    .photo {
    
    top: 0;
    left: 0;
    }

    .photo:first-child {
      z-index: 1;
    }

    .photo:nth-child(2) {
      position: absolute;
      top:80%;
      left:80%;
      z-index: 2;
      height:40px;
      width:40px;
      /* left: 20px; */
    }
    /* CSS to hide the modal initially */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6); /* Semi-transparent background */
        z-index: 1000;
    }

    .modal-toggled {
        display: block;
    }

    .modal-content {
        position: absolute;
        z-index:100;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 50px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .modal-content a{
        position: absolute;
        right:10px;
        top:10px;
    }

    /* Add more CSS styles as needed for the buttons and other elements */

    .bigClass{
      order: 1px solid white; 
      position: absolute;
      top: 50%;
      top:550px;
      left: 52%;
      transform: translate(-50%, -50%); 
      max-width: 700px;
      width: 100%;
      background: rgba(21, 20, 20, 0.8);
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .input-box label {
      display: grid;
      padding: 2%;
      color: #feffff;
    }
     .bigClass :where(.input-box input) {
      position: relative;
      height: 50px;
      width: 100%;
      outline: none;
      font-size: 1rem;
      color: black;
      margin-top: 8px;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 0 15px;
    }
    .input-box input:focus {
      box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }

    /*.options {*/
    /*    display: none;*/
    /*}*/
    .column {
      display: grid;
      column-gap: 15px;
    }
    .llink{
      display: flex;
      justify-content: space-between;
      /*width: 45%;*/
    }
    form{
        /* border: 1px solid black; */
        /* padding: 5%; */
    }
    .edit-link input[type = "submit"]{
      display: none;
      /* border-radius: 30%;
      background-color: #6e0a41;
      color: white;
      padding: 60%;
      /* left: 10%; */
      /* position: relative; */ */
      position: relative;
      height: 50px;
      width: 100%;
      outline: none;
      font-size: 1rem;
      color: black;
      margin-top: 8px;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 0 15px;
    
    }
    .delete-link input[type = "submit"]{
      display: none;
      /* border-radius: 30%;
      background-color: #6e0a41;
      color: white;
      padding: 30%;
      right: 30%;
      position: relative;
        border: 1px solid black; */
      position: relative;
      height: 50px;
      width: 100%;
      outline: none;
      font-size: 1rem;
      color: black;
      margin-top: 8px;
      /* border: 1px solid #ddd; */
      border-radius: 6px;
      padding: 0 15px;
    }
    .last button {
      /* border: 1px solid green; */
      background-color: #6e0a41
      height: 55px;
      width: 60%;
      color: #fff;
      font-size: 1rem;
      font-weight: 400;
      /* margin-top: 30px; */
      margin-left: 50%;
      /* transform: translate(-50%, -50%); */
      border: none;
      cursor: pointer;
      transition: all 0.2s ease;
      background: rgb(130, 106, 251);
      border-radius: 2rem;
    }
    #button123{
      display:none;
    }
    .editButton{
      padding: 0 15%;
      display:flex;
      align-items: center;
      justify-content: center;
      /* border: 1px solid green; */
      background-color: #6e0a41
      height: 55px;
      width: 50%;
      color: #fff;
      font-size: 1rem;
      font-weight: 400;
      /* margin-top: 30px; */
      /* margin-left: 50%; */
      /* transform: translate(-50%, -50%); */
      border: none;
      cursor: pointer;
      transition: all 0.2s ease;
      background: rgb(130, 106, 251);
      border-radius: 2rem;
      text-align:center;
    }
    .delButton{
      padding: 0 15%;
      display:flex;
      align-items: center;
      justify-content: center;
      /* border: 1px solid green; */
      background-color: #6e0a41
      height: 55px;
      width: 50%;
      color: #fff;
      font-size: 1rem;
      font-weight: 400;
      /* margin-top: 30px; */
      margin-left: 20%;
      /* transform: translate(-50%, -50%); */
      border: none;
      cursor: pointer;
      transition: all 0.2s ease;
      background: rgb(130, 106, 251);
      border-radius: 2rem;
      text-align:center;
    }

  </style>
  <link
          href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
          rel="stylesheet"/>
  <title>Servie Provider Profile</title>
</head>
<body>
<header id="nav-menu" aria-label="navigation bar">
  <div class="container">
    <div class="nav-start">
      <a class="logo" href="<?php echo URLROOT; ?>/serviceproviders">
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
              Browse
              <i class="bx bx-chevron-down" aria-hidden="true"></i>
            </button>
            <div id="dropdown1" class="dropdown">
              <ul role="menu">
                <li role="menuitem">
                  <a class="dropdown-link" href="#best-of-the-day">
                  <img width="48" height="48" src="https://img.icons8.com/emoji/48/folded-hands-emoji.png" alt="folded-hands-emoji"/>
                    <div>
                          <span class="dropdown-link-title"
                          >Best of the day</span
                          >
                      <p>Best deals for today!</p>
                    </div>
                  </a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#featured-streams">
                  <img width="48" height="48" src="https://img.icons8.com/nolan/64/filled-star.png" alt="filled-star"/>
                    <div>
                          <span class="dropdown-link-title"
                          >Featured</span
                          >
                      <p>Featured items today!</p>
                    </div>
                  </a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#subscriptions">
                  <img width="48" height="48" src="https://img.icons8.com/nolan/64/video-playlist.png" alt="video-playlist"/>
                    <div>
                      <span class="dropdown-link-title">Subscriptions</span>
                      <p>Gain exclusive access</p>
                    </div>
                  </a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#creative-feed">
                  <img width="48" height="48" src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/64/external-trending-influencer-marketing-wanicon-lineal-color-wanicon.png" alt="external-trending-influencer-marketing-wanicon-lineal-color-wanicon"/>
                    <div>
                      <span class="dropdown-link-title">Trending</span>
                      <p>See trending purchases</p>
                    </div>
                  </a>
                </li>
              </ul>

              <ul role="menu">
                <li class="dropdown-title">
                  <span class="dropdown-link-title">Browse by service</span>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#adobe-xd">
                  <img width="40" height="40" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-studio-coworking-space-flaticons-lineal-color-flat-icons-3.png" alt="external-studio-coworking-space-flaticons-lineal-color-flat-icons-3"/>
                    Studios
                  </a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#after-effect">
                  <img width="40" height="40" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-band-music-flaticons-lineal-color-flat-icons-2.png" alt="external-band-music-flaticons-lineal-color-flat-icons-2"/>
                    Bands
                  </a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#sketch">
                  <img width="40" height="40" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-band-event-management-flaticons-lineal-color-flat-icons.png" alt="external-band-event-management-flaticons-lineal-color-flat-icons"/>
                    Equipment
                  </a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#indesign">
                  <img width="40" height="40" src="https://img.icons8.com/ios/50/guitarist.png" alt="guitarist"/>
                    Solo Musicians
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
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
                  <a class="dropdown-link" href="#branding">Renting</a>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#illustrations"
                  >Hiring</a
                  >
                </li>
              </ul>
              <ul role="menu">
                <li>
                  <span class="dropdown-link-title">For You</span>
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#mac-windows"
                  >New in our Platform</a
                  >
                </li>
                <li role="menuitem">
                  <a class="dropdown-link" href="#linux">Recomendations</a>
                </li>
              </ul>
            </div>
          </li>
          <li><a class="nav-link" href="/">Orders</a></li>
          <li><a class="nav-link" href="/">Inventory</a></li>
          <li><a class="nav-link" href="/">About</a></li>
        </ul>
      </nav>
    </div>
    <div class="nav-end">
      <div class="right-container">
<!--        <a href="#profile">-->
<!--          <img-->
<!--                  src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=740&t=st=1695596792~exp=1695597392~hmac=a97f49fa9b5bcfc036ff0d5265cf9de48ccaf84f06e2c2ae4fbec0d753c343e3"-->
<!--                  width="30"-->
<!--                  height="30"-->
<!--                  alt="user image"-->
<!--          />-->
<!--        </a>-->
        <a class="btn btn-primary" href="<?php echo URLROOT; ?>/serviceproviders/index">Back</a>
        <a class="btn btn-primary" id="logout" onclick="Logout()">Log out</a>
        
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
<!--------body-------->
<div class="flex-outer">
  <div class="photo-outer">
        <div class="photo-inner">
          <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $data['photo']?>" alt="user image" class = "photo" id="photo-1"/>
          <img src="<?php echo URLROOT; ?>/img/camera_10762333.png" alt="camera-icon"  class = "photo" id="photo-1" onclick="myfunc()"/>
        </div>
  </div>
    <!------options------->
    <div class="modal" id="options-modal">
        <div class="modal-content">
            <a href="#" onclick="myfunc()">X</a>
            <form action="<?php echo URLROOT; ?>/serviceproviders/profilePhotoUpdate"  method="post" enctype="multipart/form-data">
              <input type="file" id="photo" accept=".jpg, .jpeg, .png, .HEIC" name="photo" class="<?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['image']; ?>">
              <input type="submit" value="Upload" id="upload-btn"/>
            </form>
            <br><br>
            <button class="delete-btn" id="delete-btn" onclick="confirmDelete()">Delete</button>
        </div>
    </div>
<div class = "bigClass">
    <div class="input-box">
      <label>Business Name: <?php echo $data['business_name']; ?></label>
    </div>

    <div class="input-box">
      <label>Email Address: <?php echo $data['business_email']; ?></label>
    </div>

    <div class="column">
      <div class="input-box">
        <label>Phone Number: <?php echo $data['business_contact_no']; ?></label>
      </div>
      <div class="input-box">
        <label>Address: <?php echo $data['business_address']; ?></label>
      </div>
    <div class="input-box">
      <label>Owner Name: <?php echo $data['owner_name']; ?></label>
    </div>

    <div class="input-box">
      <label>Owner Email Address: <?php echo $data['owner_email']; ?></label>
    </div>

      <div class="input-box">
        <label>Owner Phone Number: <?php echo $data['owner_contact_no']; ?></label>
      </div>
      <div class="input-box">
        <label>Personal Address: <?php echo $data['owner_address']; ?></label>
      </div>
      <div class="input-box">
        <label>About: <?php echo $data['about']; ?></label>
      </div>

      <div class="llink">
        <form action = "<?php echo URLROOT; ?>/serviceproviders/editDetail/<?php echo $_SESSION['serviceprovider_id']; ?>" method ="post">
            <div class = "edit-link">
            <input type = "submit" value = "edit" id = "editButton">
            </div>
        </form>
        <div class="editButton" onclick="EditAcc()" id = "editButton">Edit Details</div>

        <form action = "<?php echo URLROOT; ?>/serviceproviders/delete" method ="post" class="last">
            <div class = "delete-link">
            <input type = "submit" value = "delete" id="button123">
            </div>
        </form>
        <div class="delButton" onclick="DeleteAcc()" id = "delButton">Remove account</div>
      </div>
</div>
</div>

</div>
<script>
  // script.js
  const dropdownBtn = document.querySelectorAll(".dropdown-btn");
  const dropdown = document.querySelectorAll(".dropdown");
  const hamburgerBtn = document.getElementById("hamburger");
  const navMenu = document.querySelector(".menu");
  const links = document.querySelectorAll(".dropdown a");


  function myfunc() {
    var element1, element2, element2;
    element1 = document.querySelector('.modal');
    element1.classList.toggle("modal-toggled");
  }

//delete Account
function DeleteAcc() {
  // Display a confirmation dialog
  var confirmed = confirm("Are you sure you want to delete your account?");
  
  // Check the user's response
  if (confirmed) {
    document.getElementById("button123").click();
    alert("Account deleted.");
  } else {
    alert("Deletion canceled.");
  }
}

//edit Account
function EditAcc(){
  // Display a confirmation dialog
  var confirmed = confirm("Are you sure you want to edit details your account?");
  
  // Check the user's response
  if (confirmed) {
    document.getElementById("editButton").click();
  } 
}

//delete photo
  function confirmDelete() {
  // Display a confirmation dialog
  var confirmed = confirm("Are you sure you want to delete this item?");
  
  // Check the user's response
  if (confirmed) {
    document.getElementById("upload-btn").click();
    alert("Item deleted.");
  } else {
    alert("Deletion canceled.");
  }
}

//logout account
function Logout() {
  // Display a confirmation dialog
  var confirmed = confirm("Are you sure you want to logout?");
  
  // Check the user's response
  if (confirmed) {
    window.location.href = "<?php echo URLROOT; ?>/serviceproviders/logout";
    alert("Logged out.");
  } else {
    alert("Logout canceled.");
  }
  
}

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
</script>
</body>
</html>
