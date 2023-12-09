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
  var method = '';

  Redirect(method);
  function Redirect(method){
    if (method.length !== 0){
      $.ajax({
        method: 'POST',
        url: 'http://localhost/symphony/serviceproviders/'+method,
        dataType: 'json',
        success: function(response) {
          displaydata(response);
          console.log('method');
        },
        error: function(error) {
          console.error('Error:', error);
        }
      });
    }else{
      $.ajax({
        method: 'GET',
        url: 'http://localhost/symphony/serviceproviders/inventoryDelete',
        dataType: 'json',
        success: function(response) {
          displaydata(response);
          console.log('no method');
        },
        error: function(error) {
          console.error('Error:', error);
        }
      });
    }
  }

  function Delete(productId) {
    var confirmed = confirm("Are you sure you want to delete this item?");
    if (confirmed) {
      $.ajax({
        method: 'POST',
        url: 'http://localhost/symphony/serviceproviders/deleteitem/'+productId,
        success: function(response) {
          Redirect(method);
        },
        error: function(error) {
          console.error('Error:', error);
        }
      });
    } else {
      alert("Deletion canceled.");
    }
  }

  function displaydata(data){
    var inventory = data.inventory;
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
            <!-- User reviews go here -->
            `<div class="user-review">`+
            `<a href="http://" style="font-size: 0.9rem;">Read Customer Reviews</a>`+
            `</div>`+
                `</div>`+
            `</div>`+
            <!-- Review section -->
            `<div class="reviews">`+
                `<div class="bin">`+
                    `<img src="http://localhost/symphony/img/bin.png" alt="bin-icon"  class = "bin" id="bin_<?php echo $inventory->product_id; ?>" onclick="Delete(`+item.product_id+`)"/>`+
                `</div>`+
                <!-- Add more reviews as needed -->
            `</div>`+
        `</div>`+
        `<div class="item-modal item-modal`+item.product_id+`">`+
    `<div class="addItem">`+
        `<a href="" onclick="addItem(`+item.product_id+`)">X</a>`+
        `<p>Edit details</p>`+
        `<form id="edit-item-form" action="http://localhost/symphony/serviceproviders/edititem/`+item.product_id+`" method="POST" enctype="multipart/form-data">`+
            `<div class="input-box">`+
                `<label>Title</label>`+
                `<input type="text" name="title" class="<?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="`+item.Title+`">`+
            `</div>`+
            <!--                category-->
            `<div class="input-box">`+
                `<label>Category</label>`+
                `<div class="custom-select">`+
                    `<select id="categorySelect`+item.product_id+`" onchange="updateBrandOptions(`+item.product_id+`)" name="category">`+
                        `<option value="Electric_Guitars" `+(item.category === 'Electric_Guitars' ? 'selected' : '')+`>Electric guitars</option>`+
                        `<option value="Keyboard" `+(item.category === 'Keyboard' ? 'selected' : '')+`>Keyboard</option>`+
                        `<option value="Acoustic_Guitars" `+(item.category === 'Acoustic_Guitars' ? 'selected' : '')+`>Acoustic Guitars</option>`+
                        `<option value="Brass" `+(item.category === 'Brass' ? 'selected' : '')+`>Brass</option>`+
                        `<option value="sounds" `+(item.category === 'sounds' ? 'selected' : '')+`>Sounds</option>`+
                `</select>`+
                `</div>`+
            `</div>`+
                `<!--                band and orchestra-->`+
            `<div className="band" id="band`+item.product_id+`">`+
            `<div class="input-box">`+
                `<label>Brass category</label>`+
                `<div class="custom-select">`+
                    `<select id="bandOrchestraCategories`+item.product_id+`" onchange="updateSubBrandOptions(`+item.product_id+`)" name="bandOrchestraCategories">`+
                        `<option value="Woodwind" `+(item.brass === 'Woodwind' ? 'selected' : '')+`>Woodwind</option>`+
                        `<option value="Saxophones" `+(item.brass === 'Saxophones' ? 'selected' : '')+`>Saxophones</option>`+
                        `<option value="Flutes" `+(item.brass === 'Flutes' ? 'selected' : '')+`>Flutes</option>`+
                       ` <option value="Clarinets" `+(item.brass === 'Clarinets' ? 'selected' : '')+`>Clarinets</option>`+
                       ` <option value="Brass" `+(item.brass === 'Brass' ? 'selected' : '')+`>Brass</option>`+
                        `<option value="Trumpets" `+(item.brass === 'Trumpets' ? 'selected' : '')+`>Trumpets</option>`+
                        `<option value="String" `+(item.brass === 'String' ? 'selected' : '')+`>String</option>`+
                        `<option value="Violins" `+(item.brass === 'Violins' ? 'selected' : '')+`>Violins</option>`+
                    `</select>`+
                `</div>`+
            `</div>`+
            `</div>`+
            `<!--                home audio-->`+
            `<div className="home" id="home`+item.product_id+`">`+
            `<div class="input-box">`+
                `<label>Home Audio category</label>`+
                `<div class="custom-select">`+
                    `<select id="homeAudioCategory`+item.product_id+`" onchange="updateSubBrandOptions(`+item.product_id+`)" name="homeAudioCategory">`+
                        `<option value="Headphones" `+(item.sounds === 'Headphones' ? 'selected' : '')+`>Headphones</option>`+
                        `<option value="Receivers" `+(item.sounds === 'Receivers' ? 'selected' : '')+`>Receivers</option>`+
                        `<option value="Amplifiers" `+(item.sounds === 'Amplifiers' ? 'selected' : '')+`>Amplifiers</option>`+
                        `<option value="Floor speakers" `+(item.sounds === 'Floor speakers' ? 'selected' : '')+`>Floor speakers</option>`+
                        `<option value="Subwoofers" `+(item.sounds === 'Subwoofers' ? 'selected' : '')+`>Subwoofers</option>`+
                        `<option value="Tape Decks" `+(item.sounds === 'Tape Decks' ? 'selected' : '')+`>Tape Decks</option>`+
                        `<option value="Turntables" `+(item.sounds === 'Turntables' ? 'selected' : '')+`>Turntables</option>`+
                        `<option value="amps" `+(item.sounds === 'amps' ? 'selected' : '')+`>Amps</option>`+
            `</select>`+
                `</div>`+
            `</div>`+
            `</div>`+
            `<!--brand-->`+
            `<div class="input-box">`+
                `<label>Brand</label>`+
                `<div class="custom-select">`+
                    `<select id="brandSelect`+item.product_id+`" name="brand">`+
                    `</select>`+
                `</div>`+
            `</div>`+
            //..... availability / out of stock.....
            `<div class="input-box">`+
                `<label>Availability</label>`+
            `<select name="availabilty" id="availability`+item.product_id+`">`+
             ` <option value="0">Available</option>`+
              `<option value="1">Unavailable</option>`+
            `</select>`+
            `</div>`+
            `<!--                Model-->`+
            `<div class="input-box">`+
            `<label>Model</label>`+
            `<input type="text" required name="model" class="<?php echo (!empty($data['model_err'])) ? 'is-invalid' : ''; ?>" value="`+item.model+`">`+
            `</div>`+
            `<!--                quantity-->`+
            `<div class="input-box">`+
                `<label>Quantity</label>`+
                `<input type="number" required name="quantity" class="<?php echo (!empty($data['quantity_err'])) ? 'is-invalid' : ''; ?>" value="`+item.quantity+`">`+
            `</div>`+
            `<!--                Unit price-->`+
            `<div class="input-box">`+
               ` <label>Unit Price (Lkr)</label>`+
                `<input type="number" required name="unit_price" class="<?php echo (!empty($data['unit_price_err'])) ? 'is-invalid' : ''; ?>" value="`+item.unit_price+`">`+
            `</div>`+
            `<div class="input-box">`+
            ` <label>Warranty date</label>`+
            `<input type="date" required name="warranty" class="<?php echo (!empty($data['unit_price_err'])) ? 'is-invalid' : ''; ?>" value="`+item.warranty+`">`+
            `</div>`+
            `<!--                description-->`+
            `<div class="description">`+
                `<div class="input-box">`+
                   ` <label>Description</label>`+
                `</div>`+
                `<div class="textArea">`+
                    `<textarea id="description" name="description" rows="4" required style="width: 290px;height: 150px">`+item.Description+`</textarea>`+
                `</div>`+
            `</div>`+
            `<!--                photos-->`+
            `<div class="photo_container">`+
                `<div class="input-box">`+
                    `<label style="font-weight: bold">Add up to 3 photos</label>`+
                `</div>`+
                `<div class="photo-table">`+
                    `<div class="photo-outer">`+
                        `<div class="photo-inner">`+
                            `<img src="http://localhost/symphony/img/serviceProvider/`+item.photo_1+`" id="previewPhoto_1`+item.product_id+`" onclick="triggerInput(1,`+item.product_id+`)">`+
                            `<input type="file" onchange="previewImage(this, 'previewPhoto_1`+item.product_id+`')"  id="photo_1`+item.product_id+`" accept=".jpg, .jpeg, .png, .HEIC" name="photo_1-`+item.product_id+`" class="photo_1" value="http://localhost/symphony/img/serviceProvider/`+item.photo_1+`">`+
                        `</div>`+
                    `</div>`+
                    `<div class="photo-outer">`+
                        `<div class="photo-inner">`+
                            `<img src="http://localhost/symphony/img/serviceProvider/`+item.photo_2+`" id="previewPhoto_2`+item.product_id+`" onclick="triggerInput(2,`+item.product_id+`)">`+
                            `<input type="file" onchange="previewImage(this, 'previewPhoto_2`+item.product_id+`')"  id="photo_2`+item.product_id+`" accept=".jpg, .jpeg, .png, .HEIC" name="photo_2-`+item.product_id+`" class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['photo_2']; ?>" >`+
                        `</div>`+
                    `</div>`+
                    `<div class="photo-outer">`+
                        `<div class="photo-inner">`+
                            `<img src="http://localhost/symphony/img/serviceProvider/`+item.photo_3+`" id="previewPhoto_3`+item.product_id+`" onclick="triggerInput(3,`+item.product_id+`)">`+
                            `<input type="file" onchange="previewImage(this, 'previewPhoto_3`+item.product_id+`')"  id="photo_3`+item.product_id+`" accept=".jpg, .jpeg, .png, .HEIC" name="photo_3-`+item.product_id+`" class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['photo_3']; ?>">`+
                        `</div>`+
                    `</div>`+
                `</div>`+
            `</div>`+
            `<button id="submitBtn">Save</button>`+
        `</form>`+
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

  //thumbnail category
  function allItem(){
    method = 'inventoryAll';
    Redirect(method);
  }
  function electricGuitars(){
    method = 'electricGuitars';
    Redirect(method);
  }
  function keyboard(){
    method = 'keyboard';
    Redirect(method);
  }
  function acousticGuitars(){
    method = 'acousticGuitars';
    Redirect(method);
  }
  function bandAndOrchestra(){
    method = 'bandAndOrchestra';
    Redirect(method);
  }
  function homeAudio(){
    method = 'homeAudio';
    Redirect(method);
  }

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

  // categories and brands dynamically
  function updateBrandOptions(productId) {
    var categorySelect = document.getElementById('categorySelect'+productId);
    var bandOrchestraCategories = document.getElementById("band"+productId);
    var homeAudio = document.getElementById("home"+productId);

    if (categorySelect.value === "Brass") {
      bandOrchestraCategories.style.display = "block";
    } else {
      bandOrchestraCategories.style.display = "none";
    }
    if (categorySelect.value === "sounds") {
      homeAudio.style.display = "block";
    } else {
      homeAudio.style.display = "none";
    }
    updateSubBrandOptions(productId);
  }
  function updateSubBrandOptions(productId){
    var categorySelect = document.getElementById("categorySelect"+productId);
    var subcategorySelect = document.getElementById("bandOrchestraCategories"+productId);
    var brandSelect = document.getElementById("brandSelect"+productId);
    var homeAudio = document.getElementById("homeAudioCategory"+productId);

    brandSelect.innerHTML = '';

    // var addBrandOption = [];

    if (categorySelect.value === 'Electric_Guitars') {
      // addBrandOption = ["Yamaha","Gibson","Epiphone","Ibanez","Jackson","Schecter","ESP","Washburn","Charvel"];
      addBrandOption('Yamaha',productId);
      addBrandOption('Gibson',productId);
      addBrandOption('Epiphone',productId);
      addBrandOption('Ibanez',productId);
      addBrandOption('Jackson',productId);
      addBrandOption('Schecter',productId);
      addBrandOption('ESP',productId);
      addBrandOption('Washburn',productId);
      addBrandOption('Charvel',productId);

    } else if (categorySelect.value === 'Acoustic_Guitars') {
      // addBrandOption = ["Yamaha","Gibson","Epiphone","Ibanez","Jackson","Schecter","ESP","Washburn","Charvel"];
      addBrandOption('Yamaha',productId);
      addBrandOption('Gibson',productId);
      addBrandOption('Epiphone',productId);
      addBrandOption('Ibanez',productId);
      addBrandOption('Jackson',productId);
      addBrandOption('Schecter',productId);
      addBrandOption('ESP',productId);
      addBrandOption('Washburn',productId);
      addBrandOption('Charvel',productId);

    }else if (categorySelect.value === 'Keyboard') {
      addBrandOption('Yamaha', productId);
      addBrandOption('Roland', productId);
      addBrandOption('Korg', productId);
      addBrandOption('Casio', productId);
      addBrandOption('Nord', productId);
      addBrandOption('Moog', productId);
      addBrandOption('Kurzweil', productId);
      addBrandOption('Novation', productId);
      addBrandOption('Arturia', productId);

    }else if (categorySelect.value === 'Brass') {
      if (subcategorySelect.value === "Woodwind") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      } else if (subcategorySelect.value === "Saxophones") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      } else if (subcategorySelect.value === "Flutes") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Armstrong',productId);
        addBrandOption('Trevor James',productId);
        addBrandOption('Powell',productId);

      }else if (subcategorySelect.value === "Clarinets") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      } else if (subcategorySelect.value === "Trumpets") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      } else if (subcategorySelect.value === "String") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      }else{
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      }

    }else if (categorySelect.value === 'sounds') {
      if (homeAudio.value === "Headphones") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      } else if (homeAudio.value === "Receivers") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      } else if (homeAudio.value === "Amplifiers") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      }else if (homeAudio.value === "Floor speakers") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      } else if (homeAudio.value === "Subwoofers") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      }else if (homeAudio.value === "Tape Decks") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      }else if (homeAudio.value === "Turntables") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      }else if (homeAudio.value === "amps") {
        addBrandOption('Yamaha',productId);
        addBrandOption('Gibson',productId);
        addBrandOption('Epiphone',productId);
        addBrandOption('Ibanez',productId);
        addBrandOption('Jackson',productId);
        addBrandOption('Schecter',productId);
        addBrandOption('ESP',productId);
        addBrandOption('Washburn',productId);
        addBrandOption('Charvel',productId);

      }
    }
  }

  function addBrandOption(brand,productId) {
    var brandSelect = document.getElementById('brandSelect'+productId);
    var option = document.createElement('option');
    option.value = brand;
    option.text = brand;
    brandSelect.add(option);
  }

  // updateBrandOptions(productId);

