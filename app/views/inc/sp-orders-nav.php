<header id="nav-menu" aria-label="navigation bar" class="nav-menu">
    <div class="container">
        <div class="nav-start">
            <a class="logo" href="http://localhost/symphony/serviceproviders/index">
                <img
                        src="<?php echo logo; ?>"
                        width="35"
                        height="35"
                        alt="Inc Logo"
                />
            </a>
            <nav class="menu">
                <ul class="menu-bar">
                <li><a  class="nav-link" href="<?php echo URLROOT; ?>/serviceproviders/index">Home</a></li>

                    <li><a class="nav-link" href="<?php echo URLROOT; ?>/serviceproviders/orders">Orders</a></li>
                    <!--                add notification link here-->
                    <li><a href="<?php echo URLROOT; ?>/serviceproviders/profile" class="off">
                            <img
                                    src="<?php echo URLROOT; ?>/img/user.png"
                                    width="30"
                                    height="30"
                                    alt="user image"
                            />
                        </a></li>
                    <li><a class="off btn btn-primary" href="<?php echo URLROOT; ?>/serviceproviders/logout" style="color: black">Log out</a></li>
                </ul>
            </nav>
        </div>
        <div class="nav-end">
            <div class="right-container">
                <form class="search" role="search">
                <input type="text" name="search" id="orderSearch" placeholder="Search orders..." id="search-item"/>
                    <i class="bx bx-search" aria-hidden="true"></i>
                </form>
                <!--                add notification link here-->
                <a href="<?php echo URLROOT; ?>/serviceproviders/profile" class="on">
                    <img
                            src="<?php echo URLROOT; ?>/img/user.png"
                            width="30"
                            height="30"
                            alt="user image"
                    />
                </a>
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