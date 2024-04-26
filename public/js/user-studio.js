const dropdownBtn = document.querySelectorAll(".dropdown-btn");
const dropdown = document.querySelectorAll(".dropdown");
const hamburgerBtn = document.getElementById("hamburger");
const navMenu = document.querySelector(".menu");
const links = document.querySelectorAll(".dropdown a");

function setAriaExpandedFalse() {
    dropdownBtn.forEach((btn) => btn.setAttribute("aria-expanded", "false"));
}

function closeDropdownMenu() {
    dropdown.forEach((drop) => {
        drop.classList.remove("active");
        drop.addEventListener("click", (e) => e.stopPropagation());
    });
}

function toggleHamburger() {
    navMenu.classList.toggle("show");
}

dropdownBtn.forEach((btn) => {
    btn.addEventListener("click", function (e) {
        const dropdownIndex = e.currentTarget.dataset.dropdown;
        const dropdownElement = document.getElementById(dropdownIndex);

        dropdownElement.classList.toggle("active");
        dropdown.forEach((drop) => {
            if (drop.id !== btn.dataset["dropdown"]) {
                drop.classList.remove("active");
            }
        });
        e.stopPropagation();
        btn.setAttribute(
            "aria-expanded",
            btn.getAttribute("aria-expanded") === "false" ? "true" : "false"
        );
    });
});

// close dropdown menu when the dropdown links are clicked
links.forEach((link) =>
    link.addEventListener("click", () => {
        closeDropdownMenu();
        setAriaExpandedFalse();
        toggleHamburger();
    })
);

// close dropdown menu when you click on the document body
document.documentElement.addEventListener("click", () => {
    closeDropdownMenu();
    setAriaExpandedFalse();
});

// close dropdown when the escape key is pressed
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
        closeDropdownMenu();
        setAriaExpandedFalse();
    }
});

hamburgerBtn.addEventListener("click", toggleHamburger);

var $data;
var Orgdata;
function toggleCategory(categoryId) {
    const categoryList = document.getElementById(categoryId);
    if (categoryId === 'price') {
        categoryList.style.display = categoryList.style.display === "none" ? "flex" : "none";
    }else{
        categoryList.style.display = categoryList.style.display === "none" ? "block" : "none";
    }
}

// Display data
const accReq = document.querySelector(".account-requests");
const cart = document.querySelector(".cart");
const notifications = document.querySelector(".notification");

function cartItems() {
    $.ajax({
        method: 'GET',
        url: 'http://localhost/symphony/users/cartItemCount',
        dataType: 'json',
        success: function (response) {
            console.log('count',response.Count);
            showCartItems(response.Count);
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}

function showCartItems(count){
    let text = "";
    text += `<p class="badge" >`+count+`</p>`+
        `<a href="http://localhost/symphony/users/cart">`+
        `<i class="fa-solid fa-cart-plus" ></i>`+
        `</a>`;
    cart.innerHTML=text;
}

Redirect();
function Redirect() {
    cartItems();
    $.ajax({
        method: 'POST',
        url: 'http://localhost/symphony/users/studio',
        dataType: 'json',
        success: function (response) {
            $data = JSON.parse(JSON.stringify(response.inventory));
            Orgdata = JSON.parse(JSON.stringify(response.inventory));
            $notifications = JSON.parse(JSON.stringify(response.notifications));
            $notificationsCount = JSON.parse(JSON.stringify(response.count));
            console.log('notifications',$notifications);
            console.log('notificationsCount',$notificationsCount);
            console.log('response',response);
            displaydata($data);
            displayNotifications($notifications, $notificationsCount);
            console.log('method');
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}

function displayNotifications(notificationsData, count) {
    let text = "";
    text += `<button class="notification-btn" id="notificationBtn"><i class="fa-solid fa-bell"></i></button>` +
        `<p class="badge">` + count + `</p>` +
        `<div class="notification-wrapper">` +
        `<div class="notification-dropdown" id="notificationDropdown">` +
        `<ul class="notification-list">`;

    // Assuming notificationsData is an array of notification texts
    notificationsData.forEach(function (notification, index) {
        text += `<li class="notification-item"><div class="notification-data">` + notification.data + `</div> <button class="close-btn">x</button></li>`;
    });

    text += `</ul>` +
        `<button class="mark-all-as-read-btn">Mark All as Read</button>` +
        `</div>` +
        `</div>`;
    notifications.innerHTML = text;

    // Add event listeners to the newly created elements
    addEventListeners();
}

function addEventListeners() {
    const notificationBtn = document.getElementById('notificationBtn');
    const notificationDropdown = document.getElementById('notificationDropdown');

    // Toggle dropdown menu when notification button is clicked
    notificationBtn.addEventListener('click', function () {
        if (notificationDropdown.style.display === 'block') {
            notificationDropdown.style.display = 'none';
        } else {
            notificationDropdown.style.display = 'block';
        }
    });

    // Close notification when close button is clicked
    const closeButtons = document.querySelectorAll('.close-btn');
    closeButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const notificationItem = button.parentNode;
            notificationItem.style.display = 'none';
        });
    });

    // Mark all notifications as read when "Mark All as Read" button is clicked
    const markAllAsReadBtn = document.querySelector('.mark-all-as-read-btn');
    markAllAsReadBtn.addEventListener('click', function () {
        const notificationItems = document.querySelectorAll('.notification-item');
        notificationItems.forEach(function (item) {
            item.style.display = 'none';
        });
        window.location.href = 'http://localhost/symphony/users/markNotifications';
    });
}


function displaydata(data){
    var inventory = data;
    let req = "";

    if (inventory && inventory.length > 0) {
        inventory.forEach(function (item) {
            var stockText="";
            if(item.quantity<=0){
                stockText="Inventory not available";
            }

            req += `<div class="item-container" onclick="viewItem(`+item.product_id+`)">`+
                `<div class="item-details">`+
                `<div class="image-carousel">`+
                `<img class="carousel-image" src="http://localhost/symphony/img/serviceProvider/`+item.photo_1+`" alt="Placeholder Image 1" style="display: block">`+
                `</div>`+
                `<div class="item-info">`+
                `<h3>Title:`+item.Title+`</h3>`+
                `<p>Air condition: `+item.airCondition+`</p>`+
                `<p>Locations:  `+item.location+`</p>`+
                `<p>Price(LKR): `+item.unit_price+`.00</p>`+
                `<p>`+stockText+`</p>`+
                `</div>`+
                `</div>`+
                `</div>`;
        });
        accReq.innerHTML=req;
    } else {
        req +=`<p style="color: #ee087f">No inventory data Available</p>`
        console.log('No inventory data Available')
        accReq.innerHTML=req;
    }
}

function updateDisplayedData() {
    var selectedCategories = $('.equipment-list input:checked').map(function () {
        return $(this).parent().text().trim();
    }).get();

    var filteredData;

    if (selectedCategories.length === 0) {
        filteredData = JSON.parse(JSON.stringify(Orgdata));
    } else {
        filteredData = JSON.parse(JSON.stringify(Orgdata)).filter(function (item) {
            return selectedCategories.some(function (selectedCategory) {
                console.log(item.location);
                return item.location.includes(selectedCategory);
            });
        });
    }
    displaydata(filteredData);
    console.log(filteredData);
}

//search
document.getElementById("search-item").addEventListener("keyup", search);

function search() {
    const searchBox = document.getElementById("search-item").value.toUpperCase();
    const products = document.querySelectorAll(".item-container");

    products.forEach(product => {
        const titleElement = product.querySelector(".item-info h3");
        const airConditionElement = product.querySelector(".item-info p:nth-of-type(1)");
        const locationElement = product.querySelector(".item-info p:nth-of-type(2)");
        const priceElement = product.querySelector(".item-info p:nth-of-type(3)");
        const stockElement = product.querySelector(".item-info p:nth-of-type(4)");

        const title = titleElement.textContent || titleElement.innerHTML;
        const airCondition = airConditionElement.textContent || airConditionElement.innerHTML;
        const location = locationElement.textContent || locationElement.innerHTML;
        const price = priceElement.textContent || priceElement.innerHTML;
        const stock = stockElement.textContent || stockElement.innerHTML;

        const searchValues = [title, airCondition, location, price, stock];

        const match = searchValues.some(value => value.toUpperCase().indexOf(searchBox) > -1);

        if (match) {
            product.style.display = "";
        } else {
            product.style.display = "none";
        }
    });
}


function viewItem(productId){
    window.location.href = 'http://localhost/symphony/users/viewStudio/'+productId ;
}

//price sort
function price(){
    var filterdArray = [];
    value1 = document.getElementById("value1").value;
    console.log(value1);
    value2 = document.getElementById("value2").value;

    if (value1.length == 0){
        value1 = 0;
    }
    if (value2.length == 0){
        value2 = 1000000000000; // define huge value when max value is not set
    }

    $data.forEach(item =>{
        if(value1 <= item.unit_price && item.unit_price <= value2 ) filterdArray.push(item);
    })
    displaydata(filterdArray);
}