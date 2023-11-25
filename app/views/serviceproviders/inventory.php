<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-inventory.css"/>
  <title>Dashboard</title>
</head>
<body>
<!-----------profile-nav-bar-------->
<?php require_once APPROOT . '/views/inc/sp-index-nav.php'; ?>
<h1>Inventory</h1>
  <div class="account-requests">
  <?php foreach($data['inventory'] as $inventory) : ?>
      <div class="request">
          <div class="request-details">
              <h2><?php echo $inventory->category; ?></h2>
              <p>Brand: <?php echo $inventory->brand; ?></p>
              <p>Model: <?php echo $inventory->model; ?></p>
              <p>Quantity: <?php echo $inventory->quantity; ?></p>
              <p>Price: <?php echo $inventory->unit_price; ?></p>
          </div>
          <div class="request-photo">
              <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $inventory->photo_1; ?>" alt="Business B Photo">
          </div>
          <div class="request-actions">
                <form action = "<?php echo URLROOT; ?>/serviceproviders/edititem/<?php echo $inventory->product_id; ?>" method ="post">
                    <div class = "edit-link">
                        <input class="accept-button" type = "submit" value = "Edit" id = "editButton">
                    </div>
                </form>
                <form action = "<?php echo URLROOT; ?>/serviceproviders/deleteitem/<?php echo $inventory->product_id; ?>" method ="post">
                    <div class = "edit-link">
                        <input class="decline-button" onclick="DeleteItem()" type = "submit" value = "Delete" id = "deleteButton">
                    </div>
                </form>
              <!-- <button class="decline-button">Remove</button> -->
          </div>
      </div>

      <?php endforeach; ?>
  </div>
    <a class = "additem" href="<?php echo URLROOT; ?>/serviceproviders/additem">Add New Item</a>
</body>

</div>
<script src="<?php echo URLROOT;?>/js/sp-inventory.js"></script>
</body>
</html>
