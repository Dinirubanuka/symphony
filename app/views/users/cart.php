<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <!-- Style CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav-bar.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-cart.css">
  </head>
  <body>
  <?php require_once APPROOT . '/views/inc/viewNavBar.php'; ?>
	<main class="main">
 <main>
     <!-- Start DEMO HTML (Use the following code into your project)-->
<header id="site-header">
		<div class="container">
			<h1><a href="<?php echo URLROOT; ?>/users/index">
        	<i class="fa fa-arrow-left" aria-hidden="true"></i></a>
			Cart</h1>
		</div>
		
	</header>

	<div class="container">
		<?php $atLeastOneNotAvailable = false; ?>
		<section id="cart"> 
		<form action="<?php echo URLROOT; ?>/users/placeOrder" class="form" method="post" enctype="multipart/form-data">
		<?php foreach($data['cart'] as $cart) : ?>
			<article class="product">
				<header>
				<a input_product_id="<?php echo $cart->product_data->product_id; ?>" input_product_type="<?php echo $cart->product_data->type; ?>" class="remove" onclick="removeFromCart(this);">
						<img src="http://localhost/symphony/img/serviceProvider/<?php echo $cart->product_data->photo_1; ?>" style="width:220px; height:229px;">
						<h3>Remove product</h3>
					</a>
				</header>

				<div class="content">
					<h1><?php echo $cart->product_data->Title; ?></h1>
					<p>Quantity: <?php echo $cart->quantity; ?></p>
					<p>From: <?php echo $cart->start_date; ?> - To: <?php echo $cart->end_date; ?></p>
	

				</div>

				<footer class="content">
					<?php if ($cart->availability === 'notAvailable') : ?>
						<h2 class="full-price" style="color: red;">
							Not available
						</h2>
						<?php $atLeastOneNotAvailable = true; ?>
					<?php else : ?>
						<h2 class="full-price">
						LKR. <?php echo $cart->total?>
						</h2>
					<?php endif; ?>

					<h2 class="price">
						x LKR.<?php echo $cart->product_data->unit_price; ?>
					</h2>
				</footer>
			</article>
			<?php endforeach; ?>
		</section>

	</div>
	<footer id="site-footer">
		<div class="container clearfix">

			<div class="left">
				<h2 class="subtotal">Subtotal: LKR. <span><?php echo $data['subtotal']; ?></span> </h2>
				<h3 class="tax">Deposit Value: LKR. <span><?php echo $data['extra_charge']; ?></span></h3>
				<h3 class="shipping">Service Charge: LKR. <span><?php echo $data['count'] == 0 ? '0.00' : '200.00'; ?></span> </h3>
			</div>

			<div class="right" <?php echo $data['count'] == 0 ? 'hidden' : ''; ?>>
				<h1 class="total">Total: LKR. <span><?php echo $data['total'];; ?></span> </h1>
				<a id="checkOutBtn" class="btn"> Checkout </a>
			</div>

		</div>
	</footer>
 </main>
   
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="<?php echo URLROOT;?>/js/user-cart.js"></script> 
	<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkoutButton = document.getElementById('checkOutBtn');

        checkoutButton.addEventListener('click', function(event) {
            // Add your logic here to check if at least one item is not available
            var atLeastOneNotAvailable = <?php echo json_encode($atLeastOneNotAvailable); ?>;

            // If at least one item is not available, prevent the default link behavior
            if (atLeastOneNotAvailable) {
                alert('One or more items are not available. Cannot proceed to checkout.');
                window.location.href = "<?php echo URLROOT; ?>/users/cart";
            } else {
				window.location.href = "<?php echo URLROOT; ?>/users/placeOrder";
            }
        });
    });

	//Remove from cart logic
	function removeFromCart(element) {
        // You can add additional confirmation logic if needed
        var confirmation = confirm('Are you sure you want to remove this product from the cart?');
		var productId = element.getAttribute('input_product_id');
		var type = element.getAttribute('input_product_type');
		console.log(productId);
		console.log(type);
        if (confirmation) {
            // Redirect to the removefromcart action with the product ID
            window.location.href = "<?php echo URLROOT; ?>/users/removefromcart/" + productId + "/" + type;
        }
    }
</script>
  </body>
</html>