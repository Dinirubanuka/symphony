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
            <h2><?php echo $data['request']->business_name ?><br><br></h2>
          </div>
          <div class="buttons">
            <div <?php echo $data['request']->status == 'Banned' ? 'style="display: none;"' : ''; ?>>
              <button id="banBtn" onclick="banSP(<?php echo $data['request']->serviceprovider_id ?>)">Ban Account</button>
            </div>
            <div <?php echo $data['request']->status == 'Banned' ? '' : 'style="display: none;"'; ?>>
              <button id="banBtn" onclick="unbanSP(<?php echo $data['request']->serviceprovider_id ?>)">Unban Account</button>
            </div>
              <button id="orderBtn" onclick="viewSPOrders(<?php echo $data['request']->serviceprovider_id ?>)">View Orders</button>
            <button id="inventoryBtn">View Inventory</button>
          </div>
        </div>

        <div class="bio-data">
          <div class="form-data">
            <div class="business-data">
              <div>
                <strong>Service Provider ID: </strong><?php echo $data['request']->serviceprovider_id ?>
              </div><br>
              <div>
                  <strong>Business Name: </strong><?php echo $data['request']->business_name ?>
              </div><br>
              <div>
                  <strong>Business Address: </strong><?php echo $data['request']->business_address ?>
              </div><br>
              <div>
                  <strong>Business Contact No: </strong><?php echo $data['request']->business_contact_no ?>
              </div><br>
              <div>
                  <strong>Business Email: </strong><?php echo $data['request']->business_email ?>
              </div><br>
              <div class = "status-<?php echo $data['request']->status ?>">
                  <strong>Status: </strong><?php echo $data['request']->status ?>
              </div><br>
            </div>
            <div class="owner-data">
              <div>
                <strong>Owner Name: </strong><?php echo $data['request']->owner_name ?>
              </div><br>
              <div>
                  <strong>Owner Address: </strong><?php echo $data['request']->owner_address ?>
              </div><br>
              <div>
                  <strong>Owner Contact No: </strong><?php echo $data['request']->owner_contact_no ?>
              </div><br>
              <div>
                  <strong>Owner NIC: </strong><?php echo $data['request']->owner_nic ?>
              </div><br>
              <div>
                  <strong>Owner Email: </strong><?php echo $data['request']->owner_email ?>
              </div><br>
              <div>
                  <strong>About: </strong><?php echo $data['request']->about ?>
              </div><br>
            </div>
          </div>
        </div>

        <div class="photo-grid">
          <div class="photo-item" onclick="openLightbox('<?php echo URLROOT; ?>/img/sp_validations/<?php echo $data['request']->photo_R1 ?>')">
            <img src="<?php echo URLROOT; ?>/img/sp_validations/<?php echo $data['request']->photo_R1 ?>" alt="Photo 1">
          </div>
          <div class="photo-item" onclick="openLightbox('<?php echo URLROOT; ?>/img/sp_validations/<?php echo $data['request']->photo_R2 ?>')">
            <img src="<?php echo URLROOT; ?>/img/sp_validations/<?php echo $data['request']->photo_R2 ?>" alt="Photo 2">
          </div>
          <div class="photo-item" onclick="openLightbox('<?php echo URLROOT; ?>/img/sp_validations/<?php echo $data['request']->photo_R3 ?>')">
            <img src="<?php echo URLROOT; ?>/img/sp_validations/<?php echo $data['request']->photo_R3 ?>" alt="Photo 3">
          </div>
          <div class="photo-item" onclick="openLightbox('<?php echo URLROOT; ?>/img/sp_validations/<?php echo $data['request']->photo_R4 ?>')">
            <img src="<?php echo URLROOT; ?>/img/sp_validations/<?php echo $data['request']->photo_R4 ?>" alt="Photo 4">
          </div>
          <div class="photo-item" onclick="openLightbox('<?php echo URLROOT; ?>/img/sp_validations/<?php echo $data['request']->photo_R5 ?>')">
            <img src="<?php echo URLROOT; ?>/img/sp_validations/<?php echo $data['request']->photo_R5 ?>" alt="Photo 5">
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

        function banSP(serviceproviderID) {
          var rejectionReason = prompt("Please enter the reason for banning the Service Provider:");
          
          if (rejectionReason !== null && rejectionReason !== "") {
              // URL encode the reason to include it in the URL
              var encodedReason = rejectionReason.replace(/ /g, '_');
              
              // Display a confirmation dialog
              if (confirm("Are you sure you want to ban this Service Provider?")) {
                  // Execute PHP code to delete the moderator
                  window.location.href = "<?php echo URLROOT; ?>/moderators/banserviceprovider/" + serviceproviderID + "/" + encodedReason;
              }
            } else {
              // If the user clicks "Cancel" or provides an empty reason, do nothing
              alert('Ban canceled. Please provide a valid reason.');
          }
        }

        function unbanSP(serviceproviderID) {
          // Display a confirmation dialog
          if (confirm("Are you sure you want to unban this Service Provider?")) {
              // Execute PHP code to delete the moderator
              window.location.href = "<?php echo URLROOT; ?>/moderators/unbanserviceprovider/" + serviceproviderID;
          }
        }

        function viewSPOrders(serviceproviderID) {
          window.location.href = "<?php echo URLROOT; ?>/moderators/viewSPOrders/" + serviceproviderID;
        }
      </script>
    </div>
  </div>
</body>
</html>
