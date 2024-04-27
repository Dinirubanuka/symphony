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
      <?php require APPROOT . '/views/inc/admin-sidebar.php'; ?>
    </div>
    <div class="right-component">
    <div class = "inquiries"> 
        <div class="item-container" onclick="generateLogReport()">
            <div class="item-details">
                <div class="image-carousel">
                    <img class="carousel-image" src="<?php echo URLROOT; ?>/img/log.jpg" style="display: block">
                </div>
                <div class="item-info">
                    <div><strong>Report Type: </strong>Single Log Report</div>
                </div>
            </div>
        </div>

        <div class="item-container" onclick="generateRevenueReport()">
            <div class="item-details">
                <div class="image-carousel">
                    <img class="carousel-image" src="<?php echo URLROOT; ?>/img/log.jpg" style="display: block">
                </div>
                <div class="item-info">
                    <div><strong>Report Type: </strong> Staus</div>
                </div>
            </div>
        </div>
        
        <div class="item-container" onclick="generateStatReport()">
            <div class="item-details">
                <div class="image-carousel">
                    <img class="carousel-image" src="<?php echo URLROOT; ?>/img/log.jpg" style="display: block">
                </div>
                <div class="item-info">
                    <div><strong>Report Type: </strong> Revenue</div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function generateLogReport() {
            window.location.href = "<?php echo URLROOT; ?>/administrators/getUserList";
        }

        function generateRevenueReport() {
            window.location.href = "<?php echo URLROOT; ?>/administrators/generateRevenueReport";
        }

        function generateStatReport() {
            window.location.href = "<?php echo URLROOT; ?>/administrators/generateStatReport";
        }
    </script>
    </div>
  </div>
  </body>
  </html>