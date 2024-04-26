<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <title>Store Inventory Item</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-viewitem.css"
    ">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav-bar.css"
    ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php require_once APPROOT . '/views/inc/sp-studio-nav-bar.php'; ?>

<div class="review-grid">
    <?php foreach ($data['reviews'] as $review) : ?>
        <figure class="snip1232">
            <div class="author">
                <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $review->photo; ?>"/>
                <span><?php echo $review->name; ?></span>
            </div>
            <blockquote><?php echo $review->content; ?></blockquote>
        </figure>
    <?php endforeach; ?>
</div>
<script src="<?php echo URLROOT; ?>/js/studio.js"></script>

</body>
</html>