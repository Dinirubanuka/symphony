<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-cart.css">
  </head>
  <body>
<!-----------profile-nav-bar-------->
<!-- <?php require_once APPROOT . '/views/inc/index-nav.php'; ?> -->
 <main>
     <!-- Start DEMO HTML (Use the following code into your project)-->
<header id="site-header">
		<div class="container">
			<h1>Cart</h1>
		</div>
	</header>

	<div class="container">
		<section id="cart"> 
		<?php foreach($data['cart'] as $cart) : ?>
			<article class="product">
				<header>
					<a class="remove">
						<img src="http://localhost/symphony/img/serviceProvider/<?php echo $cart->photo_1; ?>" style="width:220px; height:229px;">
						<form action="<?php echo URLROOT; ?>/users/removefromcart/<?php echo $cart->product_id; ?>" class="form" method="post" enctype="multipart/form-data">
							<h3><button id="removeItmBtn">Remove product</button></h3>
						</form>
					</a>
				</header>

				<div class="content">

					<h1><?php echo $cart->Title; ?></h1>

					<p><?php echo $cart->Description; ?></p>

				</div>

				<footer class="content">
					<span class="qt-minus">-</span>
					<span class="qt"><?php echo $cart->quantity; ?></span>
					<span class="qt-plus">+</span>

					<h2 class="full-price">
						<?php echo $cart->unit_price * $cart->quantity; ?> Rs.
					</h2>

					<h2 class="price">
						<?php echo $cart->unit_price; ?> Rs.
					</h2>
				</footer>
			</article>
			<?php $subtotal = $subtotal + ($cart->unit_price * $cart->quantity);
				$total = $subtotal + $subtotal*0.05 + 200.00;?>
			<?php endforeach; ?>
		</section>

	</div>

	<footer id="site-footer">
		<div class="container clearfix">

			<div class="left">
				<h2 class="subtotal">Subtotal: <span><?php echo $subtotal; ?></span> Rs.</h2>
				<h3 class="tax">Taxes (5%): <span><?php echo $subtotal*0.05; ?></span> Rs.</h3>
				<h3 class="shipping">Service Charge: <span>200.00</span> Rs.</h3>
			</div>

			<div class="right">
				<h1 class="total">Total: <span><?php echo $total; ?></span> Rs.</h1>
				<a class="btn">Checkout</a>
			</div>

		</div>
	</footer>
     <!-- END EDMO HTML (Happy Coding!)-->
 </main>
   
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="<?php echo URLROOT;?>/js/user-cart.js"></script> 
      
  </body>
</html>