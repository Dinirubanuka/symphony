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
                    <li><a  class="nav-link" href="<?php echo URLROOT; ?>/users/index">Home</a></li>
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
                    <li><a class="nav-link" href="/">Bookmarks</a></li>
                    <li><a class="nav-link" href="/">About</a></li>
                </ul>
            </nav>
        </div>
        <div class="nav-end">
            <div class="right-container">
                                <form class="search" role="search">
                                    <input type="search" name="search" placeholder="Search" id = "search-item"/>
                                    <i class="bx bx-search" aria-hidden="true"></i>
                                </form>
                <a href="<?php echo URLROOT; ?>/users/index">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </a>
                <div class="cart">

                </div>
                <div class="notification">
                <button class="notification-btn" id="notificationBtn"><i class="fa-solid fa-bell"></i></button>
                <p class="badge">0</p>    
                <div class="notification-wrapper">
                    <div class="notification-dropdown" id="notificationDropdown">
                        <ul class="notification-list">
                        <!-- Dummy data for notifications -->
                        <li class="notification-item">Notification 1 <button class="close-btn">×</button></li>
                        <li class="notification-item">Notification 2 <button class="close-btn">×</button></li>
                        <li class="notification-item">Notification 3 <button class="close-btn">×</button></li>
                        <li class="notification-item">Notification 4 <button class="close-btn">×</button></li>
                        <li class="notification-item">Notification 5 <button class="close-btn">×</button></li>
                        <!-- End of dummy data -->
                        </ul>
                        <button class="mark-all-as-read-btn">Mark All as Read</button>
                    </div>
                    </div>
                </div>
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