<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-index.css"/>
  <title>Dashboard</title>
</head>
<body>
<!-----------profile-nav-bar-------->
<?php require_once APPROOT . '/views/inc/sp-index-nav.php'; ?>
<div class="slider">
    <!-- list Items -->
    <div class="list">
        <div class="item active">
            <img src="<?php echo URLROOT; ?>/img/instrument.jpg">
            <div class="content">
                <p>design</p>
                <h2>Instruments</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/studio.jpg">
            <div class="content">
                <p>design</p>
                <h2>Studio</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/singer.jpg">
            <div class="content">
                <p>design</p>
                <h2>Singers</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/band.jpg">
            <div class="content">
                <p>design</p>
                <h2>Bands</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/solo.jpg">
            <div class="content">
                <p>design</p>
                <h2>Musicians</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/lighting.jpg">
            <div class="content">
                <p>design</p>
                <h2>Lighting</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/decoration.jpg">
            <div class="content">
                <p>design</p>
                <h2>Decorations</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/repair.jpg">
            <div class="content">
                <p>design</p>
                <h2>Repair</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
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
        <div class="item active">
            <img src="<?php echo URLROOT; ?>/img/instrument.jpg">
            <div class="content">
                Instrument
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/studio.jpg">
            <div class="content">
                Studio
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/singer.jpg">
            <div class="content">
                Singer
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/band.jpg">
            <div class="content">
                Band
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/solo.jpg">
            <div class="content">
                Musicians
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/lighting.jpg">
            <div class="content">
                Lighting
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/decoration.jpg">
            <div class="content">
                Decoration
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URLROOT; ?>/img/repair.jpg">
            <div class="content">
                Repair
            </div>
        </div>
    </div>
</div>
<<<<<<< Updated upstream
<script src="<?php echo URLROOT;?>/js/user-index.js"></script>
=======
<script src="<?php echo URLROOT;?>/js/sp-index.js"></script>
>>>>>>> Stashed changes
<script>
    let items = document.querySelectorAll('.slider .list .item');
    let next = document.getElementById('next');
    let prev = document.getElementById('prev');
    let thumbnails = document.querySelectorAll('.thumbnail .item');

    // config param
    let countItem = items.length;
    let itemActive = 0;
    // event next click
    next.onclick = function(){
        itemActive = itemActive + 1;
        if(itemActive >= countItem){
            itemActive = 0;
        }
        showSlider();
    }
    //event prev click
    prev.onclick = function(){
        itemActive = itemActive - 1;
        if(itemActive < 0){
            itemActive = countItem - 1;
        }
        showSlider();
    }
    // auto run slider
    let refreshInterval = setInterval(() => {
        next.click();
    }, 5000)
    function showSlider(){
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
    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', () => {
            itemActive = index;
            showSlider();
        })
    })
</script>

</div>
</body>
</html>
