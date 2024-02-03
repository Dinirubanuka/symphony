<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instrument</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/inquiries.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-support.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!--navigation bar-->
<?php require_once APPROOT . '/views/inc/index-support.php'; ?>
<div class = "inquiries"> 
    <?php foreach ($data['inquiries'] as $inquiry) : ?>
    <div class="item-container" onclick="viewInquiry(<?php echo $inquiry->inquiry_id; ?>)">
        <div class="item-details">
            <div class="image-carousel">
                <img class="carousel-image" src="<?php echo URLROOT; ?>/img/inquiries/<?php echo $inquiry->photo_1?>" style="display: block">
            </div>
            <div class="item-info">
                <h3>Inquiry ID#<?php echo $inquiry->inquiry_id?></h3>
                <div><strong>Inquiry Type: </strong><?php echo $inquiry->inquiryType?></div>
                <div class="status-<?php echo $inquiry->status ?>"><strong>Status:</strong> <?php echo $inquiry->status ?></div>
                <div <?php echo $inquiry->status == 'Pending' ? 'style="display: none;"' : '' ?><strong>Moderator ID: </strong><?php echo $inquiry->moderator_id?></div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<script>
    function viewInquiry(inquiryId) {
        window.location.href = "<?php echo URLROOT; ?>/users/viewInquiry/"+inquiryId;
    }
</script>
</body>
</html>