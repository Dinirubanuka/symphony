<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instrument</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/instrument.css">
</head>
<body>
<!--navigation bar-->

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
                    <li><a class="nav-link" href="/">Bookmarks</a></li>
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
                <div class="cart">
                    <i class="fa-solid fa-cart-plus"></i>
                </div>
                <div class="notification">
                    <i class="fa-solid fa-bell"></i>
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
<div class="categories">
    <div class="category" onclick="toggleCategory('stringInstruments')">
        <div class="category-name">String Instruments</div>
        <ul class="equipment-list" id="stringInstruments">
            <li class="equipment-item"><input type="checkbox"> Electric Guitars</li>
            <li class="equipment-item"><input type="checkbox"> Acoustic Guitars</li>
            <li class="equipment-item"><input type="checkbox"> Violins</li>
            <li class="equipment-item"><input type="checkbox"> Cellos</li>
            <li class="equipment-item"><input type="checkbox"> Violas</li>
        </ul>
    </div>
    <div class="category" onclick="toggleCategory('woodwindInstruments')">
        <div class="category-name">Woodwind Instruments</div>
        <ul class="equipment-list" id="woodwindInstruments">
            <li class="equipment-item"><input type="checkbox"> Flute</li>
            <li class="equipment-item"><input type="checkbox"> Clarinet</li>
            <li class="equipment-item"><input type="checkbox"> Saxophone</li>
        </ul>
    </div>
    <div class="category" onclick="toggleCategory('brassInstruments')">
        <div class="category-name">Brass Instruments</div>
        <ul class="equipment-list" id="brassInstruments">
            <li class="equipment-item"><input type="checkbox"> Trumpet</li>
            <li class="equipment-item"><input type="checkbox"> Trombone</li>
            <li class="equipment-item"><input type="checkbox"> French Horn</li>
        </ul>
    </div>
    <div class="category" onclick="toggleCategory('percussionInstruments')">
        <div class="category-name" >Percussion Instruments</div>
        <ul class="equipment-list" id="percussionInstruments">
            <li class="equipment-item"><input type="checkbox"> Drums</li>
            <li class="equipment-item"><input type="checkbox"> Cymbals</li>
        </ul>
    </div>
    <div class="category" onclick="toggleCategory('keyboardInstruments')">
        <div class="category-name" >Keyboard Instruments</div>
        <ul class="equipment-list" id="keyboardInstruments">
            <li class="equipment-item"><input type="checkbox"> Piano</li>
            <li class="equipment-item"><input type="checkbox"> Organ</li>
        </ul>
    </div>
    <div class="category" onclick="toggleCategory('audioInstruments')">
        <div class="category-name" >Audio</div>
        <ul class="equipment-list" id="audioInstruments">
            <li class="equipment-item"><input type="checkbox"> Headphones</li>
            <li class="equipment-item"><input type="checkbox"> Receivers</li>
            <li class="equipment-item"><input type="checkbox"> Amplifiers</li>
            <li class="equipment-item"><input type="checkbox"> Speakers</li>
            <li class="equipment-item"><input type="checkbox"> Subwoofers</li>
            <li class="equipment-item"><input type="checkbox"> Tape Deks</li>
            <li class="equipment-item"><input type="checkbox"> Truntables</li>
            <li class="equipment-item"><input type="checkbox"> Microphones</li>
            <li class="equipment-item"><input type="checkbox"> Mixers</li>
            <li class="equipment-item"><input type="checkbox"> Recordings</li>
        </ul>
    </div>
    <div class="category" onclick="toggleCategory('price')">
        <div class="category-name" >Price</div>
        <ul class="equipment-list price" id="price">
            <li class="equipment-item" ><input type="number" style="width: 50px;border: 1px solid #dad7d7;padding: 10px;"></li>
            <li class="equipment-item" style="padding: 10px">-</li>
            <li class="equipment-item"><input type="number" style="width: 50px;border: 1px solid #dad7d7;padding: 10px"></li>
        </ul>
    </div>
    <div class="category sort" >
        <div class="category-name" onclick="toggleCategory('sort')">Sort</div>
        <div class="sort-section">
            <select id="sort">
                <option value="name-asc">Name (A-Z)</option>
                <option value="name-desc">Name (Z-A)</option>
                <option value="price-asc">Price (Low to High)</option>
                <option value="price-desc">Price (High to Low)</option>
                <option value="date-asc">Date Added (Oldest First)</option>
                <option value="date-desc">Date Added (Newest First)</option>
            </select>
        </div>
    </div>

</div>
</div>
<script src="https://kit.fontawesome.com/3376ff6b83.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    function toggleCategory(categoryId) {
        const categoryList = document.getElementById(categoryId);
        if (categoryId === 'price') {
            categoryList.style.display = categoryList.style.display === "none" ? "flex" : "none";
        }else{
            categoryList.style.display = categoryList.style.display === "none" ? "block" : "none";
        }
    }
</script>
</body>
</html>