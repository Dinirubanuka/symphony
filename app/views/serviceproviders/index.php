<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-index.css"/>
    <title>Dashboard</title>
</head>
<body>
<!-----------profile-nav-bar-------->
<?php require_once APPROOT . '/views/inc/sp-main-nav.php'; ?>
<div class="slider">
    <!-- list Items -->
    <div class="list">
        <div class="item active">
            <img src="<?php echo URLROOT; ?>/img/instrument.jpg">
            <div class="content">
                <p>symphony</p>
                <h2>Instruments</h2>
                <p>
                    Explore the world of musical tools! From guitars to keyboards, discover the diverse range of instruments used by musicians to create captivating melodies and rhythms.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/studio.jpg">
            <div class="content">
                <p>symphony</p>
                <h2>Studio</h2>
                <p>
                    Step into the heart of music production! Learn about the behind-the-scenes magic as sound engineers and producers work their technical wizardry to capture, mix, and master tracks, transforming raw recordings into polished masterpieces.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/singer.jpg">
            <div class="content">
                <p>symphony</p>
                <h2>Singers</h2>
                <p>
                    Dive into the realm of vocal talent! Meet the voices behind the music, from soulful soloists to harmonizing choirs, as they bring lyrics to life with their emotive performances.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/band.jpg">
            <div class="content">
                <p>symphony</p>
                <h2>Bands</h2>
                <p>
                    Join the ultimate musical collaboration! Discover the synergy of talented individuals coming together to form dynamic bands, from rock groups to jazz ensembles, as they unite their skills and creativity to deliver electrifying performances.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/solo.jpg">
            <div class="content">
                <p>symphony</p>
                <h2>Musicians</h2>
                <p>
                    Celebrate the skilled artists who master their craft! Whether it's shredding on guitars, tickling the ivories on pianos, or blowing saxophones, these musicians showcase their talent and passion for creating unforgettable tunes.
                </p>
            </div>
        </div>
    </div>
    <!-- button arrows -->
    <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
    </div>
    <!-- thumbnail -->
    <div class="thumbnail">
        <div class="item active" onclick="triggerService('Instrument')">
            <img src="<?php echo URLROOT; ?>/img/instrument.jpg">
            <div class="content">
                Instrument
            </div>
        </div>
        <div class="item" onclick="triggerService('Studio')">
            <img src="<?php echo URLROOT; ?>/img/studio.jpg">
            <div class="content">
                Studio
            </div>
        </div>
        <div class="item" onclick="triggerService('Singer')">
            <img src="<?php echo URLROOT; ?>/img/singer.jpg">
            <div class="content">
                Singer
            </div>
        </div>
        <div class="item" onclick="triggerService('Band')">
            <img src="<?php echo URLROOT; ?>/img/band.jpg">
            <div class="content">
                Band
            </div>
        </div>
        <div class="item" onclick="triggerService('Musicians')">
            <img src="<?php echo URLROOT; ?>/img/solo.jpg">
            <div class="content">
                Musicians
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URLROOT; ?>/js/sp-index.js"></script>
<script>
    let items = document.querySelectorAll('.slider .list .item');
    let next = document.getElementById('next');
    let prev = document.getElementById('prev');
    let thumbnails = document.querySelectorAll('.thumbnail .item');

    // config param
    let countItem = items.length;
    let itemActive = 0;
    // event next click
    next.onclick = function () {
        itemActive = itemActive + 1;
        if (itemActive >= countItem) {
            itemActive = 0;
        }
        showSlider();
    }
    //event prev click
    prev.onclick = function () {
        itemActive = itemActive - 1;
        if (itemActive < 0) {
            itemActive = countItem - 1;
        }
        showSlider();
    }
    // auto run slider
    let refreshInterval = setInterval(() => {
        next.click();
    }, 5000)

    function showSlider() {
        // remove item active old
        let itemActiveOld = document.querySelector('.slider .list .item.active');
        let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
        itemActiveOld.classList.remove('active');
        thumbnailActiveOld.classList.remove('active');

        // active new item
        items[itemActive].classList.add('active');
        thumbnails[itemActive].classList.add('active');

        // clear auto time run slider
        clearInterval(refreshInterval);
        refreshInterval = setInterval(() => {
            next.click();
        }, 5000)
    }

    // click thumbnail
    function triggerService(service) {
        window.location.href = 'http://localhost/symphony/serviceproviders/' + service;
    }

</script>

</div>
</body>
</html>
