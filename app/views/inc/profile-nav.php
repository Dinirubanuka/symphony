
<header id="nav-menu" aria-label="navigation bar">
  <div class="container">
    <div class="nav-start">
      <a class="logo" href="<?php echo URLROOT; ?>/users">
        <img
                src="<?php echo logo; ?>"
                width="35"
                height="35"
                alt="Inc Logo"
                    />
      </a>
      <nav class="menu">
        <ul class="menu-bar">
            <li><a  class="nav-link" href="<?php echo URLROOT; ?>/users/index">Home</a></li>
            <li>
            <button
                    class="nav-link dropdown-btn"
                    data-dropdown="dropdown2"
                    aria-haspopup="true"
                    aria-expanded="false"
                    aria-label="discover">category
              <i class="bx bx-chevron-down" aria-hidden="true"></i>
            </button>
              <div id="dropdown2" class="dropdown">
                  <ul role="menu">
                      <li role="menuitem">
                          <a class="dropdown-link" href="<?php echo URLROOT; ?>/users/Instrument">Instrument</a>
                      </li>
                      <li role="menuitem">
                          <a class="dropdown-link" href="<?php echo URLROOT; ?>/users/Studio">Studio</a>
                      </li>
                      <li role="menuitem">
                          <a class="dropdown-link" href="<?php echo URLROOT; ?>/users/Singer"
                          >Singer</a
                          >
                      </li>
                      <li role="menuitem">
                          <a class="dropdown-link" href="<?php echo URLROOT; ?>/users/Band">Band</a>
                      </li>
                      <li role="menuitem">
                          <a class="dropdown-link" href="<?php echo URLROOT; ?>/users/Musicians
">Musicians</a>
                      </li>
                  </ul>
              </div>
          </li>
            <li><a class="nav-link" href="<?php echo URLROOT; ?>/users/orders">Orders</a></li>
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
        <a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/index">Back</a>
        <a class="btn btn-primary" id="logout" onclick="Logout()" >Log out</a>

      </div>

      <button
              id="hamburger"
              aria-label="hamburger"
              aria-haspopup="true"
              aria-expanded="false">
        <i class="bx bx-menu" aria-hidden="true"></i>
      </button>
    </div>
  </div>
</header>