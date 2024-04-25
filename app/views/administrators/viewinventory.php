<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/inquiries.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-viewinv.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-index.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title><?php echo SITENAME; ?></title>
</head>

<<body>
  <div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/admin-sidebar.php'; ?>
    </div>
    <div class="right-component">
      <h2>View Service Provider Inventory Admin ID #<?php echo $data['admin_data']->admin_id; ?> | Service Provider #<?php echo $data['sp']->serviceprovider_id; ?></h2>
    <div class = "items-container"> 
        <h3>Instruments</h3>
        <div class="inquiries">
          <?php foreach ($data['equipment'] as $equipment) : ?>
          <div class="item-container"  product_id = "<?php echo $equipment->product_id ; ?>" product_type = "<?php echo $equipment->type ; ?>"  onclick="viewProduct(this)">
              <div class="item-details">
                  <div class="image-carousel">
                      <img class="carousel-image" src="http://localhost/symphony/img/serviceProvider/<?php echo $equipment->photo_1?>" style="display: block">
                  </div>
                  <div class="item-info">
                      <div><strong>Title: </strong><?php echo $equipment->Title?></div>
                      <div><strong>Brand: </strong><?php echo $equipment->brand?></div>
                      <div><strong>Model: </strong><?php echo $equipment->model?></div>
                      <div><strong>Price(LKR): </strong><?php echo $equipment->unit_price?></div>
                  </div>
              </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class = "items-container"> 
        <h3>Studios</h3>
        <div class="inquiries">
          <?php foreach ($data['studio'] as $equipment) : ?>
          <div class="item-container"  product_id = "<?php echo $equipment->product_id ; ?>" product_type = "<?php echo $equipment->type ; ?>"  onclick="viewStudio(this)">
              <div class="item-details">
                  <div class="image-carousel">
                      <img class="carousel-image" src="http://localhost/symphony/img/serviceProvider/<?php echo $equipment->photo_1?>" style="display: block">
                  </div>
                  <div class="item-info">
                      <div><strong>Title: </strong><?php echo $equipment->Title?></div>
                      <div><strong>Air condition </strong><?php echo $equipment->airCondition?></div>
                      <div><strong>Locations: </strong><?php echo $equipment->location?></div>
                      <div><strong>Price(LKR): </strong><?php echo $equipment->unit_price?></div>
                  </div>
              </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class = "items-container"> 
        <h3>Bands</h3>
        <div class="inquiries">
          <?php foreach ($data['band'] as $equipment) : ?>
          <div class="item-container"  product_id = "<?php echo $equipment->product_id ; ?>" product_type = "<?php echo $equipment->type ; ?>"  onclick="viewBand(this)">
              <div class="item-details">
                  <div class="image-carousel">
                      <img class="carousel-image" src="http://localhost/symphony/img/serviceProvider/<?php echo $equipment->photo_1?>" style="display: block">
                  </div>
                  <div class="item-info">
                      <div><strong>Title: </strong><?php echo $equipment->Title?></div>
                      <div><strong>Leader Name: </strong><?php echo $equipment->leaderName?></div>
                      <div><strong>Location: </strong><?php echo $equipment->location?></div>
                      <div><strong>Price(LKR): </strong><?php echo $equipment->unit_price?></div>
                  </div>
              </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class = "items-container"> 
        <h3>Singers</h3>
        <div class="inquiries">
          <?php foreach ($data['singer'] as $equipment) : ?>
          <div class="item-container"  product_id = "<?php echo $equipment->product_id ; ?>" product_type = "<?php echo $equipment->type ; ?>"  onclick="viewSinger(this)">
              <div class="item-details">
                  <div class="image-carousel">
                      <img class="carousel-image" src="http://localhost/symphony/img/serviceProvider/<?php echo $equipment->photo_1?>" style="display: block">
                  </div>
                  <div class="item-info">
                      <div><strong>Nick Name: </strong><?php echo $equipment->nickName?></div>
                      <div><strong>Name: </strong><?php echo $equipment->name?></div>
                      <div><strong>Location: </strong><?php echo $equipment->location?></div>
                      <div><strong>Price(LKR): </strong><?php echo $equipment->unit_price?></div>
                  </div>
              </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class = "items-container"> 
        <h3>Musicians</h3>
        <div class="inquiries">
          <?php foreach ($data['musician'] as $equipment) : ?>
          <div class="item-container"  product_id = "<?php echo $equipment->product_id ; ?>" product_type = "<?php echo $equipment->type ; ?>"  onclick="viewMusician(this)">
              <div class="item-details">
                  <div class="image-carousel">
                      <img class="carousel-image" src="http://localhost/symphony/img/serviceProvider/<?php echo $equipment->photo_1?>" style="display: block">
                  </div>
                  <div class="item-info">
                      <div><strong>Name: </strong><?php echo $equipment->name?></div>
                      <div><strong>Location: </strong><?php echo $equipment->location?></div>
                      <div><strong>Price(LKR): </strong><?php echo $equipment->unit_price?></div>
                  </div>
              </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <script>
    function viewProduct(item) {
        var product_id = item.getAttribute("product_id");
        window.location.href = "<?php echo URLROOT; ?>/administrators/viewProduct/Equipment/" + product_id;
    }
    function viewStudio(item) {
        var product_id = item.getAttribute("product_id");
        window.location.href = "<?php echo URLROOT; ?>/administrators/viewProduct/Studio/" + product_id;
    }
    function viewBand(item) {
        var product_id = item.getAttribute("product_id");
        window.location.href = "<?php echo URLROOT; ?>/administrators/viewProduct/Band/" + product_id;
    }
    function viewSinger(item) {
        var product_id = item.getAttribute("product_id");
        window.location.href = "<?php echo URLROOT; ?>/administrators/viewProduct/Singer/" + product_id;
    }
    function viewMusician(item) {
        var product_id = item.getAttribute("product_id");
        window.location.href = "<?php echo URLROOT; ?>/administrators/viewProduct/Musician/" + product_id;
    }
    </script>
    </div>
  </div>
  </body>
  </html>