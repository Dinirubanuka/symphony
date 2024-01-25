<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instrument</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-inventory.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/inventory.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/category.css"/>
</head>
<body>
<!--navigation bar-->
<?php require_once APPROOT . '/views/inc/sp-studio-nav-bar.php'; ?>
<div class="upperCategory">
    <div class="categories">
        <div class="category">
            <div class="category-name" onclick="toggleCategory('location')">Location</div>
            <ul class="equipment-list" id="location" onchange="updateDisplayedData()">

            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('AirCondition')">Air Condition</div>
            <ul class="equipment-list airCondition" id="AirCondition" onchange="airCondition()" >
                <li class="equipment-item"><input type="checkbox"> Yes</li>
                <li class="equipment-item"><input type="checkbox"> No</li>
            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('price')">Price</div>
            <ul class="equipment-list price" id="price">
                <li class="equipment-item"><input type="number"
                                                  style="width: 50px;border: 1px solid #dad7d7;padding: 10px;"></li>
                <li class="equipment-item" style="padding: 10px">-</li>
                <li class="equipment-item"><input type="number"
                                                  style="width: 50px;border: 1px solid #dad7d7;padding: 10px"></li>
            </ul>
        </div>
        <div class="category sort">
            <div class="category-name" onclick="toggleCategory('sort')">Sort</div>
            <div class="sort-section">
                <select id="sort">
                    <option value="name-asc">Name (A-Z)</option>
                    <option value="name-desc">Name (Z-A)</option>
                    <option value="price-asc">Price (Low to High)</option>
                    <option value="price-desc">Price (High to Low)</option>
                    <option value="date-asc">Date Added (Oldest First)</option>
                    <option value="date-desc">Date Added (Newest First)</option>
                </select>
            </div>
        </div>
    </div>
    <div class="account-requests">

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://kit.fontawesome.com/3376ff6b83.js" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT; ?>/js/studio.js"></script>
<script>
    var districts = ["Colombo", "Gampaha", "Kandy", "Jaffna", "Matara", "Nuwara Eliya", "Galle" , "Matara", "Hambanthota","Jaffna","Kilinochchi", "Mannar","Mullaitivu","Vavuniya","Batticola","Ampara","Trincomalee","Kurunegala","Puttalam","Anuradhapura","Polonnaruwa","Badulla","Monaragala","Ratnapura","Kegalle"];

    var equipmentList = document.getElementById("location");

    for (var i = 0; i < districts.length; i++) {
        var district = districts[i];
        var liElement = document.createElement("li");
        liElement.className = "equipment-item";
        liElement.innerHTML = '<input type="checkbox"> ' + district;
        equipmentList.appendChild(liElement);
    }
</script>
</body>
</html>