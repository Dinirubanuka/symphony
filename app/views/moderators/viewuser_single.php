<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-sp-view.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-index.css">
  <title>Profile View</title>
</head>
<body>
<div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/mod-sidebar.php'; ?>
    </div>
    <div class="right-component">
      <div class="profile-container">
        <div class="profile-header">
          <div class="profile-photo" onclick="openLightbox('<?php echo URLROOT; ?>/img/mag_img/<?php echo $data['request']->profile_photo ?>')">
            <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $data['request']->profile_photo ?>" alt="Profile Photo">
          </div>
          <div class="business-name">
            <h2><?php echo $data['request']->name ?><br><br></h2>
          </div>
          <div class="buttons">
            <button id="banBtn" onclick="banUser(<?php echo $data['request']->id ?>)">Ban Account</button>
            <button id="orderBtn" onclick="viewUserOrders(<?php echo $data['request']->id ?>)">View Orders</button>
          </div>
        </div>

        <div class="bio-data">
          <div class="form-data">
            <div class="business-data">
              <div>
                <strong>User ID: </strong><?php echo $data['request']->id ?>
              </div><br>
              <div>
                  <strong>Name: </strong><?php echo $data['request']->name ?>
              </div><br>
              <div>
                  <strong>Address: </strong><?php echo $data['request']->email ?>
              </div><br>
              <div>
                  <strong>Contact No: </strong><?php echo $data['request']->TelephoneNumber ?>
              </div><br>
              <div>
                  <strong>Birth Date: </strong><?php echo $data['request']->BirthDate ?>
              </div><br>
              <div>
                  <strong>Address: </strong><?php echo $data['request']->address ?>
              </div><br>
              <div>
                  <strong>Gender: </strong><?php echo $data['request']->gender ?>
              </div><br>
              <div class = "status-<?php echo $data['request']->status ?>">
                  <strong>Status: </strong><?php echo $data['request']->status ?>
              </div><br>
            </div>
          </div>
        </div>

      </div>

      <div class="lightbox" id="lightbox" onclick="closeLightbox()">
        <img src="" alt="Enlarged Image" id="lightbox-img">
      </div>
      <script>
        function openLightbox(imageSrc) {
          document.getElementById('lightbox-img').src = imageSrc;
          document.getElementById('lightbox').style.display = 'flex';
        }

        function closeLightbox() {
          document.getElementById('lightbox').style.display = 'none';
        }

        function banUser(userID) {
          if (confirm("Are you sure you want to ban this user?")) {
              window.location.href = "<?php echo URLROOT; ?>/moderators/banuser/" + userID;
          }
        }

        function viewUserOrders(userID) {
          window.location.href = "<?php echo URLROOT; ?>/moderators/viewUserOrders/" + userID;
        }
      </script>
    </div>
  </div>
</body>
</html>
