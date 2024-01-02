<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <title>Store Inventory Item</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-viewItem.css"">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="changeRating()">
<!------------nav-bar-------->
<!-- <?php require_once APPROOT . '/views/inc/index-nav.php'; ?> -->

<!-------------register-form----------->
<div class="wrapper">
<div class="container">
    <!-- Full-width images with number text -->
    <div class="mySlides">
        <img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_1']; ?>" style="width:600px; height:600px;">
    </div>
  
    <div class="mySlides">
        <img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_2']; ?>" style="width:600px; height:600px;">
    </div>
  
    <div class="mySlides">
        <img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_3']; ?>" style="width:600px; height:600px;">
    </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  
    <!-- Image text -->
    <!-- Thumbnail images -->
    <div class="row">
      <div class="column">
        <img class="demo cursor" src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_1']; ?>" style="width:190px; height:190px;" onclick="currentSlide(1)">
      </div>
      <div class="column">
        <img class="demo cursor" src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_2']; ?>" style="width:190px; height:190px;" onclick="currentSlide(2)">
      </div>
      <div class="column">
        <img class="demo cursor" src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_3']; ?>" style="width:190px; height:190px;" onclick="currentSlide(3)">
      </div>
    </div>
</div>

<div class="item-container">
    <div class="item-details">
        <div class="item-info">
          <form action="<?php echo URLROOT; ?>/users/addToCart/<?php echo $data['product_id']; ?>" class="form" method="post" enctype="multipart/form-data">
            <h1><?php echo $data['Title']; ?></h1>
            <h3>Category: <?php echo $data['category']; ?></h3>
            <h3>Brand: <?php echo $data['brand']; ?></h3>
            <p>Model: <?php echo $data['model']; ?></p>
            <p>Units Left: <?php echo $data['quantity']; ?></p>
            <p>Price: <?php echo $data['unit_price']; ?></p>
            <p>Warranty available until: <?php echo $data['warranty']; ?></p>
            <p>Last Modified: <?php echo $data['createdDate']; ?></p>
            <p>Description: <?php echo $data['Description']; ?></p>

            <!-- Add to cart and add to favorites buttons -->
            
              <label for="fromDateTime">From:</label>
              <input type="datetime-local" id="fromDateTime" name="fromDateTime">

              <label for="toDateTime">To:</label>
              <input type="datetime-local" id="toDateTime" name="toDateTime">
              <br><br>
              <label id="product_id" name="product_id" value="<?php echo $data['product_id']; ?>"></label>
              <div class="number-input-container">
              <label for="amount">Quantity:</label>
              <input type="number" id="quantity" name="quantity">
            </div>
            <br><br>
            <button id="addToCartBtn">Add to Cart</button>
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
                      var rating = '{$data['rating']}';</script>";?>
    <div class = "overrall-rating">
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
          <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $data['photo']?>" alt="User Image" class="user-image" width="50" height="50">
          <h3 class="user-name"><?php echo $data['name']; ?></h3>
        </div>
        <div class="product-review">
          <h2>Leave a Review</h2>
          <form action="<?php echo URLROOT; ?>/users/addReview/<?php echo $data['product_id']; ?>"  class="form" method="post" enctype="multipart/form-data">
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
          <!-- <div class="rating-container" id="rating-container">
            <span class="star" data-rating="1">&#9733;</span>
            <span class="star" data-rating="2">&#9733;</span>
            <span class="star" data-rating="3">&#9733;</span>
            <span class="star" data-rating="4">&#9733;</span>
            <span class="star" data-rating="5">&#9733;</span>
        </div>   -->
          </div>
          <input type="hidden" id="name" name="name" value="<?php echo $data['name']; ?>">
          <input type="hidden" id="photo" name="photo" value="<?php echo $data['photo']; ?>">
          <textarea rows="5" id="reviewDescription" name="reviewDescription" placeholder="Enter your review here"></textarea>
          <button id="submitBtn" action="<?php echo URLROOT; ?>/users/addReview" method="post">Post Review</button>
          </form>
        </div>
      </div>
</div>

<div class = "review-grid">
  <?php foreach($data['reviews'] as $review) : ?>
    <figure class="snip1232">
        <div class="author">
          <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $review->photo; ?>"/>
          <span><?php echo $review->name; ?></span>
        </div>
        <blockquote><?php echo $review->content; ?></blockquote>
      </figure>
    <?php endforeach; ?>
</div>
<script src="<?php echo URLROOT;?>/js/user-viewItem.js"></script>
</body>
</html>