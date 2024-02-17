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
        <h2> Order History - User ID: #<?php echo $data['user_id']; ?> </h2>
    </div>
    <div class="mod-below">
        <table class="data-table">
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Sub Order IDs</th>
                <th>Total Price</th>
                <th>Order Placed On</th>
            </tr>
            <?php foreach ($data['order'] as $order) : ?>
                <tr class="data-table-tr">
                    <td><div class = "sp-icon" onclick = "viewOrder(<?php echo $order->order_id; ?>)"><?php echo $order->order_id; ?></div></td>
                    <td><div class = "sp-icon" onclick = "viewUser(<?php echo $data['user_id']; ?>)"><?php echo $data['user_id']; ?></div></td>
                    <td><?php echo $order->sorder_id; ?></td>
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
        window.location.href = "<?php echo URLROOT; ?>/moderators/viewOrder/" + OrderID;
    }

    function viewUser(UserID) {
        window.location.href = "<?php echo URLROOT; ?>/moderators/viewuser/" + UserID;
    }
</script>
</body>

</html>