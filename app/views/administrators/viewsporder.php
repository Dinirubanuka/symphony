<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-order-single.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title><?php echo SITENAME; ?></title>
</head>

<<body>
  <div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/admin-sidebar.php'; ?>
    </div>
    <div class="right-component">
        <div class="title">
          <h2>View Order - #<?php echo $data['order_data']->sorder_id ?></h2>
        </div>
        <div class="orders-container">
              <div class="invoice-details">
                  <div class="flex-container">
                      <div class="flex-item">
                          <h3>User Details</h3><br><br>
                          <p><strong>Name:</strong> <?php echo $data['user_data']->name; ?></p><br>
                          <p><strong>Email:</strong> <?php echo $data['user_data']->email; ?></p><br>
                      </div>

                      <div class="flex-item">
                          <h3>SYMPHONY</h3><br><br>
                          <p>FOR ALL YOUR MUSICAL NEEDS</p><br>
                          <p><strong>Contact us:</strong> reach.dev.symphony@gmail.com</p><br>
                      </div>
                  </div>

                  <table>
                      <thead>
                          <tr>
                              <th>Image</th>
                              <th>Service Provider ID</th>
                              <th>Type and ID</th>
                              <th>Quantity</th>
                              <th>Price per Day</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Status</th>
                              <th>Total</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td><img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['product_data']->photo_1; ?>" style="width:100px; height:100px;" alt="Item 1"></td>
                              <td><div class = "sp-icon" onclick = "viewSP(<?php echo $data['product_data']->created_by; ?>)"><?php echo $data['product_data']->created_by ?></div></td>
                              <td><div product_id = "<?php echo $data['product_data']->product_id; ?>" product_type = "<?php echo $data['order_data']->type; ?>" class = "sp-icon" onclick = "viewProduct(this)"><?php echo $data['product_data']->Title ?> - <?php echo $data['product_data']->product_id ?></div></td>   
                              <td><?php echo $data['order_data']->qty ?></td>
                              <td>LKR. <?php echo $data['product_data']->unit_price ?></td>
                              <td><?php echo $data['order_data']->start_date ?></td>
                              <td><?php echo $data['order_data']->end_date ?></td>
                              <td class="status-<?php echo $data['order_data']->status ?>"><?php echo $data['order_data']->status ?></td>
                              <td>LKR. <?php echo $data['order_data']->total ?></td>
                          </tr>
                      </tbody>
                      <tfoot>
                          <tr>
                              <td colspan="8" style="text-align: right;"><strong>Total:</strong></td>
                              <td>LKR. <?php echo $data['order_data']->total ?></td>
                          </tr>
                      </tfoot>
                  </table>
              </div>
          </div>
      </div>
    </div>
  </div>
  <script>
      function viewSP(SP_ID) {
          window.location.href = "<?php echo URLROOT; ?>/administrators/viewserviceprovider/" + SP_ID;
      }

      function viewProduct(element) {
            var ProductID = element.getAttribute('product_id');
            var ProductType = element.getAttribute('product_type');
          window.location.href = "<?php echo URLROOT; ?>/administrators/viewProduct/" + ProductType + "/" + ProductID;
      }
  </script>
  </body>
  </html>