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
        <?php foreach ($data['pending'] as $inquiry_pending) : ?>
        <div class="item-container" onclick="viewInquiry(<?php echo $inquiry_pending->inquiry_id; ?>)">
            <div class="item-details">
                <div class="image-carousel">
                    <img class="carousel-image" src="<?php echo URLROOT; ?>/img/inquiries/<?php echo $inquiry_pending->photo_1?>" style="display: block">
                </div>
                <div class="item-info">
                    <h3>Inquiry ID#<?php echo $inquiry_pending->inquiry_id?></h3>
                    <div><strong>Inquiry Type: </strong><?php echo $inquiry_pending->inquiryType?></div>
                    <div class="status-<?php echo $inquiry_pending->status ?>"><strong>Status:</strong> <?php echo $inquiry_pending->status ?></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <script>
        function viewInquiry(inquiryId) {
            window.location.href = "<?php echo URLROOT; ?>/moderators/viewInquiry/"+inquiryId;
        }
    </script>
    </div>
  </div>
  </body>
  </html>