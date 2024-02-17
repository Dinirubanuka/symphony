<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/inquiries.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-index.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title><?php echo SITENAME; ?></title>
</head>

<<body>
  <div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/mod-sidebar.php'; ?>
    </div>
    <div class="right-component">
    <div class = "inquiries"> 
        <?php foreach ($data['pending'] as $sp_pending) : ?>
        <div class="item-container" onclick="viewServiceProvider(<?php echo $sp_pending->serviceprovider_id; ?>)">
            <div class="item-details">
                <div class="image-carousel">
                    <img class="carousel-image" src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $sp_pending->profile_photo?>" style="display: block">
                </div>
                <div class="item-info">
                    <div><strong>Business Name: </strong><?php echo $sp_pending->business_name?></div>
                    <div><strong>Contact Number: </strong><?php echo $sp_pending->business_contact_no?></div>
                    <div><strong>Address: </strong><?php echo $sp_pending->business_address?></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <script>
        function viewServiceProvider(sp_id) {
            window.location.href = "<?php echo URLROOT; ?>/moderators/viewPendingRequest/"+sp_id;
        }
    </script>
    </div>
  </div>
  </body>
  </html>