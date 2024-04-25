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
                                    <img width="48" height="48"
                                             src="https://img.icons8.com/emoji/48/folded-hands-emoji.png"
                                             alt="folded-hands-emoji"/>
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
                                    <img width="48" height="48"
                                             src="https://img.icons8.com/nolan/64/filled-star.png" alt="filled-star"/>
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
                                    <img width="48" height="48"
                                             src="https://img.icons8.com/nolan/64/video-playlist.png"
                                             alt="video-playlist"/>
                                        <div>
                                            <span class="dropdown-link-title">Subscriptions</span>
                                            <p>Gain exclusive access</p>
                                        </div>
                                    </a>
                                </li>
                                <li role="menuitem">
                                    <a class="dropdown-link" href="#creative-feed">
                                    <img width="48" height="48"
                                             src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/64/external-trending-influencer-marketing-wanicon-lineal-color-wanicon.png"
                                             alt="external-trending-influencer-marketing-wanicon-lineal-color-wanicon"/>
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
                                    <img width="40" height="40"
                                             src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-studio-coworking-space-flaticons-lineal-color-flat-icons-3.png"
                                             alt="external-studio-coworking-space-flaticons-lineal-color-flat-icons-3"/>
                                        Studios
                                    </a>
                                </li>
                                <li role="menuitem">
                                    <a class="dropdown-link" href="#after-effect">
                                    <img width="40" height="40"
                                             src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-band-music-flaticons-lineal-color-flat-icons-2.png"
                                             alt="external-band-music-flaticons-lineal-color-flat-icons-2"/>
                                        Bands
                                    </a>
                                </li>
                                <li role="menuitem">
                                    <a class="dropdown-link" href="#sketch">
                                    <img width="40" height="40"
                                             src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-band-event-management-flaticons-lineal-color-flat-icons.png"
                                             alt="external-band-event-management-flaticons-lineal-color-flat-icons"/>
                                        Equipment
                                    </a>
                                </li>
                                <li role="menuitem">
                                    <a class="dropdown-link" href="#indesign">
                                    <img width="40" height="40" src="https://img.icons8.com/ios/50/guitarist.png"
                                             alt="guitarist"/>
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
                    <li><a class="nav-link" href="<?php echo URLROOT; ?>/users/orders">Orders</a></li>
                    <li><a href="<?php echo URLROOT; ?>/users/index" class="nav-link off">Back</a></li>
                    <li>
                        <div class="cart">

                        </div>
                    </li>

                    <li><a href="<?php echo URLROOT; ?>/users/profile" class="off">
                        <img
                                src="<?php echo URLROOT; ?>/img/user.png"
                                width="30"
                                height="30"
                                alt="user image"
                        />
                        </a></li>
                    <li><a class="off btn btn-primary" href="<?php echo URLROOT; ?>/users/logout" style="color: black">Log out</a></li>
                </ul>
            </nav>
        </div>
        <div class="nav-end">
            <div class="right-container">
                                <form class="search" role="search">
                                    <input type="search" name="search" placeholder="Search" id = "search-item"/>
                                    <i class="bx bx-search" aria-hidden="true"></i>
                                </form>
                                <a href="<?php echo URLROOT; ?>/users/index" class="on">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </a>
                <div class="cart">

                </div>
                <div class="notification">
                
                </div>
                <a href="<?php echo URLROOT; ?>/users/profile" class="on">
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