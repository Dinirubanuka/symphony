<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-register.css"/>
  </head>
  <body>
  <!-----------register-nav-bar-------->
  <?php require_once APPROOT . '/views/inc/register-nav.php'; ?>

  <!-------------register-form----------->
    <div class="register">
      <section class="container">
      <p>Registration Form - Customer</p><br>
      <div style="text-align: center;">
        <h2>Not a Customer? <a href="<?php echo URLROOT; ?>/serviceproviders/serviceproviderregister">Register as a Service Provider</a></h2>
      </div>
      <form action="<?php echo URLROOT; ?>/users/register" class="form" method="post" enctype="multipart/form-data">
        <div class="input-box">
          <label>Full Name</label>
          <!-- <input type="text" placeholder="Enter full name" required /> -->
          <input type="text" name="name" class="<?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
          <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <!-- <input type="text" placeholder="Enter email address" required /> -->
          <input type="email" name="email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <!-- <input type="number" placeholder="Enter phone number" required /> -->
            <input type="number" name="tel_Number" class="<?php echo (!empty($data['tel_Number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['tel_Number']; ?>">
            <span class="invalid-feedback"><?php echo $data['tel_Number_err']; ?></span>
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" name="date" class="<?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['date']; ?>">
            <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" checked value="male" />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="female" />
              <label for="check-female">Female</label>
            </div>
          </div>
        </div>
        <div class="input-box address">
          <label>Address</label>
          <input type="text" name="address" class="<?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address']; ?>">
          <span class="invalid-feedback"><?php echo $data['address_err']; ?></span><br><br>
          <label>Upload-Your-Photo</label>
            <input type="file" id="photo" accept=".jpg, .jpeg, .png, .HEIC" name="photo" class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['photo']; ?>"><br><br>
            <label>Password</label>
          <input type="password" name="password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span><br><br>
          <label>Confirm Password</label>
          <input type="password" name="confirm_password" class="<?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
          <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        <button>Submit</button>
      </form>
    </section>
    </div>
  </body>
</html>