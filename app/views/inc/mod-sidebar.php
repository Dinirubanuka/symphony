<nav class="sidebar">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="<?php echo URLROOT; ?>/img/logo.png" alt="">
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
                    <a href="<?php echo URLROOT; ?>/moderators/index">
                        <i class='bx bx-home icon'></i>
                        <span class="text nav-text">Home</span>
                    </a>
                </li>

                <li id="mod_list" class="nav_link adminsidebar_mod ">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text"><strong>Sellers</strong></span>
                    </a>
                </li>
                <!-- <ul id="mod_list_pop"> -->
                <li class="nav_link_seller">
                    <a href="<?php echo URLROOT; ?>/moderators/viewActiveSP">
                        <i class='bx bx-user-circle icon'></i>
                        <span class="text nav-text">Active</span>
                    </a>
                </li>
                <li class="nav_link_seller">
                    <a href="<?php echo URLROOT; ?>/moderators/viewRejectedSP">
                        <i class='bx bx-user-check icon'></i>
                        <span class="text nav-text">Rejected</span>
                    </a>
                </li>
                <li class="nav_link_seller">
                    <a href="<?php echo URLROOT; ?>/moderators/viewDeactivatedSP">
                        <i class='bx bx-user-x icon'></i>
                        <span class="text nav-text">Deactivated</span>
                    </a>
                </li>
                <!-- </ul> -->

                <li class="nav_link">
                    <a href="<?php echo URLROOT; ?>/moderators/viewuser">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Customers</span>
                    </a>
                </li>

                <li class="nav_link">
                    <a href="<?php echo URLROOT; ?>/moderators/pendingrequest">
                        <i class='bx bx-chart icon'></i>
                        <span class="text nav-text">New Registrations</span>
                    </a>
                </li>

                <li class="nav_link">
                        <i class='bx bx-bar-chart-alt icon'></i>
                        <span class="text nav-text"><strong>Inquiries</strong></span>
                    </a>
                </li>
                <li class="nav_link_seller">
                    <a href="<?php echo URLROOT; ?>/moderators/pendinginquiries">
                        <i class='bx bx-bell icon'></i>
                        <span class="text nav-text">Pending</span>
                    </a>
                </li>
                <li class="nav_link_seller">
                    <a href="<?php echo URLROOT; ?>/moderators/activeinquiries">
                        <i class='bx bx-star icon'></i>
                        <span class="text nav-text">Active</span>
                    </a>
                </li>
                <li class="nav_link_seller">
                    <a href="<?php echo URLROOT; ?>/moderators/completedinquiries">
                        <i class='bx bx-user-check icon'></i>
                        <span class="text nav-text">Completed</span>
                    </a>
                </li>

                <li class="nav_link">
                    <a href="<?php echo URLROOT; ?>/moderators/eventpackages">
                        <i class='bx bx-notepad icon'></i>
                        <span class="text nav-text">Event Packages</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="<?php echo URLROOT; ?>/moderators/logout">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>

        </div>
    </div>
</nav>

<script>
    const body = document.querySelector('body'),
        adminsidebar = body.querySelector('nav'),
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