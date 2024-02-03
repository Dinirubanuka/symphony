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
<?php require_once APPROOT . '/views/inc/index-nav.php'; ?>

<h1 style="color: white;text-align: center;padding-bottom: 20px;letter-spacing: 2px;">Search</h1>
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
<?php foreach($data['inventory'] as $inventory) : ?>
    <div class="item-container">
        <div class="item-details">
            <div class="image-carousel">
                <img class="carousel-image" src="http://localhost/symphony/img/serviceProvider/<?php echo $inventory->photo_1; ?>" alt="Placeholder Image 1" style="display: block">
            </div>
                <div class="item-info">
                        <h3><?php echo $inventory->Title; ?></h3>
                        <p>Brand: <?php echo $inventory->brand; ?></p>
                        <p>Model:  <?php echo $inventory->model; ?></p>
                        <p>Units Left:  <?php echo $inventory->quantity; ?></p>
                        <p>Price(Lkr): <?php echo $inventory->unit_price; ?></p>
                        <form action = "<?php echo URLROOT; ?>/users/viewitem/<?php echo $inventory->product_id; ?>" method ="post">
                            <button href="" style="color: orange">see more details</button>
                        </form>
            <!-- User reviews go here -->
            
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?php echo URLROOT;?>/js/user-search.js"></script>

</body>
</html>
