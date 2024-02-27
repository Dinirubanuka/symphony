var $data;
var Orgdata;
// script.js
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
      url: 'http://localhost/symphony/users/search',
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

        var categoryString = item.category;
        var categoryArray = categoryString.split(' ');
        console.log(item.category);
        console.log(categoryArray);

        if (categoryArray[0] === 'Electric Guitars'){
          item.category = 'Electric Guitars';
        }else if (categoryArray[0] ==='Acoustic Guitars'){
          item.category = 'Acoustic Guitars';
        }else if (categoryArray[0] ==='Keyboard'){
          item.category = 'Keyboard';
          if (categoryArray[1] ==='Piano'){
            item.keyboard = 'Piano';
          }else if (categoryArray[1] ==='Organs'){
            item.keyboard = 'Organs';
          }
        }else if (categoryArray[0] ==='Band_And_Orchestra'){
          item.category = 'Band_And_Orchestra';
          if (categoryArray[1] === 'Woodwind'){
            item.band = 'Woodwind';
            if (categoryArray[2] ==='Flutes'){
              item.woodwind = 'Flutes';
            }else if (categoryArray[2] ==='Saxophones'){
              item.woodwind = 'Saxophones';
            }else if (categoryArray[2] ==='Clarinets'){
              item.woodwind = 'Clarinets';
            }
          }else if (categoryArray[1] === 'Brass'){
            item.band = 'Brass';
            if (categoryArray[2] ==='Trumphet'){
              item.brass = 'Trumphet';
            }else if (categoryArray[2] ==='Trombones'){
              item.brass = 'Trombones';
            }else if (categoryArray[2] ==='FrenchHorns'){
              item.brass = 'FrenchHorns';
            }
          }else if (categoryArray[1] === 'String'){
            item.band = 'String';
            if (categoryArray[2] ==='Violins'){
              item.string = 'Violins';
            }else if (categoryArray[2] ==='Cellos'){
              item.string = 'Cellos';
            }else if (categoryArray[2] ==='Violas'){
              item.string = 'Violas';
            }
          }
        }else if (categoryArray[0] ==='Audio'){
          item.category = 'Audio';
          if (categoryArray[1] ==='Headphones'){
            item.audio = 'Headphones';
          }else if (categoryArray[1] ==='Receivers'){
            item.audio = 'Receivers';
          }else if (categoryArray[1] ==='Amplifiers'){
            item.audio = 'Amplifiers';
          }
          if (categoryArray[1] ==='Speakers'){
            item.audio = 'Speakers';
          }else if (categoryArray[1] ==='Subwoofers'){
            item.audio = 'Subwoofers';
          }else if (categoryArray[1] ==='Tape_Decks'){
            item.audio = 'Tape_Decks';
          }
          if (categoryArray[1] ==='Turntables'){
            item.audio = 'Turntables';
          }else if (categoryArray[1] ==='Microphones'){
            item.audio = 'Microphones';
          }else if (categoryArray[1] ==='Mixers'){
            item.audio = 'Mixers';
          }else if (categoryArray[1] ==='Recording'){
            item.audio = 'Recording';
          }
        }else if (categoryArray[0] ==='Percussion'){
          item.category = 'Percussion';
          if (categoryArray[1] ==='Cymbals'){
            item.persussion = 'Cymbals';
          }else if (categoryArray[1] ==='Drums'){
            item.persussion = 'Drums';
          }
        }

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
                        `<p>Price(LKR): `+item.unit_price+`</p>`+
                        `<button href="" onclick="viewItem(`+item.product_id+`)" style="color: orange">see more details</button>`+
                        `<p>`+stockText+`</p>`+
            
            `<div class="user-review">`+
            `<a href="http://" style="font-size: 0.9rem;">Read Customer Reviews</a>`+
            `</div>`+
                `</div>`+
            `</div>`+
           
            `<div class="reviews">`+
                `<div class="bin">`+
                    `<img src="http://localhost/symphony/img/bin.png" alt="bin-icon"  class = "bin" id="bin_<?php echo $inventory->product_id; ?>" onclick="Delete(`+item.product_id+`)"/>`+
                `</div>`+
               
            `</div>`+
        `</div>`+
        `<div class="item-modal item-modal`+item.product_id+`">`+
    `<div class="viewItem">`+
        `<a href="<?php echo URLROOT; ?>/users/viewItem" onclick="viewItem(`+item.product_id+`)">X</a>`+
    `</div>`+
`</div>`;
      });
      accReq.innerHTML=req;
    } else {
      req +=`<p style="color: white">No inventory data Available</p>`
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

  //item details
  function addItem(productId){
    var element1 = document.querySelector('.item-modal'+productId);
    updateBrandOptions(productId);
    element1.classList.toggle('toggled');
  }

  // add photo
  function triggerInput(id,productId){
    document.getElementById("photo_"+id+productId).click();
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

  // updateBrandOptions(productId);

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
