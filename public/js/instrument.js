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

Redirect();
function Redirect() {
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

            req += `<div class="item-container">`+
                `<div class="item-details">`+
                `<div class="image-carousel">`+
                `<img class="carousel-image" src="http://localhost/symphony/img/serviceProvider/`+item.photo_1+`" alt="Placeholder Image 1" style="display: block">`+
                `</div>`+
                `<div class="item-info">`+
                `<h3>Title:`+item.Title+`</h3>`+
                `<p>Brand: `+item.brand+`</p>`+
                `<p>Model:  `+item.model+`</p>`+
                `<p>Units Left:  `+item.quantity+`</p>`+
                `<p>Price(Lkr): `+item.unit_price+`</p>`+
                `<button href="" onclick="addItem(`+item.product_id+`)" style="color: orange">see more details</button>`+
                `<p>`+stockText+`</p>`+
                // <!-- Add cart -->
                // `<div class="add-cart">`+
                // `<a href="http://" style="font-size: 0.9rem;">Read Customer Reviews</a>`+
                // `</div>`+
                `</div>`+
                `</div>`+
                // `<div class="reviews">`+
                // `<div class="bin">`+
                // `<img src="http://localhost/symphony/img/bin.png" alt="bin-icon"  class = "bin" id="bin_<?php echo $inventory->product_id; ?>" onclick="Delete(`+item.product_id+`)"/>`+
                // `</div>`+
                // <!-- Add more reviews as needed -->
                // `</div>`+
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
