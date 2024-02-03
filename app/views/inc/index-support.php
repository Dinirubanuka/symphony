
<header id="nav-menu" aria-label="navigation bar" class="nav-menu">
    <div class="container">
        <div class="nav-start">
            <a class="logo" href="http://localhost/symphony/users/index">
                <img
                    src="<?php echo logo; ?>"
                    width="35"
                    height="35"
                    alt="Inc Logo"
                />
            </a>
            <nav class="menu">
                <ul class="menu-bar">
                    <li><a class="nav-link" href="<?php echo URLROOT; ?>/users/contactsupport">Contact Support</a></li>
                </ul>
            </nav>
        </div>
        <div class="nav-end">
            <div class="right-container">
                 <a href="<?php echo URLROOT; ?>/users/index">
                    <i class="fa fa-arrow-left" aria-hidden="true" style="color: white;"></i>
                </a>
                <a href="<?php echo URLROOT; ?>/users/profile">
                    <img
                        src="<?php echo URLROOT; ?>/img/user.png"
                        width="30"
                        height="30"
                        alt="user image"
                    />
                </a>
                <a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/logout">Log out</a>
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