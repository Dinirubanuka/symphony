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
          <li><a class="nav-link" href="<?php echo URLROOT; ?>/serviceproviders/orders">Orders</a></li>
            <li><a class="nav-link" href="<?php echo URLROOT; ?>/serviceproviders/inventory">Inventory</a></li>
            <li><a class="nav-link" href="<?php echo URLROOT; ?>/serviceproviders/additem">Add Item</a></li>
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