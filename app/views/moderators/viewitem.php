<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-item.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title><?php echo SITENAME; ?></title>
</head>

<<body>
  <div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/mod-sidebar.php'; ?>
    </div>
    <div class="right-component">
        <h2>View <?php echo $data['type']; ?> - #<?php echo $data['product_id']; ?></h2>
        <div class="equipment-details">
            <div class="image-gallery">
                <img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_1']; ?>" alt="Equipment Image 1" onclick="openLightbox('<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_1']; ?>')">
                <img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_2']; ?>" alt="Equipment Image 2" onclick="openLightbox('<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_2']; ?>')">
                <img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_3']; ?>" alt="Equipment Image 3" onclick="openLightbox('<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $data['photo_3']; ?>')">
            </div>

            <div class="owner-details">
                <img src="owner-profile-picture.jpg" alt="Owner Profile Picture">
                <p>Owner Name: John Doe</p>
                <p>Email: owner@example.com</p>
            </div>

            <div class="reviews">
                <h2>Equipment Reviews</h2>
                <ul>
                    <li>
                        <p><strong>User 1:</strong> Excellent equipment! Highly recommended.</p>
                    </li>
                    <li>
                        <p><strong>User 2:</strong> The owner was very helpful. 5 stars!</p>
                    </li>
                    <!-- Add more reviews as needed -->
                </ul>
            </div>
        </div>

        <div id="lightbox" class="lightbox" onclick="closeLightbox()">
            <img id="lightbox-image" src="" alt="Lightbox Image">
        </div>
    </div>
  </div>
<script>
    function openLightbox(imageSrc) {
    var lightbox = document.getElementById("lightbox");
    var lightboxImage = document.getElementById("lightbox-image");

    lightbox.style.display = "block";
    lightboxImage.src = imageSrc;
}

function closeLightbox() {
    var lightbox = document.getElementById("lightbox");

    lightbox.style.display = "none";
}

</script>
</body>
</html>