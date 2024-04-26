var $data;
var Orgdata;

function toggleCategory(categoryId) {
    const categoryList = document.getElementById(categoryId);
    if (categoryId === 'price') {
        categoryList.style.display = categoryList.style.display === "none" ? "flex" : "none";
    } else {
        categoryList.style.display = categoryList.style.display === "none" ? "block" : "none";
    }
}

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

// Display data
const accReq = document.querySelector(".account-requests");
const notifications = document.querySelector(".notifications");

Redirect();

function Redirect() {
    $.ajax({
        method: 'GET',
        url: 'http://localhost/symphony/serviceproviders/fetchSingers',
        dataType: 'json',
        success: function (response) {
            $data = JSON.parse(JSON.stringify(response.inventory));
            Orgdata = JSON.parse(JSON.stringify(response.inventory));
            $notifications = JSON.parse(JSON.stringify(response.notifications));
            $count = JSON.parse(JSON.stringify(response.count));
            console.log('response', response);
            displaydata($data);
            displayNotifications($notifications, $count);
            console.log('method');
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
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

function displayNotifications(notificationsData, count) {
    let text = "";
    text += `<button class="notification-btn" id="notificationBtn"><i class="fa-solid fa-bell"></i></button>` +
        `<p class="badge">` + count + `</p>` +
        `<div class="notification-wrapper">` +
        `<div class="notification-dropdown" id="notificationDropdown">` +
        `<ul class="notification-list">`;

    // Assuming notificationsData is an array of notification texts
    notificationsData.forEach(function (notification, index) {
        text += `<li class="notification-item">` + notification.data + ` <button class="close-btn">x</button></li>`;
    });

    text += `</ul>` +
        `<button class="mark-all-as-read-btn">Mark All as Read</button>` +
        `</div>` +
        `</div>`;
    notifications.innerHTML = text;

    // Add event listeners to the newly created elements
    addEventListeners();
}

function Delete(productId) {
    var confirmed = confirm("Are you sure you want to delete this singer?");
    if (confirmed) {
        $.ajax({
            method: 'POST',
            url: 'http://localhost/symphony/serviceproviders/deleteSinger/' + productId,
            success: function (response) {
                console.log('response', response);
                Redirect();
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    } else {
        alert("Deletion canceled.");
    }
}

function displaydata(data) {
    var inventory = data;
    let req = "";

    if (inventory && inventory.length > 0) {
        inventory.forEach(function (item) {
            console.log('Product ID:', item.product_id);
            console.log('Created By:', item.created_by);
            console.log('Category:', item.category);
            console.log('createdDate:', item.createdDate);
            console.log('number:', item.telephoneNumber);
            console.log('name:', item.name);
            console.log('Nickname:', item.nickName);
            console.log('warranty:', item.warranty);
            console.log('videoLink:', item.videoLink);
            console.log('location:', item.location);
            console.log('instrument:', item.instrument);
            console.log('email:', item.email);
            console.log('singerPhoto:', item.singerPhoto);
            console.log('Unit Price:', item.unit_price);
            console.log('Description:', item.Description);
            console.log('Photo 1:', item.photo_1);
            console.log('Photo 2:', item.photo_2);
            console.log('Photo 3:', item.photo_3);
            console.log('------------------------');

            // var categoryString = item.category;
            // var categoryArray = categoryString.split(' ');
            // console.log(item.category);
            // console.log(categoryArray);
            //
            // if (categoryArray[0] === 'Electric Guitars') {
            //     item.category = 'Electric Guitars';
            // } else if (categoryArray[0] === 'Acoustic Guitars') {
            //     item.category = 'Acoustic Guitars';
            // } else if (categoryArray[0] === 'Keyboard') {
            //     item.category = 'Keyboard';
            //     if (categoryArray[1] === 'Piano') {
            //         item.keyboard = 'Piano';
            //     } else if (categoryArray[1] === 'Organs') {
            //         item.keyboard = 'Organs';
            //     }
            // } else if (categoryArray[0] === 'Band_And_Orchestra') {
            //     item.category = 'Band_And_Orchestra';
            //     if (categoryArray[1] === 'Woodwind') {
            //         item.band = 'Woodwind';
            //         if (categoryArray[2] === 'Flutes') {
            //             item.woodwind = 'Flutes';
            //         } else if (categoryArray[2] === 'Saxophones') {
            //             item.woodwind = 'Saxophones';
            //         } else if (categoryArray[2] === 'Clarinets') {
            //             item.woodwind = 'Clarinets';
            //         }
            //     } else if (categoryArray[1] === 'Brass') {
            //         item.band = 'Brass';
            //         if (categoryArray[2] === 'Trumphet') {
            //             item.brass = 'Trumphet';
            //         } else if (categoryArray[2] === 'Trombones') {
            //             item.brass = 'Trombones';
            //         } else if (categoryArray[2] === 'FrenchHorns') {
            //             item.brass = 'FrenchHorns';
            //         }
            //     } else if (categoryArray[1] === 'String') {
            //         item.band = 'String';
            //         if (categoryArray[2] === 'Violins') {
            //             item.string = 'Violins';
            //         } else if (categoryArray[2] === 'Cellos') {
            //             item.string = 'Cellos';
            //         } else if (categoryArray[2] === 'Violas') {
            //             item.string = 'Violas';
            //         }
            //     }
            // } else if (categoryArray[0] === 'Audio') {
            //     item.category = 'Audio';
            //     if (categoryArray[1] === 'Headphones') {
            //         item.audio = 'Headphones';
            //     } else if (categoryArray[1] === 'Receivers') {
            //         item.audio = 'Receivers';
            //     } else if (categoryArray[1] === 'Amplifiers') {
            //         item.audio = 'Amplifiers';
            //     }
            //     if (categoryArray[1] === 'Speakers') {
            //         item.audio = 'Speakers';
            //     } else if (categoryArray[1] === 'Subwoofers') {
            //         item.audio = 'Subwoofers';
            //     } else if (categoryArray[1] === 'Tape_Decks') {
            //         item.audio = 'Tape_Decks';
            //     }
            //     if (categoryArray[1] === 'Turntables') {
            //         item.audio = 'Turntables';
            //     } else if (categoryArray[1] === 'Microphones') {
            //         item.audio = 'Microphones';
            //     } else if (categoryArray[1] === 'Mixers') {
            //         item.audio = 'Mixers';
            //     } else if (categoryArray[1] === 'Recording') {
            //         item.audio = 'Recording';
            //     }
            // } else if (categoryArray[0] === 'Percussion') {
            //     item.category = 'Percussion';
            //     if (categoryArray[1] === 'Cymbals') {
            //         item.persussion = 'Cymbals';
            //     } else if (categoryArray[1] === 'Drums') {
            //         item.persussion = 'Drums';
            //     }
            // }

            var stockText = "";
            // if (item.quantity <= 0) {
            //     stockText = "Inventory not available";
            // }

            req += `<div class="item-container">` +
                `<div class="item-details">` +
                `<div class="image-carousel">` +
                `<img class="carousel-image" src="http://localhost/symphony/img/serviceProvider/` + item.photo_1 + `" alt="Placeholder Image 1" style="display: block">` +
                `</div>` +
                `<div class="item-info">` +
                `<h3>Name:` + item.name + `</h3>` +
                `<p>Nick name: ` + item.nickName + `</p>` +
                `<a href="http://localhost/symphony/serviceproviders/viewSinger/`+item.product_id+`" style="color: orange">see more details</a>` +
                `<p>` + stockText + `</p>` +
                <!-- User reviews go here -->
                `<div class="user-review">` +
                `<a href="http://localhost/symphony/serviceProviders/reviewSinger/` + item.product_id +`" style="font-size: 0.9rem;">Read Customer Reviews</a>` +
                `</div>` +
                `</div>` +
                `</div>` +
                <!-- Review section -->
                `<div class="reviews">` +
                `<div class="bin">` +
                `<img src="http://localhost/symphony/img/bin.png" alt="bin-icon"  class = "bin" id="bin_<?php echo $inventory->product_id; ?>" onclick="Delete(` + item.product_id + `)"/>` +
                `</div>` +
                <!-- Add more reviews as needed -->
                `</div>` +
                `</div>` +
                `<div class="item-modal item-modal` + item.product_id + `">` +
                `<div class="addItem">` +
                `<a href="" onclick="addItem(` + item.product_id + `)">X</a>` +
                `<p>Edit details</p>` +
                `<form id="edit-item-form" action="http://localhost/symphony/serviceproviders/edititem/` + item.product_id + `" method="POST" enctype="multipart/form-data">` +
                `<div class="input-box">` +
                `<label>Title</label>` +
                `<input type="text" required name="title" class="<?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="` + item.Title + `">` +
                `</div>` +
                <!--                category-->
                `<div class="input-box">` +
                `<label>Category</label>` +
                `<div class="custom-select">` +
                `<select id="categorySelect` + item.product_id + `" onchange="updateBrandOptions(` + item.product_id + `)" name="category">` +
                `<option value="Electric Guitars" ` + (item.category === 'Electric Guitars' ? 'selected' : '') + `>Electric guitars</option>` +
                `<option value="Keyboard" ` + (item.category === 'Keyboard' ? 'selected' : '') + `>Keyboard</option>` +
                `<option value="Acoustic Guitars" ` + (item.category === 'Acoustic Guitars' ? 'selected' : '') + `>Acoustic Guitars</option>` +
                `<option value="Band_And_Orchestra" ` + (item.category === 'Band_And_Orchestra' ? 'selected' : '') + `>Band and Orchestra</option>` +
                `<option value="Audio" ` + (item.category === 'Audio' ? 'selected' : '') + `>Audio</option>` +
                `<option value="Percussion" ` + (item.category === 'Percussion' ? 'selected' : '') + `>Drums and Percussion</option>` +
                `</select>` +
                `</div>` +
                `</div>` +
                `<!--                band and orchestra-->` +
                `<div className="band" id="band` + item.product_id + `">` +
                `<div class="input-box">` +
                `<label>Brass category</label>` +
                `<div class="custom-select">` +
                `<select id="bandOrchestraCategories` + item.product_id + `" onchange="updateSubBrandOptions(` + item.product_id + `)" name="bandOrchestra">` +
                `<option value="Woodwind" ` + (item.band === 'Woodwind' ? 'selected' : '') + `>Woodwind</option>` +
                `<option value="Brass" ` + (item.band === 'Brass' ? 'selected' : '') + `>Brass</option>` +
                `<option value="String" ` + (item.band === 'String' ? 'selected' : '') + `>String</option>` +
                `</select>` +
                `</div>` +
                `</div>` +
                `</div>` +
                <!--                woodwind-->
                `<div class="woodwing" id="woodwing` + item.product_id + `">` +
                `<div class="input-box">` +
                `<label>Woodwind Category</label>` +
                `<div class="custom-select">` +
                `<select id="WoodwindCategories` + item.product_id + `" onchange="updateSubBrandOptions(` + item.product_id + `)" name="Woodwind">` +
                `<option value="Flutes" ` + (item.woodwind === 'Flutes' ? 'selected' : '') + `>Flutes</option>` +
                `<option value="Saxophones" ` + (item.woodwind === 'Saxophones' ? 'selected' : '') + `>Saxophones</option>` +
                `<option value="Clarinets" ` + (item.woodwind === 'Clarinets' ? 'selected' : '') + `>Clarinets</option>` +
                `</select>` +
                `</div>` +
                `</div>` +
                `</div>` +
                <!--                brass-->
                `<div class="brass" id="brass` + item.product_id + `">` +
                `<div class="input-box">` +
                `<label>Brass category</label>` +
                `<div class="custom-select">` +
                `<select id="brassCategories` + item.product_id + `" onchange="updateSubBrandOptions(` + item.product_id + `)" name="brass">` +
                `<option value="Trumphet" ` + (item.brass === 'Trumphet' ? 'selected' : '') + `>Trumphets</option>` +
                `<option value="Trombones" ` + (item.brass === 'Trombones' ? 'selected' : '') + `>Trombones</option>` +
                `<option value="FrenchHorns" ` + (item.brass === 'FrenchHorns' ? 'selected' : '') + `>French Hornes</option>` +
                `</select>` +
                `</div>` +
                `</div>` +
                `</div>` +
                <!--                string-->
                `<div class="string" id="string` + item.product_id + `">` +
                `<div class="input-box">` +
                `<label>String category</label>` +
                `<div class="custom-select">` +
                `<select id="stringCategories` + item.product_id + `" onchange="updateSubBrandOptions(` + item.product_id + `)" name="string">` +
                `<option value="Violins" ` + (item.string === 'Violins' ? 'selected' : '') + `>Violins</option>` +
                `<option value="Cellos" ` + (item.string === 'Cellos' ? 'selected' : '') + `>Cellos</option>` +
                `<option value="Violas" ` + (item.string === 'Violas' ? 'selected' : '') + `>Violas</option>` +
                `</select>` +
                `</div>` +
                `</div>` +
                `</div>` +
                <!--                keyboard-->
                `<div class="Keyboard" id="Keyboard` + item.product_id + `">` +
                `<div class="input-box">` +
                `<label>Keyboard category</label>` +
                `<div class="custom-select">` +
                `<select id="keyboardCategories` + item.product_id + `" onchange="updateSubBrandOptions(` + item.product_id + `)" name="keyboard">` +
                `<option value="Piano" ` + (item.keyboard === 'Piano' ? 'selected' : '') + `>Piano</option>` +
                `<option value="Organs" ` + (item.keyboard === 'Organs' ? 'selected' : '') + `>Organs</option>` +
                `</select>` +
                `</div>` +
                `</div>` +
                `</div>` +
                <!--                drums and percussion -->
                `<div class="Percussion" id="Percussion` + item.product_id + `">` +
                `<div class="input-box">` +
                `<label>Drums and Percussion Category</label>` +
                `<div class="custom-select">` +
                `<select id="drumsCategories` + item.product_id + `" onchange="updateSubBrandOptions(` + item.product_id + `)" name="Percussion">` +
                `<option value="Cymbals" ` + (item.persussion === 'Cymbals' ? 'selected' : '') + `>Cymbals</option>` +
                `<option value="Drums" ` + (item.persussion === 'Drums' ? 'selected' : '') + `>Drums</option>` +
                `</select>` +
                `</div>` +
                `</div>` +
                `</div>` +
                `<!--                home audio-->` +
                `<div className="Audio" id="Audio` + item.product_id + `">` +
                `<div class="input-box">` +
                `<label>Home Audio category</label>` +
                `<div class="custom-select">` +
                `<select id="homeAudioCategory` + item.product_id + `" onchange="updateSubBrandOptions(` + item.product_id + `)" name="homeAudioCategory">` +
                `<option value="Headphones" ` + (item.audio === 'Headphones' ? 'selected' : '') + `>Headphones</option>` +
                `<option value="Receivers" ` + (item.audio === 'Receivers' ? 'selected' : '') + `>Receivers</option>` +
                `<option value="Amplifiers" ` + (item.audio === 'Amplifiers' ? 'selected' : '') + `>Amplifiers</option>` +
                `<option value="Speakers" ` + (item.audio === 'Speakers' ? 'selected' : '') + `>Speakers</option>` +
                `<option value="Subwoofers" ` + (item.audio === 'Subwoofers' ? 'selected' : '') + `>Subwoofers</option>` +
                `<option value="Tape Decks" ` + (item.audio === 'Tape_Decks' ? 'selected' : '') + `>Tape Decks</option>` +
                `<option value="Turntables" ` + (item.audio === 'Turntables' ? 'selected' : '') + `>Turntables</option>` +
                `<option value="Microphones" ` + (item.audio === 'Microphones' ? 'selected' : '') + `>Microphones</option>` +
                `<option value="Mixers" ` + (item.audio === 'Mixers' ? 'selected' : '') + `>Mixers</option>` +
                `<option value="Recording" ` + (item.audio === 'Recording' ? 'selected' : '') + `>Recording</option>` +
                `</select>` +
                `</div>` +
                `</div>` +
                `</div>` +
                `<!--brand-->` +
                `<div class="input-box">` +
                `<label>Brand</label>` +
                `<div class="custom-select">` +
                `<select id="brandSelect` + item.product_id + `" name="brand">` +
                `</select>` +
                `</div>` +
                `</div>` +
                //..... availability / out of stock.....
                `<div class="input-box">` +
                `<label>Availability</label>` +
                `<select name="availabilty" id="availability` + item.product_id + `">` +
                ` <option value="0">Available</option>` +
                `<option value="1">Unavailable</option>` +
                `</select>` +
                `</div>` +
                `<!--                Model-->` +
                `<div class="input-box">` +
                `<label>Model</label>` +
                `<input type="text" required name="model" class="<?php echo (!empty($data['model_err'])) ? 'is-invalid' : ''; ?>" value="` + item.model + `">` +
                `</div>` +
                `<!--                quantity-->` +
                `<div class="input-box">` +
                `<label>Quantity</label>` +
                `<input type="number" required name="quantity" class="<?php echo (!empty($data['quantity_err'])) ? 'is-invalid' : ''; ?>" value="` + item.quantity + `">` +
                `</div>` +
                `<!--                Unit price-->` +
                `<div class="input-box">` +
                ` <label>Unit Price (LKR)</label>` +
                `<input type="number" required name="unit_price" class="<?php echo (!empty($data['unit_price_err'])) ? 'is-invalid' : ''; ?>" value="` + item.unit_price + `">` +
                `</div>` +
                `<div class="input-box">` +
                ` <label>Warranty date</label>` +
                `<input type="date" required name="warranty" class="<?php echo (!empty($data['unit_price_err'])) ? 'is-invalid' : ''; ?>" value="` + item.warranty + `">` +
                `</div>` +
                `<!--                description-->` +
                `<div class="description">` +
                `<div class="input-box">` +
                ` <label>Description</label>` +
                `</div>` +
                `<div class="textArea">` +
                `<textarea id="description" name="description" rows="4" required style="width: 290px;height: 150px">` + item.Description + `</textarea>` +
                `</div>` +
                `</div>` +
                `<!--                photos-->` +
                `<div class="photo_container">` +
                `<div class="input-box">` +
                `<label style="font-weight: bold">Add up to 3 photos</label>` +
                `</div>` +
                `<div class="photo-table">` +
                `<div class="photo-outer">` +
                `<div class="photo-inner">` +
                `<img src="http://localhost/symphony/img/serviceProvider/` + item.photo_1 + `" id="previewPhoto_1` + item.product_id + `" onclick="triggerInput(1,` + item.product_id + `)">` +
                `<input type="file" onchange="previewImage(this, 'previewPhoto_1` + item.product_id + `')"  id="photo_1` + item.product_id + `" accept=".jpg, .jpeg, .png, .HEIC" name="photo_1-` + item.product_id + `" class="photo_1" value="http://localhost/symphony/img/serviceProvider/` + item.photo_1 + `">` +
                `</div>` +
                `</div>` +
                `<div class="photo-outer">` +
                `<div class="photo-inner">` +
                `<img src="http://localhost/symphony/img/serviceProvider/` + item.photo_2 + `" id="previewPhoto_2` + item.product_id + `" onclick="triggerInput(2,` + item.product_id + `)">` +
                `<input type="file" onchange="previewImage(this, 'previewPhoto_2` + item.product_id + `')"  id="photo_2` + item.product_id + `" accept=".jpg, .jpeg, .png, .HEIC" name="photo_2-` + item.product_id + `" class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['photo_2']; ?>" >` +
                `</div>` +
                `</div>` +
                `<div class="photo-outer">` +
                `<div class="photo-inner">` +
                `<img src="http://localhost/symphony/img/serviceProvider/` + item.photo_3 + `" id="previewPhoto_3` + item.product_id + `" onclick="triggerInput(3,` + item.product_id + `)">` +
                `<input type="file" onchange="previewImage(this, 'previewPhoto_3` + item.product_id + `')"  id="photo_3` + item.product_id + `" accept=".jpg, .jpeg, .png, .HEIC" name="photo_3-` + item.product_id + `" class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['photo_3']; ?>">` +
                `</div>` +
                `</div>` +
                `</div>` +
                `</div>` +
                `<button id="submitBtn">Save</button>` +
                `</form>` +
                `</div>` +
                `</div>`;
        });
        accReq.innerHTML = req;
    } else {
        req += `<p style="color: white">No inventory data Available</p>`
        console.log('No inventory data Available')
        accReq.innerHTML = req;
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

// function toggleCategory(category) {
//   $('#' + category).toggle();
//   updateDisplayedData();
// }

// $('.equipment-list input').change(updateDisplayedData);

//item details
function addItem(productId) {
    var element1 = document.querySelector('.item-modal' + productId);
    updateBrandOptions(productId);
    element1.classList.toggle('toggled');
}

// add photo
function triggerInput(id, productId) {
    document.getElementById("photo_" + id + productId).click();
}

function previewImage(input, imgId) {
    var preview = document.getElementById(imgId);

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// categories and brands dynamically
function updateBrandOptions(productId) {
    var categorySelect = document.getElementById('categorySelect' + productId);
    var keyBoardId = document.getElementById('Keyboard' + productId);
    var bandId = document.getElementById('band' + productId);
    var AudioId = document.getElementById('Audio' + productId);
    var PercussionId = document.getElementById('Percussion' + productId);
    var bandOrchestraCategories = document.getElementById('bandOrchestraCategories' + productId);
    var woodwindId = document.getElementById('woodwing' + productId);
    var brassId = document.getElementById('brass' + productId);
    var StringId = document.getElementById('string' + productId);

    if (categorySelect.value === 'Keyboard') {
        keyBoardId.classList.remove('Keyboard');
    } else {
        keyBoardId.classList.add('Keyboard');
    }
    if (categorySelect.value === 'Band_And_Orchestra') {
        bandId.classList.remove("band");
    } else {
        bandId.classList.add("band");
    }
    if (categorySelect.value === "Audio") {
        AudioId.classList.remove("Audio");
    } else {
        AudioId.classList.add("Audio");
    }
    if (categorySelect.value === "Percussion") {
        PercussionId.classList.remove("Percussion");
    } else {
        PercussionId.classList.add("Percussion");
    }

    // band and orchestra
    if (bandOrchestraCategories.value === "Woodwind" && categorySelect.value === 'Band_And_Orchestra') {
        woodwindId.classList.remove("woodwing");
    } else {
        woodwindId.classList.add("woodwing");
    }
    if (bandOrchestraCategories.value === "Brass" && categorySelect.value === 'Band_And_Orchestra') {
        brassId.classList.remove("brass");
    } else {
        brassId.classList.add("brass");
    }
    if (bandOrchestraCategories.value === "String" && categorySelect.value === 'Band_And_Orchestra') {
        StringId.classList.remove("string");
    } else {
        StringId.classList.add("string");
    }
    updateSubBrandOptions(productId);
}

function updateSubBrandOptions(productId) {
    var categorySelect = document.getElementById("categorySelect" + productId);
    var bandOrchestraCategories = document.getElementById("bandOrchestraCategories" + productId);
    var keyBoardCategory = document.getElementById("keyboardCategories" + productId);
    var brandSelect = document.getElementById("brandSelect" + productId);
    var homeAudio = document.getElementById("homeAudioCategory" + productId);
    var WoodwindCategories = document.getElementById("WoodwindCategories" + productId);
    var brassCategories = document.getElementById("brassCategories" + productId);
    var stringCategories = document.getElementById("stringCategories" + productId);
    var drumsCategories = document.getElementById("drumsCategories" + productId);
    brandSelect.innerHTML = '';

    if (categorySelect.value === 'Electric Guitars') {
        // var arr = ["Yamaha","Gibson","Epiphone","Ibanez","Jackson","Schecter","ESP","Washburn","Charvel"];
        // addBrandOption(arr,productId);
        addBrandOption('Yamaha', productId);
        addBrandOption('Gibson', productId);
        addBrandOption('PRS', productId);
        addBrandOption('Ibanez', productId);
        addBrandOption('Jackson', productId);
        addBrandOption('Schecter', productId);
        addBrandOption('ESP', productId);
        addBrandOption('Epiphone', productId);
        addBrandOption('Gretsch', productId);
        addBrandOption('Squier', productId);
        addBrandOption('Tokai', productId);
        addBrandOption('Lakland', productId);
        addBrandOption('Sadowsky', productId);
        addBrandOption('Spector', productId);
        addBrandOption('Warwick', productId);
        addBrandOption('Sandberg', productId);
        addBrandOption('Dingwall', productId);
    } else if (categorySelect.value === 'Acoustic Guitars') {
        // addBrandOption = ["Yamaha","Gibson","Epiphone","Ibanez","Jackson","Schecter","ESP","Washburn","Charvel"];
        addBrandOption('Yamaha', productId);
        addBrandOption('Gibson', productId);
        addBrandOption('Epiphone', productId);
        addBrandOption('Ibanez', productId);
        addBrandOption('Jackson', productId);
        addBrandOption('Schecter', productId);
        addBrandOption('ESP', productId);
        addBrandOption('Washburn', productId);
        addBrandOption('Charvel', productId);
        addBrandOption('Alhambra', productId);
        addBrandOption('Cordoba', productId);
        addBrandOption('Ortega', productId);
        addBrandOption('Eko', productId);
        addBrandOption('Kremona', productId);
    } else if (categorySelect.value === 'Keyboard') {
        if (keyBoardCategory.value === 'Organs') {
            addBrandOption('Lowrey', productId);
            addBrandOption('Kimball', productId);
            addBrandOption('Hammond', productId);
            addBrandOption('Baldwin', productId);
            addBrandOption('Gulbransen', productId);
            addBrandOption('Conn', productId);
            addBrandOption('Farfisa', productId);
            addBrandOption('Roland', productId);
            addBrandOption('Vox', productId);
        } else if (keyBoardCategory.value === 'Piano') {
            addBrandOption('Yamaha', productId);
            addBrandOption('Steinway & Sons', productId);
            addBrandOption('Bosendorfer', productId);
            addBrandOption('Kawai', productId);
            addBrandOption('Fazioli', productId);
            addBrandOption('Bechstein', productId);
            addBrandOption('Mason & Hamlin', productId);
            addBrandOption('Blüthner', productId);
            addBrandOption('Estonia', productId);
            addBrandOption('Schimmel', productId);
            addBrandOption('Baldwin', productId);
            addBrandOption('Petrof', productId);
            addBrandOption('Grotrian', productId);
            addBrandOption('Knabe', productId);
            addBrandOption('August Förster', productId);
            addBrandOption('Samick', productId);
            addBrandOption('Essex (Steinway & Sons)', productId);
            addBrandOption('W. Hoffmann', productId);
            addBrandOption('Roland', productId);
            addBrandOption('Casio', productId);
        }
    } else if (categorySelect.value === 'Band_And_Orchestra') {
        if (bandOrchestraCategories.value === "Woodwind") {
            if (WoodwindCategories.value === "Flutes") {
                addBrandOption('Yamaha', productId);
                addBrandOption('Armstrong', productId);
                addBrandOption('Trevor James', productId);
                addBrandOption('Powell', productId);
            } else if (WoodwindCategories.value === "Saxophones") {
                addBrandOption('Yamaha', productId);
                addBrandOption('Selmer', productId);
                addBrandOption('Yanagisawa', productId);
                addBrandOption('Keilwerth', productId);
                addBrandOption('Cannonball', productId);
                addBrandOption('Buffet Crampon', productId);
                addBrandOption('Jupiter', productId);
                addBrandOption('Eastman', productId);
                addBrandOption('Conn-Selmer', productId);
            } else if (WoodwindCategories.value === "Clarinets") {
                addBrandOption('Yamaha', productId);
                addBrandOption('Selmer', productId);
                addBrandOption('Buffet Crampon', productId);
                addBrandOption('Backun', productId);
                addBrandOption('Leblanc', productId);
                addBrandOption('Clark W Fobes', productId);
                addBrandOption('R13', productId);
                addBrandOption('Vandoren', productId);
                addBrandOption('Schreiber', productId);
            }
        } else if (bandOrchestraCategories.value === "Brass") {
            if (brassCategories.value === 'Trumphet') {
                addBrandOption('Bach', productId);
                addBrandOption('Yamaha', productId);
                addBrandOption('KGUBrass', productId);
                addBrandOption('Schiller', productId);
                addBrandOption('Jupiter', productId);
                addBrandOption('Conn', productId);
                addBrandOption('King', productId);
                addBrandOption('Selmer', productId);
                addBrandOption('Olds', productId);
                addBrandOption('New Brand', productId);
                addBrandOption('BerkeleyWind', productId);
                addBrandOption('Holton', productId);

            } else if (brassCategories.value === 'Trombones') {
                addBrandOption('Bach', productId);
                addBrandOption('Schiller', productId);
                addBrandOption('Jupiter', productId);
                addBrandOption('New Brand', productId);
                addBrandOption('Shires', productId);
                addBrandOption('Conn', productId);
                addBrandOption('Glenn Cronkhite', productId);
                addBrandOption('Yamaha', productId);
                addBrandOption('Olds', productId);
                addBrandOption('King', productId);
                addBrandOption('Holton', productId);
                addBrandOption('Getzen', productId);

            } else if (brassCategories.value === 'FrenchHorns') {
                addBrandOption('Yamaha', productId);
                addBrandOption('Schiller', productId);
                addBrandOption('Eastman', productId);
                addBrandOption('Holton', productId);
                addBrandOption('USSR', productId);
                addBrandOption('Glenn Cronkhite', productId);
                addBrandOption('Alexander', productId);
                addBrandOption('Jupiter', productId);
                addBrandOption('Hans Hoyer', productId);
                addBrandOption('C.G. Conn', productId);
                addBrandOption('King', productId);
                addBrandOption('Getzen', productId);
            }
        } else if (bandOrchestraCategories.value === "String") {
            if (stringCategories.value === 'Violins') {
                addBrandOption('Rozannas Violins', productId);
                addBrandOption('Unknown', productId);
                addBrandOption('D Z Strad', productId);
                addBrandOption('Unbranded', productId);
                addBrandOption('Suzuki', productId);
                addBrandOption('Sky Music', productId);
                addBrandOption('Stentor', productId);
                addBrandOption('Violin', productId);
                addBrandOption('Vienna Strings', productId);
                addBrandOption('Oqan', productId);
                addBrandOption('Paititi', productId);

            } else if (stringCategories.value === 'Cellos') {
                addBrandOption('D Z Strad', productId);
                addBrandOption('Pirastro', productId);
                addBrandOption('Oqan', productId);
                addBrandOption('Wittner', productId);
                addBrandOption('Cello', productId);
                addBrandOption('Larsen', productId);
                addBrandOption('NS Design', productId);
                addBrandOption('Stentor', productId);
                addBrandOption('Jargar', productId);
                addBrandOption('Vienna Strings', productId);
                addBrandOption('Thomastik-Infeld', productId);

            } else if (stringCategories.value === 'Violas') {
                addBrandOption('D Z Strad', productId);
                addBrandOption('Super-Sensitive', productId);
                addBrandOption('Rozannas Violins', productId);
                addBrandOption('Pirastro', productId);
                addBrandOption('Opal', productId);
                addBrandOption('OEM', productId);
                addBrandOption('Sky Music', productId);
                addBrandOption('Thomastik-Infeld', productId);
                addBrandOption('Viola', productId);
                addBrandOption('Strumenti', productId);
            }
        }
    } else if (categorySelect.value === 'Audio') {
        if (homeAudio.value === "Headphones") {
            addBrandOption('Yamaha', productId);
            addBrandOption('Selmer', productId);
            addBrandOption('Yanagisawa', productId);
            addBrandOption('Keilwerth', productId);
            addBrandOption('Cannonball', productId);
            addBrandOption('Buffet Crampon', productId);
            addBrandOption('Jupiter', productId);
            addBrandOption('Eastman', productId);
            addBrandOption('Conn-Selmer', productId);
        } else if (homeAudio.value === "Receivers") {
            addBrandOption('Yamaha', productId);
            addBrandOption('Selmer', productId);
            addBrandOption('Yanagisawa', productId);
            addBrandOption('Keilwerth', productId);
            addBrandOption('Cannonball', productId);
            addBrandOption('Buffet Crampon', productId);
            addBrandOption('Jupiter', productId);
            addBrandOption('Eastman', productId);
            addBrandOption('Conn-Selmer', productId);


        } else if (homeAudio.value === "Speakers") {
            addBrandOption('Mackie', productId);
            addBrandOption('JBL', productId);
            addBrandOption('Genelec', productId);
            addBrandOption('Yamaha', productId);
            addBrandOption('Behringer', productId);
            addBrandOption('Samson', productId);
            addBrandOption('PreSonus', productId);
            addBrandOption('Tone Tubby', productId);
            addBrandOption('Focal', productId);
            addBrandOption('QSC', productId);
            addBrandOption('KRK', productId);
            addBrandOption('HK Audio', productId);

        } else if (homeAudio.value === "Amplifiers") {
            addBrandOption('Yamaha', productId);
            addBrandOption('Armstrong', productId);
            addBrandOption('Trevor James', productId);
            addBrandOption('Powell', productId);


        } else if (homeAudio.value === "Subwoofers") {
            addBrandOption('Yamaha', productId);
            addBrandOption('Gibson', productId);
            addBrandOption('Epiphone', productId);
            addBrandOption('Ibanez', productId);
            addBrandOption('Jackson', productId);
            addBrandOption('Schecter', productId);
            addBrandOption('ESP', productId);
            addBrandOption('Washburn', productId);
            addBrandOption('Charvel', productId);

        } else if (homeAudio.value === "Tape_Decks") {
            addBrandOption('Yamaha', productId);
            addBrandOption('Schilke', productId);
            addBrandOption('Getzen', productId);
            addBrandOption('Conn-Selmer', productId);
            addBrandOption('Jupiter', productId);
            addBrandOption('King', productId);
            addBrandOption('Holton', productId);
            addBrandOption('Besson', productId);
            addBrandOption('Stomvi', productId);


        } else if (homeAudio.value === "Turntables") {
            addBrandOption('Yamaha', productId);
            addBrandOption('Schilke', productId);
            addBrandOption('Getzen', productId);
            addBrandOption('Conn-Selmer', productId);
            addBrandOption('Jupiter', productId);
            addBrandOption('King', productId);
            addBrandOption('Holton', productId);
            addBrandOption('Besson', productId);
            addBrandOption('Stomvi', productId);

        } else if (homeAudio.value === "Microphones") {
            addBrandOption('Shure', productId);
            addBrandOption('AKG', productId);
            addBrandOption('Sennheiser', productId);
            addBrandOption('Neumann', productId);
            addBrandOption('Audio-Technica', productId);
            addBrandOption('Electro-Voice', productId);
            addBrandOption('sE Electronics', productId);
            addBrandOption('Samson', productId);
            addBrandOption('CAD', productId);
            addBrandOption('Oktava', productId);
            addBrandOption('Warm Audio', productId);
            addBrandOption('RODE', productId);

        } else if (homeAudio.value === "Mixers") {
            addBrandOption('Behringer', productId);
            addBrandOption('Mackie', productId);
            addBrandOption('Yamaha', productId);
            addBrandOption('Allen & Heath', productId);
            addBrandOption('Aviom', productId);
            addBrandOption('Soundcraft', productId);
            addBrandOption('Boss', productId);
            addBrandOption('Midas', productId);
            addBrandOption('PreSonus', productId);
            addBrandOption('TASCAM', productId);
            addBrandOption('Solid State Logic', productId);
            addBrandOption('Studer', productId);

        } else if (homeAudio.value === "Recording") {
            addBrandOption('TASCAM', productId);
            addBrandOption('Pro Audio LA', productId);
            addBrandOption('MRL', productId);
            addBrandOption('Ampex', productId);
            addBrandOption('Zoom', productId);
            addBrandOption('Studer', productId);
            addBrandOption('Akai', productId);
            addBrandOption('Sony', productId);
            addBrandOption('Yamaha', productId);
            addBrandOption('Fostex', productId);
        }
    } else if (categorySelect.value === 'Percussion') {
        if (drumsCategories.value === 'Cymbals') {
            addBrandOption('Bosphorus', productId);
            addBrandOption('Masterwork', productId);
            addBrandOption('Mehteran Cymbals', productId);
            addBrandOption('Pergamon', productId);
            addBrandOption('Diril Cymbals', productId);
            addBrandOption('Agean Cymbals', productId);
            addBrandOption('Istanbul Agop', productId);
            addBrandOption('Sabian', productId);
            addBrandOption('Agean', productId);
            addBrandOption('Zildjian', productId);
            addBrandOption('Paiste', productId);
            addBrandOption('Istanbul Mehmet', productId);

        } else if (drumsCategories.value === 'Drums') {
            addBrandOption('Bosphorus', productId);
            addBrandOption('Masterwork', productId);
            addBrandOption('Mehteran Cymbals', productId);
            addBrandOption('Pergamon', productId);
            addBrandOption('Diril Cymbals', productId);
            addBrandOption('Agean Cymbals', productId);
            addBrandOption('Sabian', productId);
            addBrandOption('Meinl', productId);
            addBrandOption('Istanbul Agop', productId);
            addBrandOption('Tama', productId);
            addBrandOption('Zildjian', productId);
            addBrandOption('Agean', productId);
        }
    }
}


function addBrandOption(brand, productId) {
    var brandSelect = document.getElementById('brandSelect' + productId);
    var option = document.createElement('option');
    option.value = brand;
    option.text = brand;
    brandSelect.add(option);
}

// updateBrandOptions(productId);

//search
document.getElementById("search-item").addEventListener("keyup", search);

function search() {
    const searchBox = document.getElementById("search-item").value.toUpperCase();
    // const storeItems = document.getElementById("");
    const products = document.querySelectorAll(".item-container");


    products.forEach(product => {
        const titleElement = product.querySelector("h3");
        const brand = product.querySelector("p:nth-child(1)");

        if (titleElement || brand ) {
            const textValue = titleElement.textContent || titleElement.innerHTML;
            const brandValue = brand.textContent || brand.innerHTML;
            if (textValue.toUpperCase().indexOf(searchBox) > -1 || brandValue.toUpperCase().indexOf(searchBox) > -1) {
                product.style.display = "";
            } else {
                product.style.display = "none";
            }
        }
    });
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