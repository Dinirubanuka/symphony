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

Redirect();

function Redirect() {
    $.ajax({
        method: 'GET',
        url: 'http://localhost/symphony/serviceproviders/fetchStudio',
        dataType: 'json',
        success: function (response) {
            $data = JSON.parse(JSON.stringify(response.inventory));
            Orgdata = JSON.parse(JSON.stringify(response.inventory));
            console.log('response', response);
            displaydata($data);
            console.log('method');
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}

function Delete(productId) {
    var confirmed = confirm("Are you sure you want to delete this item?");
    if (confirmed) {
        $.ajax({
            method: 'POST',
            url: 'http://localhost/symphony/serviceproviders/deleteStudio/' + productId,
            success: function (response) {
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
            var instrumentList = item.instrument;
            console.log('instrument list', instrumentList);
            var instrumentArray = instrumentList.split(' ');
            console.log('instrumentArray', instrumentArray);

            console.log('Product_id:', item.product_id);
            console.log('created_by:', item.created_by);
            console.log('descriptionSounds:', item.descriptionSounds);
            console.log('descriptionStudio:', item.descriptionStudio);
            console.log('Photo 1:', item.photo_1);
            console.log('Photo 2:', item.photo_2);
            console.log('Photo 3:', item.photo_3);
            console.log('name:', item.Title);
            console.log('instrument:', item.instrument);
            console.log('rate:', item.rate);
            console.log('telephonenumber:', item.telephoneNumber);
            console.log('videoLink:', item.videoLink);
            console.log('------------------------');
            req += `<div class="item-container">` +
                `<div class="item-details">` +
                `<div class="image-carousel">` +
                `<img class="carousel-image" src="http://localhost/symphony/img/serviceProvider/` + item.photo_1 + `" alt="Placeholder Image 1" style="display: block">` +
                `</div>` +
                `<div class="item-info">` +
                `<h3>Name:` + item.Title + `</h3>` +
                `<button href="" onclick="addItem(` + item.product_id + `, '` + instrumentList + `')" style="color: orange">see more details</button>` +
                <!-- User reviews go here -->
                `<div class="user-review">` +
                `<a href="http://" style="font-size: 0.9rem;">Read Customer Reviews</a>` +
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
                `<form action="http://localhost/symphony/serviceproviders/editStudio/` + item.product_id + `" className="form" method="post" encType="multipart/form-data">` +
                `<div class="input-box">` +
                `<label>Studio name</label>` +
                `<input type="text" name="StudioName" value="` + item.Title + `">` +
                `</div>` +
                `<div class="input-box">` +
                `<label>Air condition</label>` +
                `<select class="airCondition" name="airCondition">` +
                `<option value="yes">yes</option>` +
                `<option value="no">no</option>` +
                `</select>` +
                `</div>` +
                `<div class="input-box">` +
                `<label>Rate</label>` +
                `<input type="number" name="rate" value="` + item.unit_price + `"></input>` +
                `</div>` +
                <!--instrument-->
                `<div class="input-box input-box` + item.product_id + `">` +
                `<label>Select the instruments:</label>` +
                `<div class="dropdown2 dropdown` + item.product_id + `" id="` + item.product_id + `">` +
                `<div class="select-box" onclick="toggleOptions(` + item.product_id + `)">` +
                `<label>Select instruments</label>` +
                `<div class="arrow"></div>` +
                `</div>` +
                `<div class="options">` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Accordion" value="Accordion">` +
                `Accordion` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Bansuri" value="Bansuri">` +
                `Bansuri` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="BassDrum" value="BassDrum">` +
                `Bass Drum` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Bassoon" value="Bassoon">` +
                `Bassoon` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Cajon" value="Cajon">` +
                `Cajon` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Chime" value="Chime">` +
                `Chime` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Clarinet" value="Clarinet">` +
                `Clarinet` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Congas" value="Congas">` +
                `Congas` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="DigitalPiano" value="DigitalPiano">` +
                `Digital Piano` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Didgeridoo" value="Didgeridoo">` +
                `Didgeridoo` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Dizi" value="Dizi">` +
                `Dizi` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Djembe" value="Djembe">` +
                `Djembe` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="DoubleBass" value="DoubleBass">` +
                `Double Bass` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="DrumSet" value="DrumSet">` +
                `Drum Set` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="ElectricGuitar" value="ElectricGuitar">` +
                `Electric Guitar` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Erhu" value="Erhu">` +
                `Erhu` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Euphonium" value="Euphonium">` +
                `Euphonium` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Flute" value="Flute">` +
                `Flute` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="French Horn" value="French Horn">` +
                `French Horn` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Guitar" value="Guitar">` +
                `Guitar` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Guiro" value="Guiro">` +
                `Guiro` +
                `</div>` +
                `<div class="option">` +
                ` <input type="checkbox" id="" name="Guzheng" value="Guzheng">` +
                `Guzheng` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Harp" value="Harp">` +
                `Harp` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Harpsichord" value="Harpsichord">` +
                `Harpsichord` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Kalimba" value="Kalimba">` +
                `Kalimba` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Kora" value="Kora">` +
                `Kora` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Mandolin" value="Mandolin">` +
                `Mandolin` +
                `</div>` +
                ` <div class="option">` +
                `<input type="checkbox" id="" name="Maracas" value="Maracas">` +
                `Maracas` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Marimba" value="Marimba">` +
                `Marimba` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Ney" value="Ney">` +
                `Ney` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Oboe" value="Oboe">` +
                `Oboe` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Organ" value="Organ">` +
                `Electric Guitar` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Oud" value="Oud">` +
                `Oud` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Piano" value="Piano">` +
                `Piano` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Piccolo" value="Piccolo">` +
                `Piccolo` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Pipa" value="Pipa">` +
                `Pipa` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Quena" value="Quena">` +
                `Quena (Andean Flute)` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Recorder" value="Recorder">` +
                `Recorder` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Santoor" value="Santoor">` +
                `Santoor` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Sarod" value="Sarod">` +
                `Sarod` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Saxophone" value="Saxophone">` +
                `Saxophone` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Sitar" value="Sitar">` +
                `Sitar` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="SnareDrum" value="SnareDrum">` +
                `Snare Drum` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Synthesizer" value="Synthesizer">` +
                `Synthesizer` +
                `</div>` +
                `<div class="option">` +
                ` <input type="checkbox" id="" name="Tabla" value="Tabla">` +
                `Tabla` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="TalkingDrum" value="TalkingDrum">` +
                `Talking Drum` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Theremin" value="Theremin">` +
                `Theremin` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Timpani" value="Timpani">` +
                `Timpani` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Trombone" value="Trombone">` +
                `Trombone` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Trumpet" value="Trumpet">` +
                `Trumpet` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Tuba" value="Tuba">` +
                `Tuba` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Ukulele" value="Ukulele">` +
                `Ukulele` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Veena" value="Veena">` +
                `Veena` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Violin" value="Violin">` +
                `ViolinViolin` +
                `</div>` +
                `<div class="option">` +
                `<input type="checkbox" id="" name="Xylophone" value="Xylophone">` +
                `Xylophone` +
                `</div>` +
                `</div>` +
                `</div>` +
                `</div>` +
                `<div class="input-box">` +
                `<label>Description about Instrument & sounds</label>` +
                `<textarea name="descriptionSounds" id="" cols="20" rows="10">` + item.descriptionSounds + `</textarea>` +
                `</div>` +
                `<div class="input-box">` +
                `<label>Description About the Studio</label>` +
                `<textarea name="descriptionStudio" id="" cols="20" rows="10">` + item.descriptionStudio + `</textarea>` +
                `</div>` +
                `<div class="input-box">` +
                `<label>Telephone-Number</label>` +
                `<input type="text" name="number" value="` + item.telephoneNumber + `">` +
                `</div>` +
                `<div class="input-box">` +
                `<label>Video <br> (Add Embeded link)</label>` +
                `<input type="text" name="video" value="` + item.videoLink + `">` +
                `</div>` +
                <!--                photos-->
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
                `<button id="submitBtn" class="submit`+item.product_id+`" style="display: none"></button>` +
                `</form>` +
                `<button id="submitBtn" onClick="submitForm(` + item.product_id + `)">Submit</button>` +
                `</div>` +
                ` </div>`;

        });
        accReq.innerHTML = req;
    } else {
        req += `<p style="color: white">No inventory data Available</p>`
        console.log('No inventory data Available')
        accReq.innerHTML = req;
    }
}

function submitForm(productId) {
    var checkboxes = document.querySelectorAll('.dropdown' + productId + ' .options .option input[type="checkbox"]');

    var selectedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);

    var selectedValues = selectedCheckboxes.map(checkbox => checkbox.value);
    var instrumentList = selectedValues.join(' ');
    console.log('selectedValues', selectedValues);
    console.log('instrumentList', instrumentList);
    $.ajax({
        method: 'POST',
        url: 'http://localhost/symphony/serviceproviders/studioInstrument',
        content: 'application/json',
        data: JSON.stringify({instruments: instrumentList}),
        success: function (response) {
            console.log('Backend response:', response);
            document.querySelector('.submit'+productId).click();
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}

function toggleOptions(productId, instrumentArray) {
    var optionsContainer = document.querySelector('.dropdown' + productId + ' .options');
    optionsContainer.style.display = optionsContainer.style.display === 'block' ? 'none' : 'block';

    // var optionsContainer = document.querySelector('.input-box' + item.product_id + ' .dropdown2 .options');
    // var optionsContainer = document.getElementById(item.product_id);
}

// function toggleCategory(category) {
//   $('#' + category).toggle();
//   updateDisplayedData();
// }


//item details
function addItem(productId,instrumentArray) {
    var element1 = document.querySelector('.item-modal' + productId);
    element1.classList.toggle('toggled');
    var optionsContainer = document.querySelector('.dropdown' + productId + ' .options');
    if (optionsContainer) {
        optionsContainer.querySelectorAll('.dropdown' + productId + ' .options .option input[type="checkbox"]').forEach(function (checkbox) {
            var checkboxValue = checkbox.value.trim();
            if (instrumentArray.includes(checkboxValue)) {
                checkbox.checked = true;
            }
        });
    } else {
        console.error('optionsContainer is null. Check your selector or HTML structure.');
    }
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

//search
//     document.getElementById("search-item").addEventListener("keyup", search);

// function search() {
//     const searchBox = document.getElementById("search-item").value.toUpperCase();
//     // const storeItems = document.getElementById("");
//     const products = document.querySelectorAll(".item-container");
//
//
//     products.forEach(product => {
//         const titleElement = product.querySelector("h3");
//         const brand = product.querySelector("p:nth-child(2)");
//         const model = product.querySelector("p:nth-child(3)");
//
//         if (titleElement || brand || model) {
//             const textValue = titleElement.textContent || titleElement.innerHTML;
//             const brandValue = brand.textContent || brand.innerHTML;
//             const modelValue = model.textContent || model.innerHTML;
//
//             if (textValue.toUpperCase().indexOf(searchBox) > -1 || brandValue.toUpperCase().indexOf(searchBox) > -1 || modelValue.toUpperCase().indexOf(searchBox) > -1) {
//                 product.style.display = "";
//             } else {
//                 product.style.display = "none";
//             }
//         }
//     });
// }

