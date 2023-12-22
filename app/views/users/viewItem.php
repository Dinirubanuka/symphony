<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Store Inventory Item</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-viewitem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-----------profile-nav-bar-------->
<!-- <?php require_once APPROOT . '/views/inc/sp-index-nav.php'; ?> -->

<div class="wrapper">
<div class="container">
    <div class="mySlides">
        <div class="numbertext">1 / 3</div>
        <img src="https://picsum.photos/400/300" style="width:600px; height:600px;">
    </div>
  
    <div class="mySlides">
        <div class="numbertext">2 / 3</div>
        <img src="https://picsum.photos/401/300" style="width:600px; height:600px;">
    </div>
  
    <div class="mySlides">
        <div class="numbertext">3 / 3</div>
         <img src="https://picsum.photos/402/300" style="width:600px; height:600px;">
    </div>
  
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  
    <div class="caption-container">
      <p id="caption"></p>
    </div>
  
    <div class="row">
      <div class="column">
        <img class="demo cursor" src="https://picsum.photos/400/300" style="width:190px; height:190px;" onclick="currentSlide(1)">
      </div>
      <div class="column">
        <img class="demo cursor" src="https://picsum.photos/401/300" style="width:190px; height:190px;" onclick="currentSlide(2)">
      </div>
      <div class="column">
        <img class="demo cursor" src="https://picsum.photos/402/300" style="width:190px; height:190px;" onclick="currentSlide(3)">
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
    <div class = "overrall-rating">
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
          <textarea rows="5" id="reviewDescription" placeholder="Enter your review here"></textarea>
          <button id="submitBtn">Post Review</button>
        </div>
      </div>
</div>

<div class = "review-grid">
    <figure class="snip1232">
        <div class="author">
          <img src="https://picsum.photos/81" alt="sq-sample7"/>
          <h5>Pelican Steve</h5><span>Pelican Steve</span>
        </div>
        <blockquote>CLorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus lacinia, ligula id facilisis sodales, arcu lacus tristique tellus, eget molestie eros magna vel diam. Fusce lobortis, mi nec venenatis auctor, augue magna lacinia magna, a viverra urna dolor vitae massa. Nullam rhoncus aliquet lacus pulvinar pharetra. Integer pellentesque turpis sit amet quam maximus feugiat. Vivamus ultrices enim eu magna pharetra, ac consequat ipsum facilisis. Integer sem libero, placerat sit amet laoreet et, viverra nec ligula. Maecenas metus ex, vulputate ornare malesuada eget, eleifend a ante. Vestibulum pellentesque ullamcorper tincidunt.</blockquote>
      </figure>
      <figure class="snip1232 hover">
        <div class="author">
          <img src="https://picsum.photos/82" alt="sq-sample10"/>
          <h5>Max Conversion</h5><span>Max Conversion</span>
        </div>
        <blockquote>In venenatis nec nunc non lobortis. Maecenas lacinia elementum nisl, fringilla feugiat sem laoreet sed. Nulla fermentum turpis ultricies, feugiat magna et, consequat sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc ac ornare arcu, varius accumsan quam. Sed eros mauris, cursus eu urna sed, consectetur laoreet arcu. Praesent egestas sem vitae varius ultrices. Quisque gravida suscipit nulla, quis hendrerit leo suscipit sit amet. Nam eget tortor non purus porta aliquam. Cras a vestibulum dui. Donec viverra metus et sapien eleifend dictum. Nunc et placerat lectus, aliquet tristique purus. Donec vitae ligula nibh.</blockquote>
      </figure>
      <figure class="snip1232">
        <div class="author">
          <img src="https://picsum.photos/83" alt="sq-sample12"/>
          <h5>Eleanor Faint</h5><span>Eleanor Faint</span>
        </div>
        <blockquote>Praesent sapien sem, ultrices accumsan mauris nec, lobortis lacinia mauris. Sed mollis scelerisque nisi, eu maximus magna facilisis eget. Etiam in laoreet dui, sit amet cursus dolor. Vestibulum sollicitudin tellus non ex suscipit hendrerit. Donec interdum mollis nisl, sit amet hendrerit erat hendrerit quis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin venenatis feugiat varius. Pellentesque blandit malesuada nulla non sodales. Nam et auctor tellus, vitae suscipit metus. In et condimentum turpis. Morbi vel lectus dolor. Integer erat tellus, ultrices et velit sit amet, condimentum pellentesque orci. Pellentesque sed pretium erat, ac auctor dui. Donec ut finibus magna. Suspendisse potenti.</blockquote>
      </figure>
</div>
 <script src="<?php echo URLROOT;?>/js/sp-viewitem.js"></script>
</body>
</html>