<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <title>Store Inventory Item</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-viewItem.css"
    ">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav-bar.css"
    ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="changeRating(); checkAvailability() ">
<!------------nav-bar-------->
<?php require_once APPROOT . '/views/inc/viewNavBar.php'; ?>

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
            <form action="<?php echo URLROOT; ?>/users/checkAvailability/<?php echo $data['type']; ?>/<?php echo $data['product_id']; ?>" class="form" method="post" enctype="multipart/form-data" id="addToCartForm">
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
                    <div class="emailBox">
                        <div <?php echo ($data['type'] == 'Singer') ? '' : 'style="display: none;"'; ?>><img src="http://localhost/symphony/img/email.png" alt="camera-icon" class="" id="" style="height: 16px;width: 16px;"></div>
                        <div><?php echo $data['email']; ?></div>
                    </div>
                    <p><div <?php echo ($data['type'] == 'Singer') ? '' : 'style="display: none;"'; ?>><img src="http://localhost/symphony/img/telephone-call.png" alt="camera-icon" class="" id="" style="height: 16px;width: 16px;">   <?php echo $data['telephoneNumber']; ?></div></p>
                </div>
                <div class="videoBox">
                    <iframe src="<?php echo $data['videoLink']; ?>"></iframe>
                </div>
                    <p><div <?php echo ($data['type'] == 'Singer') ? '' : 'style="display: none;"'; ?>>Instrument: <?php echo $data['instrument']; ?></div></p>
                    <p>Last Modified: <?php echo $data['createdDate']; ?></p>

                    <!-- Add to cart and add to favorites buttons -->

                    <div class="date-picker-container">
                        <label for="fromDate">From Date:</label>
                        <input type="date" id="fromDate" name="fromDate" min="" max="" value="<?php echo $data['start_date']; ?>" required>
                        <br><br>

                        <label for="toDate">To Date:</label>
                        <input type="date" id="toDate" name="toDate" min="" max="" value="<?php echo $data['end_date']; ?>" required><br>
                    <br>
                    <label id="product_id" name="product_id" value="<?php echo $data['product_id']; ?>"></label>
                    <div class="number-input-container"  <?php echo ($data['type'] == 'Equipment') ? '' : 'style="display: none;"'; ?>>
                        <label for="amount">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" value="<?php echo $data['quantity_selected']; ?>" required>
                    </div>
                    </div>
                    <br>
                    <button id="availabilityChkBtn">Check Availability</button>
                    </form>
                    <div id="availabilityMessage"></div>
                    <br>
                    <form action="<?php echo URLROOT; ?>/users/addTocart/<?php echo $data['product_id']; ?>" class="form" method="post" enctype="multipart/form-data" id="addToCartForm">
                    <div class="date-picker-container">
                        <input type="date" id="fromDate" name="fromDate" value="<?php echo $data['start_date']; ?>" hidden>
                        <input type="date" id="toDate" name="toDate" value="<?php echo $data['end_date']; ?>" hidden>
                        <input type="number" id="quantity" name="quantity" value="<?php echo $data['quantity_selected']; ?>" hidden>
                        <input type="text" id="type" name="type" value="<?php echo $data['type']; ?>" hidden>
                    </div>
                    <div <?php echo ($data['availability'] == 'available') ? '' : 'style="display: none;"'; ?>>
                        <button class="<?php echo $data['availability'] === 'available' ? 'addToCartBtn' : 'disabled-button'; ?>" <?php echo $data['availability'] === 'available' ? '' : 'disabled'; ?>>Add to Cart</button>
                    </div>
                    </form>
                <button id="addToFavoritesBtn">Add to Favorites</button>
            </div>
        </div>
    </div>
    <!-- Review section -->

</div>
<div class="rating">
    <?php echo "<script>var star1 = '{$data['star1']}'; 
                      var star2 = '{$data['star2']}';
                      var star3 = '{$data['star3']}';
                      var star4 = '{$data['star4']}';
                      var star5 = '{$data['star5']}';
                      var count = '{$data['count']}';
                      var rating = '{$data['rating']}';</script>"; ?>
    <div class="overrall-rating">
        <div class="rate-header">
            <span class="heading">User Rating</span>
            <div class="star-rating" title="70%">
                <div class="back-stars">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>

                    <div class="front-stars" style="width: 70%" id="front-stars">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <p><?php echo round($data['rating'], 2); ?> average based on <?php echo $data['count']; ?> reviews.</p>
            <hr style="border:3px solid #f1f1f1">
        </div>
        <div class="progress">
            <div class="side">
                <div>5 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-5" id="bar-5"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo $data['star5']; ?></div>
            </div>
            <div class="side">
                <div>4 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-4" id="bar-4"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo $data['star4']; ?></div>
            </div>
            <div class="side">
                <div>3 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-3" id="bar-3"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo $data['star3']; ?></div>
            </div>
            <div class="side">
                <div>2 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-2" id="bar-2"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo $data['star2']; ?></div>
            </div>
            <div class="side">
                <div>1 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-1" id="bar-1"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo $data['star1']; ?></div>
            </div>
        </div>
    </div>
    <div class="review-form" id="reviewForm">
        <div class="user-info">
            <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $data['photo'] ?>" alt="User Image"
                 class="user-image" width="50" height="50">
            <h3 class="user-name"><?php echo $data['name']; ?></h3>
        </div>
        <div class="product-review">
            <h2>Leave a Review</h2>
            <form action="<?php echo URLROOT; ?>/users/addReview/<?php echo $data['product_id']; ?>" class="form"
                  method="post" enctype="multipart/form-data">
                <label>
                    <input type="radio" name="rating" value="1"> 1
                </label>

                <label>
                    <input type="radio" name="rating" value="2"> 2
                </label>

                <label>
                    <input type="radio" name="rating" value="3"> 3
                </label>

                <label>
                    <input type="radio" name="rating" value="4"> 4
                </label>

                <label>
                    <input type="radio" name="rating" value="5"> 5
                </label>
        </div>
        <input type="hidden" id="name" name="name" value="<?php echo $data['name']; ?>">
        <input type="hidden" id="photo" name="photo" value="<?php echo $data['photo']; ?>">
        <input type="hidden" id="categoty" name="category" value="<?php echo $data['category']; ?>">
        <textarea rows="5" id="reviewDescription" name="reviewDescription" placeholder="Enter your review here" required></textarea>
        <button class="<?php echo $data['purchased'] ? 'submitBtn' : 'disabled-button'; ?>" action="<?php echo URLROOT; ?>/users/addReview" method="post"  <?php echo $data['purchased'] ? '' : 'disabled'; ?>>Post Review</button>
        </form>
    </div>
</div>
</div>

<div class="review-grid">
    <?php foreach ($data['reviews'] as $review) : ?>
        <figure class="snip1232">
            <div class="author">
                <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $review->photo; ?>"/>
                <span><?php echo $review->name; ?></span>
            </div>
            <blockquote><?php echo $review->content; ?></blockquote>
        </figure>
    <?php endforeach; ?>
</div>
<script src="https://kit.fontawesome.com/3376ff6b83.js" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT; ?>/js/user-viewItem.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    const cart = document.querySelector(".cart");
    Redirect();
    function Redirect() {
        $.ajax({
            method: 'GET',
            url: 'http://localhost/symphony/users/cartItemCount',
            dataType: 'json',
            success: function (response) {
                console.log('count',response.Count);
                displaydata(response.Count);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    }
    function displaydata(count){
        let text = "";
        text += `<p class="badge" >`+count+`</p>`+
                    `<a href="http://localhost/symphony/users/cart">`+
                        `<i class="fa-solid fa-cart-plus" ></i>`+
                    `</a>`;
        cart.innerHTML=text;
    }

    document.addEventListener("DOMContentLoaded", function () {
  const fromDateInput = document.getElementById("fromDate");
  const toDateInput = document.getElementById("toDate");

  // Set minDate for from date
  const minFromDate = moment().add(3, 'days').format("YYYY-MM-DD");
  fromDateInput.min = minFromDate;

  // Update minDate for to date when from date changes
  fromDateInput.addEventListener("input", function () {
    const selectedFromDate = moment(fromDateInput.value);
    toDateInput.min = selectedFromDate.format("YYYY-MM-DD");
  });

  // Update minDate for from date when to date changes
  toDateInput.addEventListener("input", function () {
    const selectedToDate = moment(toDateInput.value);
    fromDateInput.max = selectedToDate.format("YYYY-MM-DD");
  });

});

function checkAvailability() {
        // Assuming $data['availability'] is a PHP variable passed to JavaScript
        var availability = "<?php echo $data['availability']; ?>";
        var addToCartBtn = document.getElementById("addToCartBtn");
        var availabilityMessage = document.getElementById("availabilityMessage");
        if (availability === "notAvailable") {
            // Display a message in red color
            availabilityMessage.innerHTML = "Product not available!";
            availabilityMessage.style.color = "red";
        } else if (availability === "available") {
            // Display a message in green color
            availabilityMessage.innerHTML = "Product available!";
            availabilityMessage.style.color = "green";
        } else if (availability === "notChecked") {
            // Clear any previous messages
            availabilityMessage.innerHTML = "";
        }else if (availability === "alreadyInCart") {
            // Display a message in green color
            availabilityMessage.innerHTML = "Product is already in cart!";
            availabilityMessage.style.color = "blue";
        }
    }
</script>
</body>
</html>