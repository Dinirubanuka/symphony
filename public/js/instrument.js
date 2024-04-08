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
const cart1 =  document.querySelector(".cart1")
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
    cart1.innerHTML=text;
}
Redirect();
function Redirect() {
    cartItems();
    $.ajax({
        method: 'GET',
        url: 'http://localhost/symphony/users/inventory',
        dataType: 'json',
        success: function (response) {
            $data = JSON.parse(JSON.stringify(response.inventory));
            Orgdata = JSON.parse(JSON.stringify(response.inventory));
            console.log('response',response);
            displaydata($data);
            console.log('method');
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}
function displaydata(data){
    var inventory = data;
    let req = "";

    if (inventory && inventory.length > 0) {
        inventory.forEach(function (item) {
            console.log('Product ID:', item.product_id);
            console.log('Created By:', item.created_by);
            console.log('Category:', item.category);
            console.log('Brand:', item.brand);
            console.log('Model:', item.model);
            console.log('Quantity:', item.quantity);
            console.log('Unit Price:', item.unit_price);
            console.log('Description:', item.Description);
            console.log('Photo 1:', item.photo_1);
            console.log('Photo 2:', item.photo_2);
            console.log('Photo 3:', item.photo_3);
            console.log('Title:', item.Title);
            console.log('------------------------');

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
                `<p>Brand: `+item.brand+`</p>`+
                `<p>Model:  `+item.model+`</p>`+
                `<p>Units Left:  `+item.quantity+`</p>`+
                `<p>Price(LKR): `+item.unit_price+`</p>`+
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
    var selectedCategories = $('.equipment-list input:checked').map(function() {
        return $(this).parent().text().trim();
    }).get();

    var filteredData;

    if (selectedCategories.length === 0) {
        filteredData = JSON.parse(JSON.stringify(Orgdata));
    } else {
        filteredData = JSON.parse(JSON.stringify(Orgdata)).filter(function(item) {
            return selectedCategories.some(function(selectedCategory) {
                console.log(item.category);
                return item.category.includes(selectedCategory);
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

$('.equipment-list input').change(updateDisplayedData);

//search
document.getElementById("search-item").addEventListener("keyup" , search);
function search(){
    const searchBox = document.getElementById("search-item").value.toUpperCase();
    // const storeItems = document.getElementById("");
    const products = document.querySelectorAll(".item-container");


    products.forEach(product => {
        const titleElement = product.querySelector("h3");
        const brand = product.querySelector("p:nth-child(2)");
        const model = product.querySelector("p:nth-child(3)");

        if (titleElement || brand || model) {
            const textValue = titleElement.textContent || titleElement.innerHTML;
            const brandValue = brand.textContent || brand.innerHTML;
            const modelValue = model.textContent || model.innerHTML;

            if (textValue.toUpperCase().indexOf(searchBox) > -1 || brandValue.toUpperCase().indexOf(searchBox) > -1 || modelValue.toUpperCase().indexOf(searchBox) > -1) {
                product.style.display = "";
            } else {
                product.style.display = "none";
            }
        }
    });
}

function viewItem(productId){
    window.location.href = 'http://localhost/symphony/users/viewItem/'+productId ;
}