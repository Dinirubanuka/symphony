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
                `<p>Price(Lkr): `+item.unit_price+`</p>`+
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