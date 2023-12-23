<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-profile.css"/>
  <title>Servie Provider Profile</title>
</head>
<body>

<!-----------profile-nav-bar-------->
<?php require_once APPROOT . '/views/inc/sp-profile-nav.php'; ?>
<!--------body-------->
<div class="flex-outer">
  <div class="photo-outer">
        <div class="photo-inner">
          <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $data['photo']?>" alt="user image" class = "photo" id="photo-1"/>
          <img src="<?php echo URLROOT; ?>/img/camera_10762333.png" alt="camera-icon"  class = "photo" id="photo-1" onclick="myfunc()"/>
        </div>
  </div>
    <!------options------->
    <div class="modal" id="options-modal">
        <div class="modal-content">
            <a href="#" onclick="myfunc()">X</a>
            <form action="<?php echo URLROOT; ?>/serviceproviders/profilePhotoUpdate"  method="post" enctype="multipart/form-data">
              <input type="file" id="photo" accept=".jpg, .jpeg, .png, .HEIC" name="photo" class="<?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['image']; ?>">
              <input type="submit" value="Upload" id="upload-btn"/>
            </form>
            <br><br>
            <button class="delete-btn" id="delete-btn" onclick="confirmDelete()">Delete</button>
        </div>
    </div>
<div class = "bigClass">
    <div class="input-box">
      <label>Business Name: <?php echo $data['business_name']; ?></label>
    </div>

    <div class="input-box">
      <label>Email Address: <?php echo $data['business_email']; ?></label>
    </div>

    <div class="column">
      <div class="input-box">
        <label>Phone Number: <?php echo $data['business_contact_no']; ?></label>
      </div>
      <div class="input-box">
        <label>Address: <?php echo $data['business_address']; ?></label>
      </div>
    <div class="input-box">
      <label>Owner Name: <?php echo $data['owner_name']; ?></label>
    </div>

    <div class="input-box">
      <label>Owner Email Address: <?php echo $data['owner_email']; ?></label>
    </div>

      <div class="input-box">
        <label>Owner Phone Number: <?php echo $data['owner_contact_no']; ?></label>
      </div>
      <div class="input-box">
        <label>Personal Address: <?php echo $data['owner_address']; ?></label>
      </div>
      <div class="input-box">
        <label>About: <?php echo $data['about']; ?></label>
      </div>

      <div class="llink">
        <form action = "<?php echo URLROOT; ?>/serviceproviders/editDetail/<?php echo $_SESSION['serviceprovider_id']; ?>" method ="post">
            <div class = "edit-link">
            <input type = "submit" value = "edit" id = "editButton">
            </div>
        </form>
        <div class="editButton" onclick="EditAcc()" id = "editButton">Edit Details</div>

        <form action = "<?php echo URLROOT; ?>/serviceproviders/delete" method ="post" class="last">
            <div class = "delete-link">
            <input type = "submit" value = "delete" id="button123">
            </div>
        </form>
        <div class="delButton" onclick="DeleteAcc()" id = "delButton">Remove account</div>
      </div>
</div>
</div>

</div>
<script src="<?php echo URLROOT;?>/js/sp-profile.js"></script>
<script>
  function Logout() {
  // Display a confirmation dialog
  var confirmed = confirm("Are you sure you want to logout?");
  
  // Check the user's response
  if (confirmed) {
    window.location.href = "<?php echo URLROOT; ?>/serviceproviders/logout";
    alert("Logged out.");
  } else {
    alert("Logout canceled.");
  }
  
}
</script>
</body>
</html>
