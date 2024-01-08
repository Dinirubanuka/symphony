<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <title>Orders</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/inventory.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-orders.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-nav-bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!------------nav-bar-------->
<?php require_once APPROOT . '/views/inc/sp-orders-nav.php';?>

<div class="orders-container">
    <?php foreach($data['orders'] as $order) : ?>
    <?php $disableButton = ($order->status === 'Pending') ? false : true; ?>
    <div class="order-card">
        <div class="order-image">
            <img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $order->photo_1; ?>" alt="Item 1">
        </div>
        <div class="order-details">
            <div><strong>Order ID: </strong><?php echo $order->sorder_id ?></div>
            <div><strong>User Name: </strong><?php echo $order->name ?></div>
            <div><strong>Product Title: </strong><?php echo $order->category ?></div>
            <div><strong>Quantity: </strong><?php echo $order->qty ?></div>
            <div><strong>From Date: </strong> <?php echo $order->start_date ?></div>
            <div><strong>To Date: </strong> <?php echo $order->end_date ?></div>
            <div><strong>Total: </strong> <?php echo $order->total ?></div>
            <div class="status-<?php echo $order->status ?>"><strong>Status:</strong> <?php echo $order->status ?></div>
        </div>
        <div class="order-actions">
            <button class="<?php echo $disableButton ? 'disabled-button' : 'accept-btn'; ?>" <?php echo $disableButton ? 'disabled' : ''; ?> onclick="confirmAction(<?php echo $order->sorder_id; ?>, 'Upcoming')">Accept Order</button>

            <button class="<?php echo $disableButton ? 'disabled-button' : 'reject-btn'; ?>" <?php echo $disableButton ? 'disabled' : ''; ?> onclick="confirmAction(<?php echo $order->sorder_id; ?>, 'Rejected')">Reject Order</button>
        </div>
    </div>
<?php endforeach; ?>
</div>

<script src="https://kit.fontawesome.com/3376ff6b83.js" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT; ?>/js/sp-orders-.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function () {
    $('#orderSearch').on('input', function () {
        const searchValue = $(this).val().toLowerCase().trim();
        
        $('.order-card').each(function () {
            const orderId = $(this).find('.order-details strong:contains("Order ID:")').parent().text().toLowerCase();
            const userName = $(this).find('.order-details strong:contains("User Name:")').parent().text().toLowerCase();
            const productTitle = $(this).find('.order-details strong:contains("Product Title:")').parent().text().toLowerCase();
            const status = $(this).find('.order-details strong:contains("Status:")').parent().text().toLowerCase();

            const isVisible = orderId.includes(searchValue) || userName.includes(searchValue) || productTitle.includes(searchValue) || status.includes(searchValue);

            if (isVisible) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});

</script>

<script>
    function confirmAction(orderId, status) {
        var confirmationMessage = 'Are you sure you want to ' + (status === 'Upcoming' ? 'accept' : 'reject') + ' the order?';
        if (confirm(confirmationMessage)) {
            var url = '<?php echo URLROOT; ?>/serviceproviders/changeOrderStatus/' + orderId + '/' + status;
            window.location.href = url;
        }
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    const cart = document.querySelector(".order-icon");
    Redirect();
    function Redirect() {
        $.ajax({
            method: 'GET',
            url: 'http://localhost/symphony/serviceproviders/orderCount',
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
                    `<a href="http://localhost/symphony/serviceproviders/orders">`+
                        `<i class="fa-solid fa-truck-fast"></i>`+
                    `</a>`;
        cart.innerHTML=text;
    }
</script>
</body>
</html>