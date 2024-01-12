<nav class="sidebar">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="<?php echo IMGROOT ?>/logo.png" alt="">
            </span>

            <div class="text logo-text">
                <span class="name">Symphony</span>
                <span class="profession">Moderator</span>
            </div>
        </div>


    </header>

    <div class="menu-bar">
        <div class="menu">



            <ul class="menu-links">
                <li class="nav_link">
                    <a href="<?php echo URLROOT; ?>/home/show">
                        <i class='bx bx-home icon'></i>
                        <span class="text nav-text">Home</span>
                    </a>
                </li>

                

                <li id="mod_list" class="nav_link sidebar_mod ">
                    <a href="<?php echo URLROOT; ?>/serviceproviders/show">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Sellers</span>
                        
                    </a>
                </li>
               
                <!-- </ul> -->

                <li class="nav_link">
                    <a href="<?php echo URLROOT; ?>/users/show">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Customers</span>
                    </a>
                </li>

                <ul class="menu-links">
                <li class="nav_link">
                    <a href="<?php echo URLROOT; ?>/home/show">
                        <i class='bx bx-home icon'></i>
                        <span class="text nav-text">User Guidelines</span>
                    </a>
                </li>

                <li class="nav_link">
                    <a href="<?php echo URLROOT; ?>/users/show">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Event Packages</span>
                    </a>
                </li>

                <ul class="menu-links">
                <li class="nav_link">
                    <a href="<?php echo URLROOT; ?>/home/show">
                        <i class='bx bx-home icon'></i>
                        <span class="text nav-text">Contact Admin</span>
                    </a>
                </li>


            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="#">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>

            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>

        </div>
    </div>

</nav>

<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");

    var mod_list = document.getElementById("mod_list");
    var mod_list_pop = document.getElementById("mod_list_pop");
    mod_list_pop.style.height = "0px";

    mod_list.addEventListener("click", function() {
        if (mod_list_pop.style.height === "0px") {
            mod_list_pop.style.height = "105px";
            mod_list_pop.style.visibility = "visible";
            mod_list_pop.style.opacity = "1";
        } else {
            mod_list_pop.style.height = "0px";
            mod_list_pop.style.visibility = "hidden";
            mod_list_pop.style.opacity = "0";
        }
    });




    modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            modeText.innerText = "Light mode";
        } else {
            modeText.innerText = "Dark mode";

        }
    });
</script>