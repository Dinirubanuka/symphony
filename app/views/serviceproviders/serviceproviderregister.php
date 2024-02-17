<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-register.css"/>
  </head>
  <body>
  <!-----------register-nav-bar-------->
  <?php require_once APPROOT . '/views/inc/sp-register-nav.php'; ?>
  <!-------------register-form----------->
  <div class="register">
    <section class="container">
      <p>Registration Form - Service Provider</p>
      <div style="text-align: center;">
        <h2>Not a Service Provider? <a href="<?php echo URLROOT; ?>/users/register" style="color: blue;">Register as a Customer</a></h2>
      </div>
      <form action="<?php echo URLROOT; ?>/serviceproviders/serviceproviderregister" class="form" method="post" enctype="multipart/form-data">
        <div class="input-box">
          <label>Business Name</label>
          <!-- <input type="text" placeholder="Enter full name" required /> -->
          <input type="text" name="business_name" class="<?php echo (!empty($data['business_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_name']; ?>">
          <span class="invalid-feedback"><?php echo $data['business_name_err']; ?></span>
        </div>

        <div class="input-box">
          <label>Business Email Address</label>
          <!-- <input type="text" placeholder="Enter email address" required /> -->
          <input type="email" name="business_email" class="<?php echo (!empty($data['business_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_email']; ?>">
          <span class="invalid-feedback"><?php echo $data['business_email_err']; ?></span>
        </div>

        <div class="input-box">
        <label>Business Phone Number</label>
        <!-- <input type="number" placeholder="Enter phone number" required /> -->
        <input type="number" name="business_contact_no" class="<?php echo (!empty($data['business_contact_no_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_contact_no']; ?>">
        <span class="invalid-feedback"><?php echo $data['business_contact_no_err']; ?></span>
        </div>

        <div class="input-box address">
          <label>Business Address</label>
          <input type="text" name="business_address" class="<?php echo (!empty($data['business_address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_address']; ?>">
          <span class="invalid-feedback"><?php echo $data['business_address_err']; ?></span><br><br>
          <label>Profile Picture</label>
          <input type="file" id="photo" accept=".jpg, .jpeg, .png, .HEIC" name="photo" class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['photo']; ?>"><br><br><label>Password</label>
          <input type="password" name="password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span><br><br>
          <label>Confirm Password</label>
          <input type="password" name="confirm_password" class="<?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
          <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>  

        <div class="input-box">
          <label>Owner Name</label>
          <!-- <input type="text" placeholder="Enter full name" required /> -->
          <input type="text" name="owner_name" class="<?php echo (!empty($data['owner_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_name']; ?>">
          <span class="invalid-feedback"><?php echo $data['owner_name_err']; ?></span>
        </div>

        <div class="input-box">
          <label>Owner Email Address</label>
          <!-- <input type="text" placeholder="Enter email address" required /> -->
          <input type="owner_email" name="owner_email" class="<?php echo (!empty($data['owner_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_email']; ?>">
          <span class="invalid-feedback"><?php echo $data['owner_email_err']; ?></span>
        </div>

        <div class="input-box">
        <label>Owner Phone Number</label>
        <!-- <input type="number" placeholder="Enter phone number" required /> -->
        <input type="number" name="owner_contact_no" class="<?php echo (!empty($data['owner_contact_no_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_contact_no']; ?>">
        <span class="invalid-feedback"><?php echo $data['owner_contact_no_err']; ?></span>
        </div>

        <div class="input-box">
        <label>Owner Address</label>
        <input type="text" name="owner_address" class="<?php echo (!empty($data['owner_address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_address']; ?>">
        <span class="invalid-feedback"><?php echo $data['owner_address_err']; ?></span><br><br>
        </div>

        <div class="input-box">
        <label>Owner NIC Number</label>
        <input type="text" name="owner_nic" class="<?php echo (!empty($data['owner_nic_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_nic']; ?>">
        <span class="invalid-feedback"><?php echo $data['owner_nic_err']; ?></span><br><br>
        </div>

        <div class="input-box">
        <label>About</label>
        <input type="text" name="about"  class="<?php echo (!empty($data['about_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['about']; ?>">
        <span class="invalid-feedback"><?php echo $data['about_err']; ?></span>
        </div>

        <div class="photo_container">
            <div class="input-box">
                <label style="font-weight: bold">Add up to 5 photos of your Business (Optional)</label>
            </div>
            <div class="photo-table">
                <div class="photo-outer">
                    <div class="photo-inner">
                        <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_1" onclick="triggerInput(1)">
                        <input type="file" id="photo_1" accept=".jpg, .jpeg, .png, .HEIC" name="photo_1" onchange="previewImage(this, 'previewPhoto_1')">
                    </div>
                </div>
                <div class="photo-outer">
                    <div class="photo-inner">
                        <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_2" onclick="triggerInput(2)">
                        <input type="file" id="photo_2" accept=".jpg, .jpeg, .png, .HEIC" name="photo_2" onchange="previewImage(this, 'previewPhoto_2')">
                    </div>
                </div>
                <div class="photo-outer">
                    <div class="photo-inner">
                        <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_3" onclick="triggerInput(3)">
                        <input type="file" id="photo_3" accept=".jpg, .jpeg, .png, .HEIC" name="photo_3" onchange="previewImage(this, 'previewPhoto_3')">
                    </div>
                </div>
                <div class="photo-outer">
                    <div class="photo-inner">
                        <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_4" onclick="triggerInput(4)">
                        <input type="file" id="photo_4" accept=".jpg, .jpeg, .png, .HEIC" name="photo_4" onchange="previewImage(this, 'previewPhoto_4')">
                    </div>
                </div>
                <div class="photo-outer">
                    <div class="photo-inner">
                        <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_5" onclick="triggerInput(5)">
                        <input type="file" id="photo_5" accept=".jpg, .jpeg, .png, .HEIC" name="photo_5" onchange="previewImage(this, 'previewPhoto_5')">
                    </div>
                </div>
            </div>
        </div>

        <button>Submit</button>
      </form>
    </section>
<script>
      function triggerInput(id){
        document.getElementById("photo_"+id).click();
    }
    function previewImage(input, imgId) {
        var preview = document.getElementById(imgId);

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
  </body>
</html>