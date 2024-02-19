<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title><?php echo SITENAME; ?></title>
</head>

<body>
  <div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/mod-sidebar.php'; ?>
    </div>
    <div class="right-component">
<div class="mod">
    <div class="mod-above">
        <h2> Order History - Service Provider ID: #<?php echo $data['sp_id']; ?> </h2>
    </div>
    <div class="mod-below">
        <table class="data-table">
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Product Type</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Total Price</th>
                <th>Order Placed On</th>
            </tr>
            <?php foreach ($data['order'] as $order) : ?>
                <tr class="data-table-tr">
                    <td><div class = "sp-icon" onclick = "viewOrder(<?php echo $order->sorder_id ; ?>)"><?php echo $order->sorder_id; ?></div></td>
                    <td><div class = "sp-icon" onclick = "viewUser(<?php echo $order->user_id ; ?>)"><?php echo $order->user_id; ?></div></td>
                    <td><div product_id = "<?php echo $order->product_id ; ?>" product_type = "<?php echo $order->type ; ?>" class = "sp-icon" onclick = "viewItem(this)"><?php echo $order->type ; ?> - <?php echo $order->product_id ; ?></div></td>
                    <td><?php echo $order->qty; ?></td>
                    <td><div class = "status-<?php echo $order->status ?>"><?php echo $order->status; ?></div></td>
                    <td><?php echo $order->total; ?></td>
                    <td><?php echo $order->order_placed_on; ?></td>
                    <td class="data-table-action">
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>
</div>
</div>
<script>
    function viewOrder(OrderID) {
        window.location.href = "<?php echo URLROOT; ?>/moderators/viewSubOrder/" + OrderID;
    }

    function viewUser(UserID) {
        window.location.href = "<?php echo URLROOT; ?>/moderators/viewuser/" + UserID;
    }

    function viewItem(item) {
        var product_id = item.getAttribute("product_id");
        var product_type = item.getAttribute("product_type");
        window.location.href = "<?php echo URLROOT; ?>/moderators/viewProduct/" + product_type + "/" + product_id;
    }
</script>
</body>

</html>