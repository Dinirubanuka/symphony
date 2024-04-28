<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-cart.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav-bar.css">
</head>
<body>
<?php require_once APPROOT . '/views/inc/viewNavBar.php'; ?>
<main class="main">
    <div class="container">
        <?php $atLeastOneNotAvailable = false; ?>
        <section id="cart">
            <form action="<?php echo URLROOT; ?>/users/placeOrder" class="form" method="post"
                  enctype="multipart/form-data">
                <?php foreach ($data['cart'] as $cart) : ?>
                    <article class="product">
                        <header>
                            <a input_product_id="<?php echo $cart->product_data->product_id; ?>"
                               input_product_type="<?php echo $cart->product_data->type; ?>" class="remove"
                               ">
                                <img src="http://localhost/symphony/img/serviceProvider/<?php echo $cart->product_data->photo_1; ?>"
                                >
<!--                                <h3>Remove product</h3>-->
                            </a>
                        </header>

                        <div class="upcontent">
                            <div class="content">
                                <a input_product_id="<?php echo $cart->product_data->product_id; ?>"
                                   input_product_type="<?php echo $cart->product_data->type; ?>" class="close"
                                   onclick="removeFromCart(this);">
                                    <img src="http://localhost/symphony/img/close.png" style="height: 15px; width: 15px;float: right;margin: 4px -12px 0 0">
                                    <!--                                <h3>Remove product</h3>-->
                                </a>
                                <h1><?php echo $cart->product_data->Title; ?></h1>
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
                                        LKR. <?php echo $cart->total ?>.00
                                    </h2>
                                <?php endif; ?>

                                <h2 class="price">
                                    <p>Quantity: <?php echo $cart->quantity; ?></p>

                                    x LKR.<?php echo $cart->product_data->unit_price; ?>.00
                                </h2>
                            </footer>
                        </div>


                    </article>
                <?php endforeach; ?>
        </section>

    </div>
    <footer id="site-footer">
        <div class="container clearfix">

            <div class="left">
                <span class="subtotal">Subtotal: LKR.</span>
                <span><?php echo $data['subtotal']; ?>.00</span>
                <span class="tax">Deposit Value: LKR.</span>
                <span><?php echo $data['extra_charge']; ?>.00</span>
                <span class="shipping">Service Charge: LKR.</span>
                <span><?php echo $data['service_charge']; ?>.00</span>
                <span class="total">Total: LKR.</span>
                <span class="total"><?php echo $data['count'] == 0 ? '0' : $data['total']; ?>.00</span>
            </div>

            <div class="right">

                <a id="checkOutBtn" class="btn123" style="cursor: pointer;"> Checkout </a>
            </div>

        </div>
    </footer>
</main>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="<?php echo URLROOT; ?>/js/user-cart.js"></script>

<!--sandbox-->
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<!--<p type="submit" onclick="paymentGayeway()" id="payhere-payment" >PayHere Pay</p>-->
<script>
    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": "1226027",    // Replace your Merchant ID
        "return_url": "http://localhost/payhere_config/",     // Important
        "cancel_url": "http://localhost/payhere_config/",     // Important
        "notify_url": "http://sample.com/notify",
        "order_id": "<?php echo $data['order_id'] ?>",
        "items": "Door bell wireles",
        "amount": "<?php echo $data['amount'] ?>",
        "currency": "LKR",
        "hash": "<?php echo $data['hash'] ?>", // *Replace with generated hash retrieved from backend
        "first_name": "Saman",
        "last_name": "Perera",
        "email": "samanp@gmail.com",
        "phone": "0771234567",
        "address": "No.1, Galle Road",
        "city": "Colombo",
        "country": "Sri Lanka",
        "delivery_address": "No. 46, Galle road, Kalutara South",
        "delivery_city": "Kalutara",
        "delivery_country": "Sri Lanka",
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
    };
</script>
<script>
    //document.addEventListener('DOMContentLoaded', function () {
    //    var checkoutButton = document.getElementById('checkOutBtn');
    //
    //    checkoutButton.addEventListener('click', function (event) {
    //        // Add your logic here to check if at least one item is not available
    //        var atLeastOneNotAvailable = <?php //echo json_encode($atLeastOneNotAvailable); ?>//;
    //
    //        // If at least one item is not available, prevent the default link behavior
    //        if (atLeastOneNotAvailable) {
    //            alert('One or more items are not available. Cannot proceed to checkout.');
    //            window.location.href = "<?php //echo URLROOT; ?>///users/cart";
    //        } else {
    //            window.location.href = "<?php //echo URLROOT; ?>///users/placeOrder";
    //        }
    //    });
    //});

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