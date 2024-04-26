<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-viewItem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
  <div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/admin-sidebar.php'; ?>
    </div>
    <div class="right-component">
        <div class="wrapper">
            <div class="container">
                <div class="slides">
                    <div class="mySlides">
                        <img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_1']; ?>">
                    </div>
                    <div class="mySlides">
                        <img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_2']; ?>">
                    </div>
                    <div class="mySlides">
                        <img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_3']; ?>">
                    </div>
                </div>
                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <div class="row">
                    <div class="column">
                        <img class="demo cursor"
                            src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_1']; ?>"
                            onclick="currentSlide(1)">
                    </div>
                    <div class="column">
                        <img class="demo cursor"
                            src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_2']; ?>"
                            onclick="currentSlide(2)">
                    </div>
                    <div class="column">
                        <img class="demo cursor"
                            src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_3']; ?>"
                            onclick="currentSlide(3)">
                    </div>
                </div>
            </div>

            <div class="item-container">
                <div class="item-details">
                    <div class="item-info">
                    <form id="addToCartForm">
                            <h1><?php echo $data['Title']; ?></h1>
                            <div class=" <?php echo ($data['type'] === 'Singer') ? 'singerPhoto': ''; ?>">
                            <?php if ($data['type'] === 'Singer'): ?>
                                <img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['singerPhoto']; ?>" alt="singer photo">
                            <?php endif; ?>
                            </div>
                            <h3><div <?php echo ($data['type'] == 'Equipment') ? '' : 'style="display: none;"'; ?>>Category: <?php echo $data['category']; ?></div></h3>
                            <h3><div <?php echo ($data['type'] == 'Equipment') ? '' : 'style="display: none;"'; ?>>Brand: <?php echo $data['brand']; ?></div></h3>
                            <p><div <?php echo ($data['type'] == 'Equipment') ? '' : 'style="display: none;"'; ?>>Model: <?php echo $data['model']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Equipment') ? '' : 'style="display: none;"'; ?>>Units Available: <?php echo $data['quantity']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Equipment') ? '' : 'style="display: none;"'; ?>>Warranty available until: <?php echo $data['warranty']; ?></div></p>
                            <h3><div <?php echo ($data['type'] == 'Studio') ? '' : 'style="display: none;"'; ?>>Locations: <?php echo $data['location']; ?></div></h3>
                            <p><div <?php echo ($data['type'] == 'Studio') ? '' : 'style="display: none;"'; ?>>Instrument: <?php echo $data['instrument']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Studio') ? '' : 'style="display: none;"'; ?>>Description Sounds: <?php echo $data['descriptionSounds']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Studio') ? '' : 'style="display: none;"'; ?>>Description Studio: <?php echo $data['descriptionStudio']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Studio') ? '' : 'style="display: none;"'; ?>>Telephone Number: <?php echo $data['telephoneNumber']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Studio') ? '' : 'style="display: none;"'; ?>>Video Link: <?php echo $data['videoLink']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Studio') ? '' : 'style="display: none;"'; ?>>Air Condition: <?php echo $data['airCondition']; ?></div></p>
                            <h3><div <?php echo ($data['type'] == 'Band') ? '' : 'style="display: none;"'; ?>>Leader Name: <?php echo $data['leaderName']; ?></div></h3>
                            <p><div <?php echo ($data['type'] == 'Band') ? '' : 'style="display: none;"'; ?>>Member Count: <?php echo $data['memberCount']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Band') ? '' : 'style="display: none;"'; ?>>Leader Photo: <?php echo $data['leaderPhoto']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Band') ? '' : 'style="display: none;"'; ?>>Band Photo: <?php echo $data['bandPhoto']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Band') ? '' : 'style="display: none;"'; ?>>Location: <?php echo $data['location']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Band') ? '' : 'style="display: none;"'; ?>>Instrument: <?php echo $data['instrument']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Band') ? '' : 'style="display: none;"'; ?>>Email: <?php echo $data['email']; ?></div></p>
                            <h3><div <?php echo ($data['type'] == 'Musician') ? '' : 'style="display: none;"'; ?>>Name: <?php echo $data['musician_name']; ?></div></h3>
                            <p><div <?php echo ($data['type'] == 'Musician') ? '' : 'style="display: none;"'; ?>>NickName: (<?php echo $data['nickName']; ?>)</div></p>
                            <p><div <?php echo ($data['type'] == 'Musician') ? '' : 'style="display: none;"'; ?>>Telephone Number: <?php echo $data['telephoneNumber']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Musician') ? '' : 'style="display: none;"'; ?>>Video Link: <?php echo $data['videoLink']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Musician') ? '' : 'style="display: none;"'; ?>>Location: <?php echo $data['location']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Musician') ? '' : 'style="display: none;"'; ?>>Instrument: <?php echo $data['instrument']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Musician') ? '' : 'style="display: none;"'; ?>>Singer Photo: <?php echo $data['singerPhoto']; ?></div></p>
                            <p><div <?php echo ($data['type'] == 'Musician') ? '' : 'style="display: none;"'; ?>>Email: <?php echo $data['email']; ?></div></p>

                            <div class="<?php echo ($data['type']) == 'Singer' ? 'singerDetails': '' ?>">
                            <h3><div <?php echo ($data['type'] == 'Singer') ? '' : 'style="display: none;"'; ?>><?php echo $data['singer_name']; ?></div></h3>
                            <h4><div <?php echo ($data['type'] == 'Singer') ? '' : 'style="display: none;"'; ?>>(<?php echo $data['nickName']; ?>)</div></h4>
                                </div>
                                <?php if ($data['type'] === 'Singer') : ?>
                                    <h4>Rate: <?php echo $data['unit_price']; ?><span> /per day</span></h4>
                                <?php endif; ?>

                                <p><div <?php echo ($data['type'] == 'Singer') ? '' : 'style="display: none;"'; ?>><img src="http://localhost/symphony/img/location-pin.png" alt="camera-icon" class="" id="" style="height: 16px;width: 16px;"> <?php echo $data['location']; ?></div></p>
                                <p>Description: <?php echo $data['Description']; ?></p>
                                <div class="contactBox">
                                    <div class="emailBox" <?php echo ($data['type'] == 'Singer') ? '' : 'style="display: none;"'; ?>>
                                        <div><img src="http://localhost/symphony/img/email.png" alt="camera-icon" class="" id="" style="height: 16px;width: 16px;"></div>
                                        <div><?php echo $data['email']; ?></div>
                                    </div>
                                    <p><div <?php echo ($data['type'] == 'Singer') ? '' : 'style="display: none;"'; ?>><img src="http://localhost/symphony/img/telephone-call.png" alt="camera-icon" class="" id="" style="height: 16px;width: 16px;">   <?php echo $data['telephoneNumber']; ?></div></p>
                                </div>
                                <div class="videoBox"  <?php echo ($data['type'] == 'Singer' || $data['type'] == 'Musician' || $data['type'] == 'Band') ? '' : 'style="display: none;"'; ?>>
                                    <iframe src="<?php echo $data['videoLink']; ?>"></iframe>
                                </div>
                            <p><div <?php echo ($data['type'] == 'Singer') ? '' : 'style="display: none;"'; ?>>Instrument: <?php echo $data['instrument']; ?></div></p>
                            <p>Price per day: <?php echo $data['unit_price']; ?>.00</p>
                            <p>Last Modified: <?php echo $data['createdDate']; ?></p>
                            <p>Description: <?php echo $data['Description']; ?></p>
                            <div class="date-picker-container">
                            <label id="product_id" name="product_id" value="<?php echo $data['product_id']; ?>"></label>
                            <div class="number-input-container"  <?php echo ($data['type'] == 'Equipment') ? '' : 'style="display: none;"'; ?>>
                            </div>
                            </div>
                            <br>
                    </div>
                </div>
            </div>

        </div>
        <script src="https://kit.fontawesome.com/3376ff6b83.js" crossorigin="anonymous"></script>
        <script src="<?php echo URLROOT; ?>/js/admin-viewItem.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    </div>
  </div>
</body>
</html>