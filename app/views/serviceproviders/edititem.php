<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-edititem.css"/>
<body>
<!-----------profile-nav-bar-------->
<?php require_once APPROOT . '/views/inc/sp-index-nav.php'; ?>

<!-------------register-form----------->
<h1 style="color: white">Edit Item</h1>
  <form id="edit-item-form" action="<?php echo URLROOT; ?>/serviceproviders/editconfirm" method="POST">
      <input type="hidden" name="brand" >
      <label for="name">Brand: <?php echo $data['brand']; ?></label>
      <input type="hidden" name="product_id" value="<?php echo $data['product_id']; ?>">
      <label for="name">ID: <?php echo $data['product_id']; ?></label>
      <input type="hidden" name="model" >
      <label for="name">Model: <?php echo $data['model']; ?></label>
      <label for="quantity">Quantity:</label>
      <input type="number" name="quantity" value="<?php echo $data['quantity']; ?>">
      <label for="price">Price:</label>
      <input type="number" name="unit_price" value="<?php echo $data['unit_price']; ?>">
      <input type="submit" value="Update">
  </form>
<script src="<?php echo URLROOT;?>/js/sp-edititem.js"></script>
</body>
</html>