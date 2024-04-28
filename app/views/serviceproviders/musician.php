<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-inventory.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav-bar.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/instrument.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-notifications.css">

    <title>Dashboard</title>
</head>
<body>
<!-----------profile-nav-bar-------->
<?php require_once APPROOT . '/views/inc/musician-nav.php'; ?>

<div class="upperCategory">
    <div class="categories">
        <div class="heading" style="padding: 10px">
            <h2>Musicians Inventory</h2>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('stringInstruments')">String Instruments</div>
            <ul class="equipment-list" id="stringInstruments" onchange="updateDisplayedData()">
                <li class="equipment-item"><input type="checkbox"> Electric Guitars</li>
                <li class="equipment-item"><input type="checkbox"> Acoustic Guitars</li>
                <li class="equipment-item"><input type="checkbox"> Violins</li>
                <li class="equipment-item"><input type="checkbox"> Cellos</li>
                <li class="equipment-item"><input type="checkbox"> Violas</li>
                <li class="equipment-item"><input type="checkbox"> Digital Piano</li>
                <li class="equipment-item"><input type="checkbox"> Harp</li>
                <li class="equipment-item"><input type="checkbox"> Mandolin</li>
                <li class="equipment-item"><input type="checkbox"> Piano</li>
                <li class="equipment-item"><input type="checkbox"> Sitar</li>
                <li class="equipment-item"><input type="checkbox"> Veena</li>
            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('woodwindInstruments')">Woodwind Instruments</div>
            <ul class="equipment-list" id="woodwindInstruments" onchange="updateDisplayedData()">
                <li class="equipment-item"><input type="checkbox"> Bassoon</li>
                <li class="equipment-item"><input type="checkbox"> Clarinet</li>
                <li class="equipment-item"><input type="checkbox"> Dizi</li>
                <li class="equipment-item"><input type="checkbox"> Flute</li>
                <li class="equipment-item"><input type="checkbox"> Oboe</li>
                <li class="equipment-item"><input type="checkbox"> Piccolo</li>
                <li class="equipment-item"><input type="checkbox"> Saxophone</li>
            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('brassInstruments')">Brass Instruments</div>
            <ul class="equipment-list" id="brassInstruments" onchange="updateDisplayedData()">
                <li class="equipment-item"><input type="checkbox"> Trumpet</li>
                <li class="equipment-item"><input type="checkbox"> Trombone</li>
                <li class="equipment-item"><input type="checkbox"> Tuba</li>
                <li class="equipment-item"><input type="checkbox"> French Horn</li>
            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('percussionInstruments')">Percussion Instruments</div>
            <ul class="equipment-list" id="percussionInstruments" onchange="updateDisplayedData()">
                <li class="equipment-item"><input type="checkbox"> Bass Drum</li>
                <li class="equipment-item"><input type="checkbox"> Cajon</li>
                <li class="equipment-item"><input type="checkbox"> Congas</li>
                <li class="equipment-item"><input type="checkbox"> Djembe</li>
                <li class="equipment-item"><input type="checkbox"> Snare Drum</li>
                <li class="equipment-item"><input type="checkbox"> Tabla</li>
                <li class="equipment-item"><input type="checkbox"> Talking Drum</li>
                <li class="equipment-item"><input type="checkbox"> Timpani</li>
            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('keyboardInstruments')">Keyboard Instruments</div>
            <ul class="equipment-list" id="keyboardInstruments" onchange="updateDisplayedData()">
                <li class="equipment-item"><input type="checkbox"> Piano</li>
                <li class="equipment-item"><input type="checkbox"> Organ</li>
                <li class="equipment-item"><input type="checkbox"> Digital Piano</li>
                <li class="equipment-item"><input type="checkbox"> Harpsichord</li>
                <li class="equipment-item"><input type="checkbox"> Synthesizer</li>
            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('audioInstruments')">Audio</div>
            <ul class="equipment-list" id="audioInstruments" onchange="updateDisplayedData()">
                <li class="equipment-item"><input type="checkbox"> Headphones</li>
                <li class="equipment-item"><input type="checkbox"> Receivers</li>
                <li class="equipment-item"><input type="checkbox"> Amplifiers</li>
                <li class="equipment-item"><input type="checkbox"> Speakers</li>
                <li class="equipment-item"><input type="checkbox"> Subwoofers</li>
                <li class="equipment-item"><input type="checkbox"> Tape Deks</li>
                <li class="equipment-item"><input type="checkbox"> Truntables</li>
                <li class="equipment-item"><input type="checkbox"> Microphones</li>
                <li class="equipment-item"><input type="checkbox"> Mixers</li>
                <li class="equipment-item"><input type="checkbox"> Recordings</li>
            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('location')">Location</div>
            <ul class="equipment-list" id="location" onchange="updateDisplayedData()"  >

            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="">Price</div>
            <ul class="equipment-list price" id="price" >
                <li class="equipment-item"><input type="number"
                                                  style="width: 50px;border: 1px solid #dad7d7;padding: 10px;" onchange="price()" id = "value1" ></li>
                <li class="equipment-item" style="padding: 10px">-</li>
                <li class="equipment-item  "><input type="number"
                                                    style="width: 50px;border: 1px solid #dad7d7;padding: 10px" onchange="price()" id= "value2"></li>
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
<script src="<?php echo URLROOT; ?>/js/musician.js"></script>
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
