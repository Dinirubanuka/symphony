<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Store Inventory Item</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-viewitem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-----------profile-nav-bar-------->
<!-- --><?php //require_once APPROOT . '/views/inc/sp-index-nav.php'; ?>

<div class="wrapper">
    <div class="container">
        <div class="slides">
            <div class="mySlides">
                <img src="<?php echo URLROOT ?>/img/serviceProvider/<?php echo $data['photo_1']; ?>">
            </div>

            <div class="mySlides">
                <img src="<?php echo URLROOT ?>/img/serviceProvider/<?php echo $data['photo_2']; ?>">
            </div>

            <div class="mySlides">
                <img src="<?php echo URLROOT ?>/img/serviceProvider/<?php echo $data['photo_3']; ?>">
            </div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="row">
            <div class="column">
                <img class="demo cursor" src="<?php echo URLROOT ?>/img/serviceProvider/<?php echo $data['photo_1']; ?>"
                     onclick="currentSlide(1)">
            </div>
            <div class="column">
                <img class="demo cursor" src="<?php echo URLROOT ?>/img/serviceProvider/<?php echo $data['photo_2']; ?>"
                     onclick="currentSlide(2)">
            </div>
            <div class="column">
                <img class="demo cursor" src="<?php echo URLROOT ?>/img/serviceProvider/<?php echo $data['photo_3']; ?>"
                     style="width:190px; height:190px;" onclick="currentSlide(3)">
            </div>
        </div>
    </div>

    <div class="item-container">
        <div class="item-details">
            <div class="item-info">
                <h2><?php echo $data['title']; ?></h2>
                <h3>Brand: <?php echo $data['brand']; ?></h3>
                <p>Model: <?php echo $data['model']; ?></p>
                <p>Units Left: <?php echo $data['quantity']; ?></p>
                <p>Price: <?php echo $data['price']; ?></p>
                <p><?php echo $data['description'] ?></p>

                <button id="addToCartBtn">Add to Cart</button>
                <button id="addToFavoritesBtn">Add to Favorites</button>
            </div>
        </div>
    </div>

</div>
<div class="rating">
    <div class="overrall-rating">
        <span class="heading">User Rating</span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <p>4.1 average based on 254 reviews.</p>
        <hr style="border:3px solid #f1f1f1">

        <div class="progress">
            <div class="side">
                <div>5 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-5"></div>
                </div>
            </div>
            <div class="side right">
                <div>150</div>
            </div>
            <div class="side">
                <div>4 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-4"></div>
                </div>
            </div>
            <div class="side right">
                <div>63</div>
            </div>
            <div class="side">
                <div>3 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-3"></div>
                </div>
            </div>
            <div class="side right">
                <div>15</div>
            </div>
            <div class="side">
                <div>2 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-2"></div>
                </div>
            </div>
            <div class="side right">
                <div>6</div>
            </div>
            <div class="side">
                <div>1 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-1"></div>
                </div>
            </div>
            <div class="side right">
                <div>20</div>
            </div>
        </div>
    </div>
    <div class="review-form" id="reviewForm">
        <div class="user-info">
            <img src="https://picsum.photos/80" alt="User Image" class="user-image" width="50" height="50">
            <h3 class="user-name">John Doe</h3>
        </div>
        <div class="product-review">
            <h2>Leave a Review</h2>
            <div class="rating-container" id="rating-container">
                <span class="star" data-rating="1">&#9733;</span>
                <span class="star" data-rating="2">&#9733;</span>
                <span class="star" data-rating="3">&#9733;</span>
                <span class="star" data-rating="4">&#9733;</span>
                <span class="star" data-rating="5">&#9733;</span>
            </div>
            <div class="upperformText">

            </div>
        </div>
    </div>
</div>

<div class="review-grid">
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/sp-viewitem.js"></script>
<script>
    function sendReview(id) {
        textdata = document.getElementById('reviewDescription'+id).value;
        if (textdata) {
            document.getElementById("review"+id).click();
        }
        postReview();
    }

    // displayText();
    postReview();

    function displayText(data) {
        var formData = document.querySelector('.upperformText');
        var reviewData = document.querySelector('.review-grid');
        let reviewText = "";
        let formText = "";
        formText +=
            `<div class="formText">` +
            `<form action="http://localhost/symphony/users/addReview" method="post">` +
            `<textarea rows="5" id="reviewDescription`+data['id']+`" name = "review" placeholder="Enter your review here"></textarea>` +
            `<input type="submit" style="display: none" id="review+`+data['id']+`">` +
            `</form>` +
            `</div>` +
            `<button id="submitBtn" onclick="sendReview(`+data['id']+`)">Post Review</button>`;
        formData.innerHTML = formText;

        if (data && data.length > 0) {
            data.forEach(function (review) {
                reviewText +=
                    `<figure class="snip1232">` +
                    `<div class="author">` +
                    `<img src="http://localhost/symphony/img/mag_img/` + review.profile_photo + `" alt="profile photo"/>` +
                    `<h5>` + review.name + `</h5><span>` + review.name + `</span>` +
                    `</div>` +
                    `<blockquote>` + review.review + `</blockquote>` +
                    `</figure>`;
                reviewData.innerHTML = reviewText;
            });
        }
    }

    function postReview() {
        console.log('postReview');
        $.ajax({
            method: 'POST',
            url: 'http://localhost/symphony/users/fetchReview',
            dataType: 'json',
            success: function (response) {
                $data = JSON.parse(JSON.stringify(response.reviews));
                console.log($data);
                displayText($data);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    }
</script>
</body>
</html>