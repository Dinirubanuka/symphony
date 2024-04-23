<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instrument</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/instrument.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav-bar.css">
</head>
<body>
<!--navigation bar-->
<?php require_once APPROOT . '/views/inc/viewNavBar.php'; ?>
<div class="upperCategory">
    <div class="categories">
        <div class="category">
            <div class="category-name" onclick="toggleCategory('stringInstruments')">String Instruments</div>
            <ul class="equipment-list" id="stringInstruments">
                <li class="equipment-item"><input type="checkbox"> Electric Guitars</li>
                <li class="equipment-item"><input type="checkbox"> Acoustic Guitars</li>
                <li class="equipment-item"><input type="checkbox"> Violins</li>
                <li class="equipment-item"><input type="checkbox"> Cellos</li>
                <li class="equipment-item"><input type="checkbox"> Violas</li>
            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('woodwindInstruments')">Woodwind Instruments</div>
            <ul class="equipment-list" id="woodwindInstruments">
                <li class="equipment-item"><input type="checkbox"> Flute</li>
                <li class="equipment-item"><input type="checkbox"> Clarinet</li>
                <li class="equipment-item"><input type="checkbox"> Saxophone</li>
            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('brassInstruments')">Brass Instruments</div>
            <ul class="equipment-list" id="brassInstruments">
                <li class="equipment-item"><input type="checkbox"> Trumpet</li>
                <li class="equipment-item"><input type="checkbox"> Trombone</li>
                <li class="equipment-item"><input type="checkbox"> French Horn</li>
            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('percussionInstruments')">Percussion Instruments</div>
            <ul class="equipment-list" id="percussionInstruments">
                <li class="equipment-item"><input type="checkbox"> Drums</li>
                <li class="equipment-item"><input type="checkbox"> Cymbals</li>
            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('keyboardInstruments')">Keyboard Instruments</div>
            <ul class="equipment-list" id="keyboardInstruments">
                <li class="equipment-item"><input type="checkbox"> Piano</li>
                <li class="equipment-item"><input type="checkbox"> Organ</li>
            </ul>
        </div>
        <div class="category">
            <div class="category-name" onclick="toggleCategory('audioInstruments')">Audio</div>
            <ul class="equipment-list" id="audioInstruments">
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
            <div class="category-name" onclick="toggleCategory('price')">Price</div>
            <ul class="equipment-list price" id="price">
                <li class="equipment-item"><input type="number"
                                                  style="width: 50px;border: 1px solid #dad7d7;padding: 10px;"></li>
                <li class="equipment-item" style="padding: 10px">-</li>
                <li class="equipment-item"><input type="number"
                                                  style="width: 50px;border: 1px solid #dad7d7;padding: 10px"></li>
            </ul>
        </div>
<!--        <div class="category sort">-->
<!--            <div class="category-name" onclick="toggleCategory('sort')">Sort</div>-->
<!--            <div class="sort-section">-->
<!--                <select id="sort">-->
<!--                    <option value="name-asc">Name (A-Z)</option>-->
<!--                    <option value="name-desc">Name (Z-A)</option>-->
<!--                    <option value="price-asc">Price (Low to High)</option>-->
<!--                    <option value="price-desc">Price (High to Low)</option>-->
<!--                    <option value="date-asc">Date Added (Oldest First)</option>-->
<!--                    <option value="date-desc">Date Added (Newest First)</option>-->
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->
    </div>
    <div class="account-requests">

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://kit.fontawesome.com/3376ff6b83.js" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT; ?>/js/instrument.js"></script>
</body>
</html>