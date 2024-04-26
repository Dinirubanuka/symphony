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

                    <li>
                        <button
                                class="nav-link dropdown-btn"
                                data-dropdown="dropdown2"
                                aria-haspopup="true"
                                aria-expanded="false"
                                aria-label="discover"
                        >
                            category
                            <i class="bx bx-chevron-down" aria-hidden="true"></i>
                        </button>
                        <div id="dropdown2" class="dropdown">
                            <ul role="menu">
                                <li role="menuitem">
                                    <a class="dropdown-link" href="<?php echo URLROOT; ?>/serviceproviders/Instrument">Instrument</a>
                                </li>
                                <li role="menuitem">
                                    <a class="dropdown-link" href="<?php echo URLROOT; ?>/serviceproviders/Studio">Studio</a>
                                </li>
                                <li role="menuitem">
                                    <a class="dropdown-link" href="<?php echo URLROOT; ?>/serviceproviders/Singer"
                                    >Singer</a
                                    >
                                </li>
                                <li role="menuitem">
                                    <a class="dropdown-link" href="<?php echo URLROOT; ?>/serviceproviders/Band">Band</a>
                                </li>
                                <li role="menuitem">
                                    <a class="dropdown-link" href="<?php echo URLROOT; ?>/serviceproviders/Musicians
">Musicians</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="nav-link" href="<?php echo URLROOT; ?>/serviceproviders/orders">Orders</a></li>
                    <li><a class="nav-link" href="<?php echo URLROOT; ?>/serviceproviders/inventory">Inventory</a></li>
                    <li><a class="nav-link" href="<?php echo URLROOT; ?>/serviceproviders/additem">Add Instrument</a></li>
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
                    <input type="search" name="search" placeholder="Search" id="search-item"/>
                    <i class="bx bx-search" aria-hidden="true"></i>
                </form>
                <a href="<?php echo URLROOT; ?>/serviceproviders/index">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </a>
                <div class = "notifications">

                </div>
                <a href="<?php echo URLROOT; ?>/serviceproviders/profile">
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