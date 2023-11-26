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

<h1 style="color: white">Inventory</h1>
<div class="thumbnail">
    <div class="item">
        <img src="<?php echo URLROOT; ?>/img/all.jpg" onclick="triggerAll()">
        <form action = "<?php echo URLROOT; ?>/serviceproviders/inventory" method ="post">
            <input class="accept-button" type = "submit" value = "Edit" id = "all" style="display: none">
        </form>
        <div class="content">
            All
        </div>
    </div>
    <div class="item">
        <img src="<?php echo URLROOT; ?>/img/electricGuitar.jpg" onclick="triggerElectric()">
        <form action = "<?php echo URLROOT; ?>/serviceproviders/electricGuitars" method ="post">
            <input class="accept-button" type = "submit" value = "Edit" id = "electricGuitars" style="display: none">
        </form>
        <div class="content">
            Electric<br>guitars
        </div>
    </div>
    <div class="item">
        <img src="<?php echo URLROOT; ?>/img/keyboard.jpg" onclick="triggerKeyboard()">
        <form action = "<?php echo URLROOT; ?>/serviceproviders/keyboard" method ="post">
            <input class="accept-button" type = "submit" value = "Edit" id = "keyboard" style="display: none">
        </form>
        <div class="content">
            Keyboard
        </div>
    </div>
    <div class="item">
        <img src="<?php echo URLROOT; ?>/img/acousticGuita.jpg" onclick="triggerAcoustic()">
        <form action = "<?php echo URLROOT; ?>/serviceproviders/acousticGuitars" method ="post">
            <input class="accept-button" type = "submit" value = "Edit" id = "acousticGuitars" style="display: none">
        </form>
        <div class="content">
            Acoustic<br>Guitars
        </div>
    </div>
    <div class="item">
        <img src="<?php echo URLROOT; ?>/img/amps.jpg" onclick="triggerAmps()">
        <form action = "<?php echo URLROOT; ?>/serviceproviders/amps" method ="post">
            <input class="accept-button" type = "submit" value = "Edit" id = "amps" style="display: none">
        </form>
        <div class="content">
            Amps
        </div>
    </div>
    <div class="item">
        <img src="<?php echo URLROOT; ?>/img/bassGuitar.jpg" onclick="triggerBass()">
        <form action = "<?php echo URLROOT; ?>/serviceproviders/bassGuitars" method ="post">
            <input class="accept-button" type = "submit" value = "Edit" id = "bassGuitars" style="display: none">
        </form>
        <div class="content">
            Bass<br>guitars
        </div>
    </div>
    <div class="item">
        <img src="<?php echo URLROOT; ?>/img/bandOrchestra.jpg" onclick="triggerBand()">
        <form action = "<?php echo URLROOT; ?>/serviceproviders/bandAndOrchestra" method ="post">
            <input class="accept-button" type = "submit" value = "Edit" id = "bandAndOrchestra" style="display: none">
        </form>
        <div class="content">
            Band <br>and <br>Orchestra
        </div>
    </div>
    <div class="item">
        <img src="<?php echo URLROOT; ?>/img/home.jpg" onclick="triggerHome()">
        <form action = "<?php echo URLROOT; ?>/serviceproviders/homeAudio" method ="post">
            <input class="accept-button" type = "submit" value = "Edit" id = "homeAudio" style="display: none">
        </form>
        <div class="content">
            Home<br>Audio
        </div>
    </div>
</div>

<div class="account-requests">
    <?php foreach($data['inventory'] as $inventory) : ?>
        <div class="request">
            <div class="request-details">
                <h2><?php echo $inventory->category; ?></h2>
                <p>Brand: <?php echo $inventory->brand; ?></p>
                <p>Model: <?php echo $inventory->model; ?></p>
                <p>Quantity: <?php echo $inventory->quantity; ?></p>
                <p>Price: <?php echo $inventory->unit_price; ?></p>
            </div>
            <div class="request-photo">
                <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $inventory->photo_1; ?>" alt="Business B Photo">
            </div>
            <div class="request-actions">
                <form action = "<?php echo URLROOT; ?>/serviceproviders/edititem/<?php echo $inventory->product_id; ?>" method ="post">
                    <div class = "edit-link">
                        <input class="accept-button" type = "submit" value = "Edit" id = "editButton">
                    </div>
                </form>
                <form action = "<?php echo URLROOT; ?>/serviceproviders/deleteitem/<?php echo $inventory->product_id; ?>" method ="post">
                    <div class = "edit-link">
                        <input class="decline-button" onclick="DeleteItem()" type = "submit" value = "Delete" id = "deleteButton">
                    </div>
                </form>
                <!-- <button class="decline-button">Remove</button> -->
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>

</div>
<script src="<?php echo URLROOT;?>/js/sp-inventory.js"></script>
</body>
</html>
