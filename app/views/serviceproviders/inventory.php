<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-inventory.css"/>
    <title>Dashboard</title>
</head>
<body>
<!-----------profile-nav-bar-------->
<?php require_once APPROOT . '/views/inc/sp-index-nav.php'; ?>

<h1 style="color: white;text-align: center;padding-bottom: 20px;letter-spacing: 2px;">Inventory</h1>
<!--<div class="thumbnail">-->
<!--    <div class="item" onclick="allItem()">-->
<!--        <div class="item">-->
<!--            <div class="thumbnail-item-container">-->
<!--                <img src="--><?php //echo URLROOT; ?><!--/img/all.jpg">-->
<!--                <div class="content">-->
<!--                    All-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="item" onclick="electricGuitars()">-->
<!--            <div class="item" >-->
<!--                <div class="thumbnail-item-container">-->
<!--                    <img src="--><?php //echo URLROOT; ?><!--/img/electricGuitar.jpg" >-->
<!--                    <div class="content">-->
<!--                        Electric<br>guitars-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--    </div>-->
<!--    <div class="item" onclick="keyboard()">-->
<!--            <div class="item">-->
<!--                <div class="thumbnail-item-container">-->
<!--                    <img src="--><?php //echo URLROOT; ?><!--/img/keyboard.jpg">-->
<!--                    <div class="content">-->
<!--                        keyboard-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--    </div>-->
<!--    <div class="item" onclick="acousticGuitars()">-->
<!--        <div class="item">-->
<!--                <div class="thumbnail-item-container">-->
<!--                    <img src="--><?php //echo URLROOT; ?><!--/img/acousticGuita.jpg">-->
<!--                    <div class="content">-->
<!--                        Acoustic<br>Guitars-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--    </div>-->
<!--    <div class="item" onclick="bandAndOrchestra()">-->
<!--            <div class="item">-->
<!--                <div class="thumbnail-item-container">-->
<!--                    <img src="--><?php //echo URLROOT; ?><!--/img/bandOrchestra.jpg">-->
<!--                    <div class="content">-->
<!--                        Brass-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--    </div>-->
<!--    <div class="item" onclick="homeAudio()">-->
<!--            <div class="item">-->
<!--                <div class="thumbnail-item-container">-->
<!--                    <img src="--><?php //echo URLROOT; ?><!--/img/home.jpg">-->
<!--                    <div class="content">-->
<!--                        Sounds-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--    </div>-->
<!--</div>-->

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
</div>
<div class="account-requests">

</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?php echo URLROOT;?>/js/sp-inventory.js"></script>

</body>
</html>
