<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
<<<<<<< Updated upstream
      <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-register.css"/>
  </head>
  <body>
  <!-----------register-nav-bar-------->
  <?php require_once APPROOT . '/views/inc/register-nav.php'; ?>
=======
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-register.css"/>
  </head>
  <body>
  <!-----------register-nav-bar-------->
  <?php require_once APPROOT . '/views/inc/sp-register-nav.php'; ?>
  <!-------------register-form----------->
  <div class="register">
>>>>>>> Stashed changes
    <section class="container">
      <p>Registration Form</p>
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

        <button>Submit</button>
      </form>
    </section>
  </body>
</html>